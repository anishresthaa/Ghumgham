@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Slider
                         <a href="list_category.php" class="btn btn-info">List</a>
                    </h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <form action="{{route('update.slider',$slider->id)}}" method="post" id="sliderform" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Heading</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter heading" value="{{$slider->heading}}">
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <input type="text" name="rank" class="form-control" id="rank" placeholder="Enter rank" value="{{$slider->rank}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Description">{{$slider->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <img src="{{asset('assets/slider/'.$slider->image)}}"  width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
                            <input type="radio" name="status" id="active" value="1" {{$slider->status == 1 ? 'checked':''}}>Publish
                            <input type="radio" name="status" id="active" value="0" {{$slider->status == 0 ? 'checked':''}}>Un-Publish
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
