@extends('layouts.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Package Details
                        <a href="{{route('packages.index')}}" class="btn btn-info">List</a>
                        <a href="{{route('packages.create')}}" class="btn btn-primary">Create</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th>Package Name</th>
                                    <td>{{$package->PackageName}}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{$package->PackageLocation}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>Rs.{{$package->PackagePrice}}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{$package->PackageDetails}}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{$package->Days}}Days,{{$package->Nights}}Nights</td>
                                </tr>
                                <tr>
                                    <th>Package Feature</th>
                                    <td>{{$package->PackageFeatures}}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{$package->created_at->diffForHumans()}}</td>
                                </tr>
                            </table>
                        </div>
                </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

