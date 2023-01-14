@extends('layouts.frontend_master')
@section('title','Tour Packages-Details')
@section('content')
<style>
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
</style>
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
<section class="w3l-cta4 py-5">
    <div class="container py-lg-5">
        <div class="image-container">
            <img src="{{asset('assets/packages/'.$package->PackageImage)}}" alt="package image">
        </div>
        <div class="infos">
            <div id="more-infos">
                <h5 class="choose">Description</h5>
                <h5 class="choose">Services</h5>
                <h5 class="choose">Note</h5>
            </div>
            <div id="info-content">
                <span  class="paragraph" style="display: block;">
                 <br> <h3 style="font-size: 20pt">{{$package->PackageLocation}}</h3><hr><br>
                    <p style="text-align: justify"> {{$package->PackageDetails}}</p>
                </span>
                <span class="paragraph" style="display: none;"><br><h3 style="font-size: 20pt">Cost Includes:</h3><hr>
                    <ol>
                        <li>
                            @php
                            $package = str_replace(',', '<ul id="list">
                                     <li id="list">', $package->PackageFeatures);
                        echo ' <ul id="list">
                                     <li id="list">';
                        echo "$package";
                        echo '</li></ul>';
                            @endphp
                        </li>
                    </ol>
                </span>
                <span class="paragraph" style="display: none;">
                <br><h5 style="font-size: 20pt">Greetings Nepal !!!</h5><hr><br>
                  <h5>Necessary Documents For Foreigneers.</h5>
                  <style>
                    #list{
                    list-style: square inside;
                    }
                  </style>
                  <ul id="list">
                       <li id="list">Copy of Passport (More then 6 month Valid Passport).</li>
                       <li id="list">PP Size Photo.</li>
                       <li id="list">Travel Insurance.</li>
                       <li id="list">Arrival and Departure date in Nepal.</li>
                       <li id="list">Total Duration of Stay in Nepal.</li>
                  </ul>
                   <br><h5> Political Movement and other Condition.</h5>
                   <p style="text-align: justify"> Namaste Ghumgham create package and costs are normal situation of Nepal.
                    If Nepal Banda by political movement then transportation cost will be little high then Normal Condition.</p>
                </span>
            </div>
        </div>
            <div class="container" style="margin-top:100px">
                @if (empty(Auth::user()->id))
                <a href="{{ route('register') }}" class="btn btn-success btn-block">Book This Package</a>
                @else
                {{-- {{dd($package_id)}} --}}
                <a  href="/booking/create/{{$package_id}}" class="btn btn-success btn-block">Book This Package</a>
                @endif
            </div>
    </div>
</section>

<script>
const chooseInfo = document.getElementById('more-infos');
const choose = document.getElementsByClassName('choose');
const paragraph = document.getElementsByClassName('paragraph');


function styleItem (a,b,c) {
    a.style.cssText = 'color:white ; border-bottom: 2px solid white ; padding-bottom: 6px';
    b.style.cssText = 'color:black ; border-bottom: none';
    c.style.cssText = 'color:black ; border-bottom: none';
}

function displayPrph (e,f,g) {
        e.style.display = 'block';
        f.style.display = 'none';
        g.style.display = 'none';
}

chooseInfo.addEventListener('click', event => {

       if (event.target === choose[0]) {

                 styleItem (choose[0],choose[1],choose[2])
                 displayPrph (paragraph[0],paragraph[2],paragraph[1])
        }

       else if (event.target === choose[1]) {

                 styleItem (choose[1],choose[0],choose[2])
                 displayPrph (paragraph[1],paragraph[0],paragraph[2])
        }

       else   {
                  styleItem (choose[2],choose[0],choose[1])
                  displayPrph (paragraph[2],paragraph[0],paragraph[1])
        }
});

</script>
@endsection

