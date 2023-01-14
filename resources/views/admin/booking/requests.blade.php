@extends('layouts.master')
@section('content')

<div class="modal" tabindex="-1" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('delete/booking')}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('DELETE')
                <div class="modal-header">
                <h5 class="modal-title">Delete package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="booking_delete_id" id="booking_id">
                <p>Are you sure you want to delete</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
                </div>
        </form>
      </div>
    </div>
  </div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bookings Requests
                        {{-- <a href="{{route('bookings.requests')}}" class="btn btn-primary">Booking Requests</a> --}}
                    </h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    @if (session('cancel'))
                    <div class="alert alert-danger">
                        {{session('cancel')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Package Name</th>
                                <th>Booked By</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Bookings</th>
                                <th>Action</th>
                                {{-- <th>Print PDF</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($booking as $item)
                        <tr>
                            <td>{{$item->booking_id}}</td>
                            <td>{{$item->package->PackageName}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->package->PackagePrice}}</td>
                            @if ($item->status == 'approved')
                            <td style="color: green">Booking Accepted</td>
                            @elseif ($item->status == 'canceled')
                            <td style="color: red">Booking Rejected</td>
                            @elseif ($item->status == 'pending')
                            <td style="color: blue">Booking pending</td>
                            @endif
                            <td>
                                @if ($item->status == 'approved' AND $item->payment_status == 0)
                                <p style="color: red">Payment Left</p>
                                @elseif($item->status == 'approved' AND $item->payment_status == 1)
                                <p style="color: green">Payment done</td>
                                 @else
                                 <p>-</td>
                                @endif
                            </td>
                            <td> @if ($item->status == 'canceled')
                                <a href="{{url('approve',$item->booking_id)}}" class="btn btn-success">Approve</a>
                                @elseif ($item->status == 'approved' and $item->payment_status == 0)
                                <a href="{{url('cancel',$item->booking_id)}}" class="btn btn-danger">Cancel</a>
                                @elseif($item->status == 'approved' AND $item->payment_status == 1)
                                <a href="{{url('print_pdf',$item->booking_id)}}" class="btn btn-secondary">Print PDF</a>
                                @else
                                <a href="{{url('approve',$item->booking_id)}}" class="btn btn-success">Approve</a>
                                <a href="{{url('cancel',$item->booking_id)}}" class="btn btn-danger">Cancel</a>
                                @endif
                                {{-- <a href="{{url('edit/'.$item->id)}}" class="btn btn-warning">Edit</a> --}}
                            </td>
                                <td>
                                <a href="{{route('booking.view',['id' => $item->booking_id])}}" class="btn btn-info">View</a>
                                {{-- <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger deletebtn btn-sm" onclick="return confirm('Are You sure')">Delete</a> --}}
                                <button type="button" value="{{$item->booking_id}}" class="btn btn-danger deletebtn">Delete</button>
                            </td>
                            {{-- <td>
                                 @if($item->status == 'approved' AND $item->payment_status == 1)
                                <a href="{{url('print_pdf',$item->booking_id)}}" class="btn btn-secondary">Print PDF</a>
                                @endif
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    </div>


@endsection
@section('scripts')
<script>
$(document).ready(function (){
    $(document).on('click','.deletebtn',function(){
            var id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#booking_id').val(id);
    });
});
</script>
@endsection
