<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\package;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;



class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Bookings::where('user_id',Auth::id())->get();
        return view('frontend.booking.list',compact('booking'));
    }

    public function details($id)
    {
        $booking = Bookings::where('booking_id', $id)->get();
        return view('frontend.booking.details',compact('booking'));
    }

    public function requests()
    {
        $booking = Bookings::all();
        return view('admin.booking.requests',compact('booking'));

    }
    public function view($id)
    {

    $booking = Bookings::where('booking_id', $id)->get();
   return view('admin.booking.view', compact('booking'));
   }

   public function approve($id)
    {
    $booking = Bookings::where('booking_id', $id)->first();
    $booking->status='approved';
    $booking->save();
   return redirect()->back()->with('success','Booking Approved Successfully');
   }

    public function cancel($id)
    {
        $booking = Bookings::where('booking_id', $id)->first();
        $booking->status='canceled';
        $booking->save();
       return redirect()->back()->with('cancel','Booking Canceled Successfully');
       }

    public function print_pdf($id)
    {   $booking=Bookings::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('booking'));
        return $pdf->download('booking_details.pdf');
    }

    public function paymentdetails($id)
    {
        $booking = Bookings::where('booking_id', $id)->get();
        return view('frontend.booking.payment',compact('booking'));
    }

    public function payment(Request $request,$id)
    {
    $booking = Bookings::where('booking_id', $id)->first();
    $total=  $booking->total;
    $request->validate([
        'recieved_amount'=>'required|numeric|in:'.$total
    ],
    [
        'recieved_amount.required' => 'Please enter amount to make payment.',
        'recieved_amount.in' => 'Amount must be equal to total payable amount.'
    ]);
    $booking = Bookings::where('booking_id', $id)->first();
    $booking->recieved_amount = $request->input('recieved_amount');
    $booking->total=$booking->total-$booking->recieved_amount;
    $booking->payment_status='1';
    // $booking->total=$booking->total-$booking->total;
    $booking->save();
   return redirect()->route('booking.index')->with('success','Your payment has been done Successfully');
   }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // return $id;

    //  $package_detail = package::where('id',$id)->get();
        $package = package::find($id);
        return view('frontend.booking.create',compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        // $booking = Bookings::where('booking_id', $id)->get();
        $date = Carbon::now();
        $after_date= Carbon::now()->addMonth();
        $request->validate([
            'person'=>'required|numeric',
            // 'book_date'=>'required|after:today|before:'.$date
            'book_date' => 'required|after:' . $date->toDateString().'|before_or_equal:' . $after_date->toDateString()
        ]);
        $bookings = new Bookings;
        $bookings->package_id = $id;
        $bookings->user_id = auth()->user()->id;
        $bookings->no_of_people = $request->input ('person');
        $package = package::find($id);
        $bookings->total = $request->input('person') *$package->PackagePrice;
        $bookings->booked_date = $request->input('book_date');
        $bookings->payment_status = $request->input('payment_status');
        $bookings->status = 'pending';
        $bookings->save();
    return redirect()->route('booking.index',['id'=>auth()->user()->id])->with('success','Your Package has been booked Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $package = package::find($id);
    return view('frontend.booking.list', compact('package'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = package::find($id);
        return view('frontend.package_details', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookings = new Bookings;
        $bookings->package_id = $id;
        $bookings->user_id = auth()->user()->id;
        $bookings->no_of_people = $request->input ('person');
        $package = package::find($id);
        $bookings->total = $request->input ('person') *$package->PackagePrice;
        $bookings->booked_date = $request->input('book_date');
        $bookings->payment_status = $request->input('payment');
        $bookings->status = $request->input('status');
        $bookings->update();
    return redirect()->route('bookings.requests')->with('success','Your work has been saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('booking_delete_id');
       $booking = Bookings::find($id);
       $booking->delete();
   return redirect()->back()->with('success','Booking Deleted Successfully');
    }
}
