@extends('layouts.frontend_master')
@section('title','Contact')
@section('content')

  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Contact Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact </li>
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
              <h5>Get in touch</h5>
              <p class="mt-3 mb-4">Hi there, We are available 24/7 by fax, e-mail or by phone. Drop us line so we can talk
                futher about that.</p>
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
            @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data" class="signin-form" reqired>
                @csrf
            <div class="input-grids">
              <div class="form-group">
                <input type="text" name="name" id="w3lName" placeholder="Your Name*" class="contact-input" />
              </div>
              <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span><br>
              <div class="form-group">
                <input type="email" name="email" id="w3lSender" placeholder="Your Email*" class="contact-input" />
                <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span><br>

              </div>
              <div class="form-group">
                <input type="text" name="subject" id="w3lSubect" placeholder="Subject*" class="contact-input" />
              </div>
              <span class="text-danger">
                @error('subject')
                    {{$message}}
                @enderror
        </span><br>
            </div>
            <div class="form-group">
              <textarea name="message" id="w3lMessage" placeholder="Type your message here*" ></textarea>
            </div>
            <span class="text-danger">
                @error('message')
                    {{$message}}
                @enderror
        </span><br>
            <div class="text-right">
              <button type="submit" style="background-color: black" class="btn btn-style btn-primary">Send Message</button>
            </div>
          </form>
        </div>

      </div>
      {{-- <div class="map mt-5 pt-md-5">
        <h5>Map</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86654334463!2d-74.25818682528057!3d40.70531100753592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1493028309728"
          style="border:0" allowfullscreen=""></iframe>
      </div> --}}
    </div>
</section>
<!-- /contact-form -->
@endsection






