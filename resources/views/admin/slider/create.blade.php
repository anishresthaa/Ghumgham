@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Slider Management
                         <a href="list_category.php" class="btn btn-info">List</a>
                    </h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter heading" value="">
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <input type="text" name="rank" class="form-control" id="rank" placeholder="Enter rank" value="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <input type="radio" name="status" id="active" value="1">Publish
                            <input type="radio" name="status" id="active" value="0" checked>Un-Publish
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSave" id="save" value="Save" class="btn btn-success">
                            <input type="reset" name="btnClear" id="reset" value="reset" class="btn btn-danger">
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
