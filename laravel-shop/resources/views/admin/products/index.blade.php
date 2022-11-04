@extends('layouts/admin')
@section('content')

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="{{ url('admin/products/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm " > Add Product</a>
    </div> 
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if ($product->category)
                            {{ $product->category->name }}
                        @else
                        No Category
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status == '1' ? 'Hidden':'Visible' }}</td>
                    <td>
                        <a href="{{ url('admin/products/'.
                        $product->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No Products Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection