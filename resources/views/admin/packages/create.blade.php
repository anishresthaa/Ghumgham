@extends('layouts.master')
@section('content')
    <style>
        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 30%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=reset] {
            width: 30%;
            background-color: #c31717;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        input[type=reset]:hover {
            background-color: #cb2c2c;
        }
    </style>
     <!-- Begin Page Content -->
     <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Package
                             <a href="{{route('packages.index')}}" class="btn btn-info">List</a>
                        </h6>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{route('packages.store')}}">
                            @csrf
                            <label for="packagename">Package Name</label>
                            <input type="text" name="packagename" id="packagename" placeholder="Package Name" value="{{old('packagename')}}">
                            <span class="text-danger">
                                    @error('packagename')
                                        {{$message}}
                                    @enderror
                            </span><br>

                            {{-- <label for="packagetype">Package Type</label>
                            <input type="text" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" value="{{old('PackageType')}}"> --}}

                            <label for="packagelocation">Package Location</label>
                            <input type="text" name="packagelocation" id="packagelocation" placeholder=" Package Location" value="{{old('packagelocation')}}">
                            <span class="text-danger">
                                @error('packagelocation')
                                    {{$message}}
                                @enderror
                            </span><br>
                            <label for="packageprice">Package Price in Rs</label>
                            <input type="text" name="packageprice" id="packageprice" placeholder=" Package Price in Rs" value="{{old('packageprice')}}">
                            <span class="text-danger">
                                @error('packageprice')
                                    {{$message}}
                                @enderror
                             </span><br>
                            <label for="packagefeatures">Package Features</label><br>
                            {{-- <input type="text" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" value="{{old('PackageFacility')}}"> --}}
                            <input type="checkbox" name="packagefeatures[]"  id="transportation" value="All Transportation by Private Car/Van/Hiace or Bus."
                            @if (in_array('All Transportation by Private Car/Van/Hiace or Bus.',old('packagefeatures', [])))
                            checked
                            @endif>Transportation.<br>
                            <input type="checkbox" name="packagefeatures[]"  id="hotel" value="All Accomodation on Bed & Breakfast.(5 Star Catageory Hotel)."
                            @if (in_array('All Accomodation on Bed & Breakfast.(5 Star Catageory Hotel).',old('packagefeatures', [])))
                            checked
                            @endif>Hotels<br>
                            <input type="checkbox" name="packagefeatures[]"  id="guide" value="One of our English Speaking Representative/Guide."
                            @if (in_array('One of our English Speaking Representative/Guide.',old('packagefeatures', [])))
                            checked
                            @endif>Guide<br>
                            <input type="checkbox" name="packagefeatures[]"  id="fees" value="All kinds of Entries Fee."
                            @if (in_array('All kinds of Entries Fee.',old('packagefeatures', [])))
                            checked
                            @endif>All kinds of Entries Fee.<br>
                            <input type="checkbox" name="packagefeatures[]"  id="lunch" value="Lunch/Dinner & Drinks."
                            @if (in_array('Lunch/Dinner & Drinks.',old('packagefeatures', [])))
                            checked
                            @endif>Lunch/Dinner & Drinks.<br>

                            <label for="packagedetails">Package Details</label>
                            <textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails"
                                placeholder="Package Details">{{old('packagedetails')}}</textarea><br>
                                <span class="text-danger">
                                    @error('packagedetails')
                                        {{$message}}
                                    @enderror
                            </span><br>

                            <label for="Package Duration">Package Duration</label>
                            <input type="number" name="days" id="days" placeholder="days" value="{{old('days')}}" min="1" max="10">days
                            <input type="number" name="nights" id="nights" placeholder="nights" value="{{old('nights')}}" min="1" max="10">nights<br><br>
                            <span class="text-danger">
                                @error('days')
                                    {{$message}}
                                @enderror
                            </span><br>
                            <span class="text-danger">
                                @error('nights')
                                    {{$message}}
                                @enderror
                            </span><br>

                            <label for="packageimage">Package Image</label>
                            <input type="file" name="packageimage" id="packageimage"><br>
                            <span class="text-danger">
                                @error('packageimage')
                                    {{$message}}
                                @enderror
                            </span><br>

                            <label for="popular">Popular</label>
                            <input type="radio" id="yes" name="popular" value="1" {{old('popular' == 1)?'checked':''}}>
                            <label for="yes">Yes</label>

                            <input type="radio" id="no" name="popular" value="0" {{old('popular' == 0)?'checked':''}} checked>
                            <label for="no">No</label><br>

                            <input type="submit" name="submit" value="submit">
                            <input type="reset" name="reset" value="reset">
                        </form>
                </div>
         </div>
     </div>
 </div>
 <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection
