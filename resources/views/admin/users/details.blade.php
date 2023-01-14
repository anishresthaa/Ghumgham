@extends('layouts.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Details
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

