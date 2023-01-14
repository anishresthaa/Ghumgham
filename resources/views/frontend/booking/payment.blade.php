@extends('layouts.frontend_master')
@section('title','Contact')
@section('content')

  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Payment</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Payment </li>
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
            <img src="{{asset('assets/images/about-img.jpg')}}" class="img-fluid" alt="">
          </div>
        </div>
        <div class="col-lg-6 mt-lg-0 mt-5 contact-right">
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @foreach ($booking as $item)
            <form action="{{url('payment',$item->booking_id)}}" class="signin-form">
                @csrf
            <div class="input-grids">
              <div class="form-group">
                <label for="name">Userame</label>
                <input type="text" name="name" id="w3lName" class="contact-input" value="{{$item->user->name}}" disabled/>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="w3lSender" class="contact-input" value="{{$item->user->email}}" disabled/>
                <span class="text-danger">
              </div>
              <div class="form-group">
                <label for="phone">Phone number</label>
                <input type="number" name="phone" id="w3lSubect" class="contact-input" value="{{$item->user->phone}}" disabled/>
              </div>
            </div>
            <div class="form-group">
              <label for="phone">Total Payable Amount</label>
              <input type="number" name="total" id="w3lSubect" class="contact-input" value="{{$item->total}}" disabled/>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="total">Enter Amount</label>
                    <input type="number" name="recieved_amount" id="w3lSubect" class="contact-input" />
                    <span class="text-danger">
                      @error('recieved_amount')
                          {{$message}}
                      @enderror
                  </span><br>
                  </div>
                </div>
                @endforeach
            <div class="text-right">
        {{-- <a href="{{url('payment',$item->booking_id)}}" style="background-color: black" class="btn btn-style btn-primary">Make Payment</a> --}}
        {{-- <a href="{{url('payment',$item->booking_id)}}" style="background-color: black" class="btn btn-style btn-primary"> --}}
          <button type="submit" style="background-color: black" class="btn btn-style btn-primary">Make Payment</button>
        {{-- </a> --}}
            </div>
          </form>
        </div>

      </div>
    </div>
</section>
<!-- /contact-form -->
@endsection



<div class="form-group">
    <label for="total">Total Amount</label>
    <input type="number" name="total" id="w3lSubect" placeholder="Subject*" class="contact-input" value="{{$item->total}}" disabled/>
  </div>
</div>

