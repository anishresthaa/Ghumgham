@extends('layouts.frontend_master')
@section('title','Booking')
@section('content')

  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Booking</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Booking </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
<!-- contact-form -->
<section class="w3l-contact" id="contact">
  <div class="contact-infubd py-5">
    <div class="container py-lg-3">
      <div class="contact-grids row">
        <div class="col-lg-6 contact-left">
          <div class="partners">
            <div class="cont-details">
              <h5>Book Now</h5>
              <p class="mt-3 mb-4">Book your packages at low price.</p>
              <p class="mt-3 mb-4">Note: Please ensure that you have current phone number,email and address. so, that we can contact you.</p>
            </div>
            <div class="hours">
              <h6 class="mt-4">Email:</h6>
              <p> <a href="mailto:ghumgham@gmail.com">
                ghumgham@gmail.com</a></p>
              <h6 class="mt-4">Visit Us:</h6>
              <p>Kathmandu,Nepal.</p>
              <h6 class="mt-4">Contact:</h6>
              <p class="margin-top"><a href="tel:+977-9843123456">+977-9843123456</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
          <form action="{{route('booking.store',['id' => $package->id])}}" method="post" class="signin-form">
            @csrf
            <div class="input-grids">
              <h1 style="color: grey">Booking Details</h1>
                <br>
              <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="book_date" id="book_date" class="contact-input" value="{{old('book_date')}}"/>
              </div>
              <span class="text-danger">
                @error('book_date')
                    {{$message}}
                @enderror
             </span><br>
              <div class="form-group">
                <label for="person">Number of People:</label>
                <input type="number" name="person" id="person" placeholder="Enter Number of People*" class="contact-input" min="1" max="10" value="{{old('person')}}"/>
              </div>
              <span class="text-danger">
                @error('person')
                    {{$message}}
                @enderror
             </span><br>
            </div>
            <div class="col-lg-3">
            <input type="submit" name="btnsubmit" id="submit" value="Submit" class="btn btn-style btn-primary" style="background-color: black;
              color:white;">
            </div>
          </form>

        </div>
      </div>
    </div>
</section>
<!-- /contact-form -->
@endsection






