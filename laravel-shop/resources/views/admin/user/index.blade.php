@extends('layouts/admin')
@section('content')

@section('title','Users List')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="{{ url('admin/users/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm " > Add User</a>
    </div> 
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role_as == '0')
                            <label class="badge btn-primary p-2" for="">User</label>
                        @elseif($user->role_as == '1')
                            <label class="badge btn-success p-2" for="">Admin</label>
                        @else
                            <label class="badge btn-primary" for="">None</label>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/users/'.
                        $user->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Do you want delete this data?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No users Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="">
            {{ $users->links() }}
        </div>
    </div>

@endsection