<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CampaignReview;
use App\Models\Campaign;
use Image;
use Toastr;
use Str;
use File;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        $show_data = Campaign::orderBy('id','DESC')->get();
        return view('backEnd.campaign.index',compact('show_data'));
    }
    public function create()
    {
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.create',compact('products'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'short_description' => 'required',
            'description' => 'required',
            'name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->except(['files']);



        //banner
        if ($request->hasFile('banner')) {
            $image1 = $request->file('banner');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use
            $input['banner']=$image1Url;
        }


// Image One
        if ($request->hasFile('image_one')) {
            $image1 = $request->file('image_one');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image1->getClientOriginalName()));
            $uploadpath1 = 'public/uploads/campaign/';
            $image1->move($uploadpath1, $name1); // Moves the file to the upload path
            $image1Url = $uploadpath1 . $name1;  // Get the file path to save in DB or for further use

            $input['image_one']=$image1Url;
        }

// Image Two
        if ($request->hasFile('image_two')) {
            $image2 = $request->file('image_two');
            $name2 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image2->getClientOriginalName()));
            $uploadpath2 = 'public/uploads/campaign/';
            $image2->move($uploadpath2, $name2); // Moves the file to the upload path
            $image2Url = $uploadpath2 . $name2;  // Get the file path to save in DB or for further use

            $input['image_two']=$image2Url;
        }

// Image Three
        if ($request->hasFile('image_three')) {
            $image3 = $request->file('image_three');
            $name3 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image3->getClientOriginalName()));
            $uploadpath3 = 'public/uploads/campaign/';
            $image3->move($uploadpath3, $name3); // Moves the file to the upload path
            $image3Url = $uploadpath3 . $name3;  // Get the file path to save in DB or for further use
            $input['image_three']=$image3Url;
        }

        $input['slug'] = strtolower(Str::slug($request->name));
        $campaign = Campaign::create($input);

        $images = $request->file('image');
        if($images){

            $name =  time().'-'.$images->getClientOriginalName();
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadPath = 'public/uploads/campaign/';
            $images->move($uploadPath,$name);
            $imageUrl =$uploadPath.$name;

            $pimage  = new CampaignReview();
            $pimage->campaign_id = $campaign->id;
            $pimage->image      = $imageUrl;
            $pimage->save();


        }

        Toastr::success('Success','Data insert successfully');
        return redirect()->route('campaign.index');
    }

    public function edit($id)
    {
        $edit_data = Campaign::with('images')->find($id);
        $select_products = Product::where('campaign_id',$id)->get();
        $show_data = Campaign::orderBy('id','DESC')->get();
        $products = Product::where(['status'=>1])->select('id','name','status')->get();
        return view('backEnd.campaign.edit',compact('edit_data','products','select_products'));
    }

    public function update(Request $request)
    { $this->validate($request, [
        'name' => 'required',
        'short_description' => 'required',
        'description' => 'required',
        'status' => 'required',
    ]);

        $update_data = Campaign::find($request->hidden_id);
        $input = $request->except('hidden_id','product_ids','files','image');
        $image_one = $request->file('image_one');

        // Image One
        if ($request->hasFile('image_one')) {
            // Delete the old image if it exists
            if ($update_data->image_one && file_exists($update_data->image_one)) {
                unlink($update_data->image_one); // Remove the old image
            }

            // Upload and store the new image
            $image_one = $request->file('image_one');
            $name1 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_one->getClientOriginalName()));
            $uploadPath1 = 'uploads/campaign/';
            $image_one->move($uploadPath1, $name1); // Save to the 'uploads/campaign/' folder directly
            $input['image_one'] = $uploadPath1 . $name1; // Add the new image path to the input array
        }

// Image Two
        if ($request->hasFile('image_two')) {
            // Delete the old image if it exists
            if ($update_data->image_two && file_exists($update_data->image_two)) {
                unlink($update_data->image_two); // Remove the old image
            }

            // Upload and store the new image
            $image_two = $request->file('image_two');
            $name2 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_two->getClientOriginalName()));
            $uploadPath2 = 'uploads/campaign/';
            $image_two->move($uploadPath2, $name2); // Save to the 'uploads/campaign/' folder directly
            $input['image_two'] = $uploadPath2 . $name2; // Add the new image path to the input array
        }

// Image Three
        if ($request->hasFile('image_three')) {
            // Delete the old image if it exists
            if ($update_data->image_three && file_exists($update_data->image_three)) {
                unlink($update_data->image_three); // Remove the old image
            }

            // Upload and store the new image
            $image_three = $request->file('image_three');
            $name3 = time() . '-' . strtolower(preg_replace('/\s+/', '-', $image_three->getClientOriginalName()));
            $uploadPath3 = 'uploads/campaign/';
            $image_three->move($uploadPath3, $name3); // Save to the 'uploads/campaign/' folder directly
            $input['image_three'] = $uploadPath3 . $name3; // Add the new image path to the input array
        }









        if($request->hasFile('image')){
            $image_four= $request->file('image');

            $name =  time().'-'.$image_four->getClientOriginalName();
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadPath = 'public/uploads/campaign/';
            $image_four->move($uploadPath,$name);
            $imageUrl =$uploadPath.$name;



            $input['image']= $imageUrl;

        }
        // image four
        $input['slug'] = strtolower(Str::slug($request->name));
        $update_data = Campaign::find($request->hidden_id);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('campaign.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Campaign::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Campaign::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {

        $delete_data = Campaign::find($request->hidden_id);
        $delete_data->delete();

        $campaign = Product::whereNotNull('campaign_id')->get();
        foreach($campaign as $key=>$value){
            $product = Product::find($value->id);
            $product->campaign_id = null;
            $product->save();
        }
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
    public function imgdestroy(Request $request)
    {
        $delete_data = CampaignReview::find($request->id);
        File::delete($delete_data->image);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
