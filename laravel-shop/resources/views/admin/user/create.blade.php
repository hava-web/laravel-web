@extends('layouts/admin')

@section('title','Create User')

@section('content')


@if ($errors->any())
<div class="">
    @foreach ($errors as $error)
        <div class="">{{ $error }}</div>
    @endforeach
</div>
@endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">Add User</h1>
        <a href="{{ url('admin/users') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 
    <div class="card-body rounded  shadow p-3 mb-5 bg-white rounded ">
        <form action="{{ url('admin/users') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3  title-color">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="">
                    @error('users')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" id="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Select Role</label>
                    <select name="role_as" class="form-control" id="">
                        <option value="">Select Role</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection