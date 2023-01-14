@extends('layouts.frontend_master')
@section('title','Tour Bookings-Details')
@section('content')

<!-- about breadcrumb -->
<section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Tour Bookings</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Tour Packages</li>
        </ul>
      </div>
    </div>
  </section>
<section class="w3l-cta4 py-5">
    <div class="container py-lg-5">
        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <h1>Thank you. Your order has been received.</h1><br><br>
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-secondary text-white">
                <tr>
                    <th>Booking ID</th>
                    <th>Package Name</th>
                    <th>Booked Date</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>No of persons</th>
                    {{-- <th>Total</th> --}}
                    <th>Status</th>
                    <th>Payment Status</th>
                    <th>View Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $item)
            <tr>
                <td>{{$item->booking_id}}</td>
                <td>{{$item->package->PackageName}}</td>
                <td>{{$item->booked_date}}</td>
                <td>{{$item->package->Days}} Days,{{$item->package->Nights}} Nights</td>
                <td>Rs.{{$item->package->PackagePrice}}</td>
                <td>{{$item->no_of_people}}</td>
                {{-- <td>Rs.{{$item->total}}</td> --}}
                @if ($item->status == 'approved')
                    <td style="color: green">Booking Accepted</td>
                    @elseif ($item->status == 'canceled')
                    <td style="color: red">Booking Rejected</td>
                    @elseif ($item->status == 'pending')
                    <td style="color: blue">Booking pending</td>
                    @endif
                    <td>
                        @if ($item->status == 'approved' AND $item->payment_status == 0)
                        <p style="color: red">Payment Left</p>
                        @elseif($item->status == 'approved' AND $item->payment_status == 1)
                        <p style="color: green">Payment done</td>
                         @else
                         <p>-</td>
                        @endif
                    </td>
                <td>
                @if ($item->status == 'approved' AND $item->payment_status == 0)
                <a href="{{route('booking.details',$item->booking_id)}}" class="btn btn-secondary">Checkout</a>
                @elseif ($item->status == 'canceled')
                <p style="color: red">Sorry your booking rejected has been rejected.</p>
                @elseif ($item->status == 'pending')
                <p style="color: blue">Please wait for a while your booking request is being verified.</p>
                @endif
                @if($item->status == 'approved' AND $item->payment_status == 1)
                <a href="{{url('print_pdf',$item->booking_id)}}" class="btn btn-primary">Print PDF</a>
                @endif
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
</section>
@endsection

