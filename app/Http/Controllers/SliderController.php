<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
   public function index()
   {
    $slider = Slider::all();
     return view('admin.slider.index',compact('slider'));
   }

   public function create()
   {
     return view('admin.slider.create');
   }

   public function store(Request $request)
   {
    $slider = new Slider;
    $slider->heading = $request->input('heading');
    $slider->description = $request->input('description');
    $slider->rank = $request->input('rank');

    if($request->hasfile('image'))
    {
        $file=$request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename= time().'.'.$extension;
        $file->move('assets/slider/',$filename);
        $slider->image = $filename;
    }
    $slider->status = $request->input('status') == true ? '1':'0';
    $slider->save();
    return redirect()->back()->with('success','Slider Added Successfully');
   }

   public function edit($id)
   {
    $slider = Slider::find($id);
    return view('admin.slider.edit',compact('slider'));
   }

   public function update(Request $request, $id)
   {
    $slider = Slider::find($id);
    $slider->heading = $request->input('heading');
    $slider->description = $request->input('description');
    $slider->rank = $request->input('rank');
    if($request->hasfile('image'))
    {
        $destination = 'assets/slider/'.$slider->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $file=$request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename= time().'.'.$extension;
        $file->move('assets/slider',$filename);
        $slider->image = $filename;
    }
    $slider->status = $request->input('status') == true ? '1':'0';
    $slider->save();
    return redirect()->route('list')->with('success','Package Updated Successfully');
   }
}
