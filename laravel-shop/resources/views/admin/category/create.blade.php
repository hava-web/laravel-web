@extends('layouts/admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
        <a href="{{ url('admin/category/create') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 
       <div class="card-body ">
            <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Description</label><textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" multiple>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label><br/>
                        <input type="checkbox" name="status">
                     </div>
                     <div class="col-md-12 mb-3">
                        <h4>SEO tags</h4>
                     </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Meta Title</label>
                       <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Meta keyword</label>
                       <textarea type="text" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" rows="3"></textarea>
                    </div>
                    

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primay float-end shadow-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
@endsection