@extends('layouts/admin')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Slider List</h1>
        <a href="{{ url('admin/sliders/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm " > Add Slider</a>
    </div> 
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($sliders as $slider)
                  <tr>
                   <td>{{ $slider->id }}</td>
                   <td>{{ $slider->title }}</td>
                   <td>{{ $slider->description }}</td>
                   <td>
                        <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px" alt="Slider" >
                    </td>
                   <td>{{ $slider->status == '0' ? 'Visible':'Hidden' }}</td>
                   <td>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" 
                            onclick="return confirm('Are you sure you want to delete this slider ?')"
                            class="btn btn-danger">Delete</a>
                   </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        {{-- <div class="">
            {{ $colors->links('pagination::bootstrap-5') }}
        </div> --}}
    </div>
@endsection