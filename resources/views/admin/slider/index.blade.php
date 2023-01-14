@extends('layouts.master')
@section('content')

{{-- <div class="modal" tabindex="-1" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{url('delete/')}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('DELETE')
                <div class="modal-header">
                <h5 class="modal-title">Delete package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="package_delete_id" id="package_id">
                <p>Are you sure you want to delete</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
                </div>
        </form>
      </div>
    </div>
  </div> --}}
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Packages List
                        <a href="{{route('packages.create')}}" class="btn btn-primary">Create</a>
                    </h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Heading</th>
                                <th>Rank</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($slider as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->heading}}</td>
                            <td>{{$item->rank}}</td>
                            <td>
                                <img src="{{asset('assets/slider/'.$item->image)}}"  width="70px" height="70px" alt="Image">
                            </td>
                            @if ($item->status == 1)
                            <td style="color: green">Active</td>
                            @else
                            <td style="color: red">Inactive</td>
                            @endif
                            <td>
                                <a href="{{route('edit.slider',$item->id)}}" class="btn btn-warning">Edit</a>
                                {{-- <a href="{{url('view-slider/'.$item->id)}}" class="btn btn-info">View</a> --}}
                                {{-- <a href="{{url('delete/'.$item->id)}}" class="btn btn-danger deletebtn btn-sm" onclick="return confirm('Are You sure')">Delete</a> --}}
                                {{-- <button type="button" value="{{$item->id}}" class="btn btn-danger deletebtn">Delete</button> --}}
                            </td>
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
            $('#package_id').val(id);
    });
});
</script>
@endsection
