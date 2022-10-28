 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category</h1>
    <a href="{{ url('admin/category/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> Add Category</a>
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
</div> 

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                <td>
                    <a href=""class="btn btn-success">Edit</a>
                    <a href=""class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
</div>