@extends('layouts.frontend_master')
@section('title','Tour Packages')
@section('content')

  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container">
        <h2 class="title">Tour Packages</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="{{route('home')}}">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Tour Packages</li>
        </ul>
      </div>
    </div>
  </section>
<section class="grids-1 py-5">
    <div class="grids py-lg-5 py-md-4">
        <div class="container">
            <h3 class="hny-title mb-5">Tour Packages</h3>
            <div class="row">
                @foreach ($package as $item)
                <div class="col-lg-4 col-md-4 col-6">
                    <div class="column">
                        <a href="{{route('package_details',$item->id)}}"><img src="{{asset('assets/packages/'.$item->PackageImage)}}" alt="Image" class="image-fluid">
                        </a>
                        <div class="info" style="margin-bottom: 25px; margin-top:10px;">
                            <h4 style="font-size: 20pt;  font-weight: bold; "><a href="{{route('package_details',$item->id)}}">{{$item->PackageName}}</a></h4>
                            <p>{{$item->Days}} Days,{{$item->Nights}} Nights</p>
                            <div class="dst-btm">
                                <h4 style="font-size: 15pt; font-weight: bold; ">Start From </h4>
                              <span>Rs.{{$item->PackagePrice}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
  </div>
</section>
  <!--  //Work gallery section -->
<!-- grids block 5 -->
@endsection

