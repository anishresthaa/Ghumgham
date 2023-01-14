@extends('layouts.frontend_master')
@section('title','Tour Bookings-Details')
@section('content')

<!-- about breadcrumb -->
{{-- <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Tour Bookings</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Tour Packages</li>
        </ul>
      </div>
    </div>
  </section> --}}
<section class="w3l-cta4 py-5" style="margin-top:100px">
    <div class="container py-lg-5">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th colspan="2">User Details</th>
                    </tr>
                    <tr>
                        <th>User id</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    </tr>
                </table>
            </div>
        </div>
</div>
</section>
@endsection

