<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{

    public function index()
    {
        $show_data = Testimonial::latest()->get();

        return view('backEnd.testimonial.index',compact('show_data'));
    }


    public function create()
    {
        return view('backEnd.testimonial.create');
    }


    public function store(Request $request)
    {
        $testimonials = new Testimonial();
        $testimonials->name = $request->name;
        $testimonials->platform = $request->platform;
        $testimonials->description = $request->description;
        $testimonials->date = today();

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = Str::slug($request->name);
            $filename = $name .time(). '.' . $file->getClientOriginalExtension();
            $file->move('public/uploads/testimonials',$filename);
            $testimonials->image = $filename;
        }

        if ($request->profile_img)
        {
            $file = $request->file('profile_img');
            $name = Str::slug($request->name);
            $filename = $name .time(). '.' . $file->getClientOriginalExtension();
            $file->move('public/uploads/testimonials',$filename);
            $testimonials->profile_img = $filename;
        }

        Toastr::success('Success','Data insert successfully');

        return redirect()->route('reviews.index');
    }


    public function show(Testimonial $testimonial)
    {
        //
    }


    public function edit(Testimonial $testimonial)
    {
        //
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }


    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
