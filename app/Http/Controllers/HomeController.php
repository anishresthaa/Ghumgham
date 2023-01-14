<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\package;
use App\Models\Slider;

class HomeController extends Controller
{
    public function home(){
        $package = package::where('popular','1')->get();
        $slider = Slider::where('status','1')->get();
        // $sll = [];
        // foreach($slider as $sl){
        //     $sll[] = asset('assets/slider/' .$sl->image);
        // }
        return view('frontend.home',compact('package','slider'));
    }

    public function About(){
        return view('frontend.about');
    }

    public function package(){
        $package = package::all();
        return view('frontend.packages',compact('package'));
    }
    public function booking($id){

        return package::find($id);
    }
    public function contact(){
        return view('frontend.contact');
    }

    public function sesssioncheck(){
        if (!isset(auth()->user()->id))
        {
            //Messages here
            return redirect('frontend.home');
        }
    }
}
