<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ControllerContact;


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/slider',[SliderController::class,'index'])->name('list');
Route::get('/create/slider',[SliderController::class,'create'])->name('create');
Route::post('/store/slider',[SliderController::class,'store'])->name('store.slider');
Route::get('/edit/slider/{id}',[SliderController::class,'edit'])->name('edit.slider');
Route::put('/update/slider/{id}',[SliderController::class,'update'])->name('update.slider');


Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/package',[HomeController::class,'package'])->name('packages');


Route::get('/booking/index',[BookingsController::class,'index'])->name('booking.index');
Route::get('/booking/details/{id}',[BookingsController::class,'details'])->name('booking.details');
Route::get('/booking/requests',[BookingsController::class,'requests'])->name('bookings.requests');
Route::get('/booking/create/{id}',[BookingsController::class,'create'])->name('booking.create');
Route::post('/booking/{id}',[BookingsController::class,'store'])->name('booking.store');
Route::get('/booking/view/{id}',[BookingsController::class,'view'])->name('booking.view');
Route::get('/booking/payment/{id}',[BookingsController::class,'paymentdetails'])->name('booking.payment');
Route::get('/payment/{id}',[BookingsController::class,'payment']);

Route::get('/product_details/{id}',[PackageController::class,'show'])->name('package_details');

Route::get('/index',[PackageController::class,'index'])->name('packages.index');
Route::get('/create',[PackageController::class,'create'])->name('packages.create');
Route::post('/create',[PackageController::class,'store'])->name('packages.store');
Route::get('/edit/{id}',[PackageController::class,'edit']);
Route::get('/view/{id}',[PackageController::class,'view']);
Route::put('/update/{id}',[PackageController::class,'update']);
// Route::get('/delete/{id}',[PackageController::class,'destroy']);
Route::delete('/delete',[PackageController::class,'destroy']);
Route::delete('/delete/user',[UserController::class,'destroy']);
Route::delete('/delete/booking',[BookingsController::class,'destroy']);




Route::middleware(['auth'])->group(function () {
    Route::get('/adashboard',[UserDashboardController::class,'admindashboard'])->name('admin.dashboard');
    Route::post('/create/message',[ControllerContact::class,'store'])->name('store.contact');



});

        Route::get('/contact/index',[ControllerContact::class,'index'])->name('contact.index');


        Route::get('/approve/{id}',[BookingsController::class,'approve']);
        Route::get('/cancel/{id}',[BookingsController::class,'cancel'])->name('cancel');
        Route::put('/booking/update/{id}',[BookingsController::class,'update'])->name('booking.update');
        Route::get('/print_pdf/{id}',[BookingsController::class,'print_pdf']);


        Route::get('/users/manage',[UserController::class,'index'])->name('users.manage');
        Route::get('/admin/profile',[UserController::class,'profile'])->name('admin.profile');
        Route::get('/user/profile',[UserController::class,'userprofile'])->name('user.profile');
        Route::delete('/delete',[UserController::class,'destroy']);



// Route::get('/',[UserDashboardController::class,'dashboard'])->name('dashboard');


// Route::get('/product_details/{id}',[PackageController::class,'show'])->name('package_details');



// Route::get('/index',[PackageController::class,'index'])->name('packages.index');
// Route::get('/create',[PackageController::class,'create'])->name('packages.create');
// Route::post('/create',[PackageController::class,'store'])->name('packages.store');
// Route::get('/edit/{id}',[PackageController::class,'edit']);
// Route::get('/view/{id}',[PackageController::class,'view']);
// Route::put('/update/{id}',[PackageController::class,'update']);
// // Route::get('/delete/{id}',[PackageController::class,'destroy']);
// Route::delete('/delete',[PackageController::class,'destroy']);

// Route::get('/booking/index',[BookingsController::class,'index'])->name('booking.index');
// Route::get('/booking/details/{id}',[BookingsController::class,'details'])->name('booking.details');
// Route::get('/booking/requests',[BookingsController::class,'requests'])->name('bookings.requests');
// Route::get('/booking/create/{id}',[BookingsController::class,'create'])->name('booking.create');
// Route::post('/booking/{id}',[BookingsController::class,'store'])->name('booking.store');
// Route::get('/booking/view/{id}',[BookingsController::class,'view'])->name('booking.view');
// Route::get('/approve/{id}',[BookingsController::class,'approve']);
// Route::get('/cancel/{id}',[BookingsController::class,'cancel'])->name('cancel');
// Route::put('/booking/update/{id}',[BookingsController::class,'update'])->name('booking.update');
// Route::get('/print_pdf/{id}',[BookingsController::class,'print_pdf']);


// Route::get('/users/manage',[UserController::class,'index'])->name('users.manage');
// Route::get('/admin/profile',[UserController::class,'profile'])->name('admin.profile');
// Route::get('/user/profile',[UserController::class,'userprofile'])->name('user.profile');

// Route::post('/create/message',[ControllerContact::class,'store'])->name('store.contact');



// Route::get('/adashboard',[UserDashboardController::class,'admindashboard'])->middleware(['auth'])->name('admin.dashboard');
