@extends('layouts.frontend_master')
@section('title','Tour Bookings-Details')
@section('content')
{{-- <style>
    .image-container{
    margin:0 auto;
    max-width: 100%;
    max-height: 100%;
    }
    .image-container img{
    width: 100%;
    height: 500px;
    object-fit: cover;
    object-position: center center;
    }
    .infos {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 400px;
    margin-top: 30px;
    width: 100%;
    }
    .infos,#more-infos {
    display: flex;
    padding: 20px;
    border-radius: 10px;
    }
    #more-infos {
    background-color: #FF1654;
    }
    #more-infos h5:hover{
    color: white;
    margin-top: 5px;
    cursor: pointer;
    }
    #more-infos h5 {
    margin-left: 100px;
    }
    #info-content .paragraph {
    margin-bottom: 300px;
    }
    .book{
        display: grid;
        place-items: center;
    }
</style> --}}
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
            <h1>Thank you. Your order has been received.</h1><br><br>
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-secondary text-white">
                <tr>
                    <th>Booking ID</th>
                    <th>Package Name</th>
                    <th>Date</th>
                    <th>price</th>
                    <th>No of persons</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $item)
                <tr>
                    <td>{{$item->booking_id}}</td>
                    <td>{{$item->package->PackageName}}</td>
                    <td>{{$item->booked_date}}</td>
                    <td>Rs.{{$item->package->PackagePrice}}</td>
                    <td>{{$item->no_of_people}}</td>
                    <td>Rs.{{$item->total}}</td>
                    @if ($item->status == 'approved')
                    <td style="color: green">Booking Accepted</td>
                    @elseif ($item->status == 'canceled')
                    <td style="color: red">Booking Rejected</td>
                    @elseif ($item->status == 'pending')
                    <td style="color: blue">Booking pending</td>
                    @endif
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
<br><br>

<div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-secondary text-white">
        <tr>
            <th colspan="2">Booking Details</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Booking ID</td>
        <td>{{$item->booking_id}}</td>
    </tr>
    <tr>
        <td>User Name</td>
        <td>{{$item->user->name}}</td>
    </tr>
    <tr>
        <td>Duration</td>
        <td>{{$item->package->Days}} days,{{$item->package->Nights}} nights</td>
    </tr>
    <tr>
        <td>Package Name</td>
        <td>{{$item->package->PackageName}}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>Rs.{{$item->package->PackagePrice}}</td>
    </tr><tr>
        <td>No. of People</td>
        <td>{{$item->no_of_people}}</td>
    </tr>
    <tr>
        <td>Total</td>
        <td>{{$item->total}}</td>
    </tr>
    <tr>

    </tr>
</tbody>
</table>
<div>
    <a href="{{route('booking.payment',$item->booking_id)}}" class="btn btn-secondary" style="float:right">Payment</a>
    </div>
</div>
    </div>
</section>
@endsection

