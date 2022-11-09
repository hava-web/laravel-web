@extends('layouts/admin')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Colors List</h1>
        <a href="{{ url('admin/colors/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm " > Add Color</a>
    </div> 
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color Name</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->id }}</td>
                    <td>{{ $color->name }}</td>
                    <td>{{ $color->code }}</td>
                    <td>{{ $color->status == '1' ? 'Hidden':'Visible' }}</td>
                    <td>
                        <a href="{{ url('admin/colors/'.
                        $color->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Do you want delete this color?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                {{-- @empty
                <tr>
                    <td colspan="7">No Products Available</td>
                </tr> --}}
            </tbody>
        </table>
        {{-- <div class="">
            {{ $colors->links('pagination::bootstrap-5') }}
        </div> --}}
    </div>
@endsection