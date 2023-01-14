@extends('layouts.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Booking Details
                        <a href="{{route('bookings.requests')}}" class="btn btn-primary">Booking Requests</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                @foreach ($booking as $item)

                                <tr>
                                    <th>Booking id</th>
                                    <td>{{$item->booking_id}}</td>
                                </tr>
                                <tr>
                                    <th>Package Name</th>
                                    <td>{{$item->package->PackageName}}</td>
                                </tr>
                                <tr>
                                    <th>Booked By</th>
                                    <td>{{$item->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>Rs.{{$item->package->PackagePrice}}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{$item->package->Days}} days,{{$item->package->Nights}} Nights</td>
                                </tr>
                                <tr>
                                    <th>No of People</th>
                                    <td>{{$item->no_of_people}}</td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td>{{$item->total}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>
                                {{-- <form method="post" enctype="multipart/form-data" action="{{route('booking.update',['id' => $item->booking_id])}}">
                                    @csrf
                                    @method('PUT')
                                    <label for="status">Booking</label>
                                    <input type="radio" id="yes" name="status" value="1" {{($item->status == 1)?'checked':''}}>
                                    <label for="yes">Approve</label>

                                    <input type="radio" id="no" name="status" value="0" {{($item->status == 0)?'checked':''}}>
                                    <label for="no">Cancel</label><br>
                                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                                </td>
                                </tr>
                                </form> --}}
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

