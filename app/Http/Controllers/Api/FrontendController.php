<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\CreatePage;
use App\Models\Customer;
use App\Models\GeneralSetting;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\ShippingCharge;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Hash;
use Auth;
use Mail;
use Str;
use DB;

class FrontendController extends Controller
{
    public function userRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:customers,email',
            'phone' => 'required|string|max:255|unique:customers,phone',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }


        $oldUserEmail = Customer::where('email', $request->email)->first();

        if (isset($oldUserEmail)) {
            return response()->json([
                'status' => false,
                'message' => 'Email already exist !',
            ], 404);
        } else {
            $oldPhone = Customer::where('phone', $request->phone)->first();
            if (isset($oldPhone)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Phone number already exist !',
                ], 404);
            } else {
                $user = new Customer();
                $user->name = $request->name;
                $user->slug = Str::slug($request->name . '-' . $request->phone);
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->password = Hash::make($request->password);
                $user->status = 'active';
                $success = $user->save();
            }
        }


        if ($success) {

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Authentication Successful',
                'token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'User Registration Failed !',
        ], 500);
    }


    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Find user by email or phone
        $user = Customer::where(function ($q) use ($request) {
            $q->where('email', $request->email)
                ->orWhere('phone', $request->email); // allow login with phone too
        })
            ->whereIn('status', ['active', 'inactive'])
            ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Information does not match',
            ], 401);
        }

        // Check if user is blocked
        if ($user->status != 'active') {
            return response()->json([
                'status' => false,
                'message' => 'You are blocked by authority',
            ], 403);
        }

        // Verify password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password does not match',
            ], 401);
        }

        // Login successful → create token
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Authentication Successful',
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }


    public function userLogout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Logout Successful',
            ], 200);
    }


    public function userForgotPassword(Request $request)
    {
        // Validate the email field
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Attempt to send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Return a JSON response based on the status
        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => __($status),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to send password reset link',
            ], 400);
        }
    }


    public function userResetPassword(Request $request)
    {
        // Validate the email field
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Attempt to send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Return a JSON response based on the status
        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => __($status),
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to send password reset link',
            ], 400);
        }
    }


    public function userConfirmPassword(Request $request)
    {
        // Validate the provided password for the currently authenticated user
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // Return a JSON response for invalid password
            return response()->json([
                'status' => false,
                'message' => __('auth.password'), // Use translation for the error message
            ], 422);
        }

        // Store the password confirmation time in the session
        $request->session()->put('auth.password_confirmed_at', time());

        // Return a success response
        return response()->json([
            'status' => true,
            'message' => 'Password confirmed successfully.',
        ], 200);
    }

//    Web Settings
    public function settings()
    {
        $settings = GeneralSetting::first();

        return response()->json([
            'status' => true,
            'message' => 'Settings',
            'data' => $settings,
        ], 200);
    }

    //sliders
    public function sliders()
    {
        $sliders = Banner::where('category_id', 1)->select('id', 'video', 'link')->get();

        return response()->json([
            'status' => true,
            'message' => 'Sliders',
            'data' => $sliders,
        ], 200);
    }

    public function bigBanner()
    {
        $banner = Banner::where('category_id', 2)->select('id', 'image', 'link', 'text')->first();

        return response()->json([
            'status' => true,
            'message' => 'Big Banner',
            'data' => $banner,
        ], 200);
    }

    public function smallBanner()
    {
        $banner = Banner::where('category_id', 3)->select('id', 'image', 'link', 'text')->first();

        return response()->json([
            'status' => true,
            'message' => 'Small Banner',
            'data' => $banner,
        ], 200);
    }

    public function pages()
    {
        $pages = CreatePage::where('status', 1)->select('name', 'slug', 'title', 'description', 'status')->get();

        return response()->json([
            'status' => true,
            'message' => 'Pages',
            'data' => $pages,
        ], 200);
    }

    public function shopProducts()
    {
        $products = Product::where('status', 1)
            ->select('id', 'name', 'slug', 'new_price', 'old_price')
            ->with('images')
            ->paginate(16);

        return response()->json([
            'status' => true,
            'message' => 'Products',
            'data' => $products,
        ], 200);
    }

    public function featuredCategories()
    {
        $featuredCategories = Category::where('status', 1)
            ->where('isFeatured', 1)
            ->select('id', 'name', 'slug', 'image', 'status')->get();

        return response()->json([
            'status' => true,
            'message' => 'Featured Categories',
            'data' => $featuredCategories,
        ], 200);
    }

    public function navCategories()
    {
        $navCategories = Category::where('status', 1)
            ->where('isNew', 1)
            ->select('id', 'name', 'slug', 'image', 'status')->get();

        return response()->json([
            'status' => true,
            'message' => 'Navbar Categories',
            'data' => $navCategories,
        ], 200);
    }

    public function shopCategories()
    {
        $shopCategories = Category::where('status', 1)
            ->select('id', 'name', 'slug', 'image', 'status')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Shop Categories',
            'data' => $shopCategories,
        ], 200);
    }

    public function searchProducts(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('status', 1)
            ->where('name', 'LIKE', "%{$keyword}%")
            ->select('id', 'name', 'slug', 'new_price', 'old_price')
            ->with('images')
            ->paginate(16);

        return response()->json([
            'status' => true,
            'message' => 'Search Result for "' . $keyword . '"',
            'data' => $products,
        ], 200);
    }

    public function subscription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'string|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');

        $subscription = Subscription::create([
            'email' => $email,
            'status' => 1,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Subscription created successfully',
            'data' => $subscription,
        ], 200);
    }

    public function productsByCategory(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->select('id', 'name', 'slug', 'new_price', 'old_price')
            ->with('images')
            ->paginate(16);

        return response()->json([
            'status' => true,
            'message' => 'Products for Category "' . $category->name . '"',
            'data' => $products,
        ], 200);
    }

    public function frontCategories()
    {
        $categories = Category::where('status', 1)
            ->where('front_view',1)
            ->select('id', 'name', 'slug', 'image', 'status')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Front Categories',
            'data' => $categories,
        ], 200);
    }

    public function productDetails(string $slug)
    {
        $details = Product::where(['slug' => $slug, 'status' => 1])
            ->with('image', 'images', 'category', 'subcategory', 'childcategory')
            ->firstOrFail();

        $shippingCharge = ShippingCharge::where('status', 1)->get();

        $productColors = Productcolor::where('product_id', $details->id)
            ->with('color')
            ->get();

        $productSizes = Productsize::where('product_id', $details->id)
            ->with('size')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Product Details',
            'data' => [
                'product' => $details,
                'shippingCharge' => $shippingCharge,
                'productColors' => $productColors,
                'productSizes' => $productSizes,
            ],
        ], 200);
    }
}













