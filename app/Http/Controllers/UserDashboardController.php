<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\package;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Contact;





class UserDashboardController extends Controller
{
    public function dashboard(){
        $package = package::where('popular','1')->get();
        return view('frontend.home',compact('package'));
        // return view('users.dashboard',compact('package'));
    }
    public function admindashboard(){
        $totalUsers = User::where('is_admin','0')->count();
        $totalPackages = package::count();
        $totalBookings = Bookings::count();
        $totalContact = Contact::count();
        return view('admin.dashboard',compact('totalUsers','totalPackages','totalBookings','totalContact'));
    }
}
