@extends('layouts/admin')
@section('content')

@if ($errors->any())
<div class="">
    @foreach ($errors as $error)
        <div class="">{{ $error }}</div>
    @endforeach
</div>
@endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">Edit Slider</h1>
        <a href="{{ url('admin/sliders') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 
    <div class="card-body rounded  shadow p-3 mb-5 bg-white rounded ">
        <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            <div class="mb-3 ">
                <label for="">Title Name</label>
                <input type="text" name="title" value="{{ $slider->title }}" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <textarea name="description"  class="form-control" rows="3">{{ $slider->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" id="">
                <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px" alt="Slider" >
            </div>
            <div class="mb-3 check-status">
                <label for="">Status</label> <br>
                <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : '' }}  id="">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection