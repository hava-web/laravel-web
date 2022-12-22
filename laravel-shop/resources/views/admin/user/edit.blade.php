@extends('layouts/admin')

@section('title','Edit User')

@section('content')


@if ($errors->any())
<div class="">
    @foreach ($errors as $error)
        <div class="">{{ $error }}</div>
    @endforeach
</div>
@endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="{{ url('admin/users') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 
    <div class="card-body rounded  shadow p-3 mb-5 bg-white rounded ">
        <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3  title-color">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="">
                    @error('users')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control" id="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password"  class="form-control" id="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Select Role</label>
                    <select name="role_as" class="form-control" id="">
                        <option value="">Select Role</option>
                        <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }} >User</option>
                        <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }} >Admin</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection