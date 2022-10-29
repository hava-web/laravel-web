@extends('layouts/admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
        <a href="{{ url('admin/category') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 
       <div class="card-body rounded  shadow p-3 mb-5 bg-white rounded ">
            <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                        @error('slug')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Description</label><textarea name="description" class="form-control"  rows="3">{{ $category->description }}</textarea>
                       @error('description')
                       <small class="text-danger">
                           {{ $message }}
                       </small>
                   @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" multiple>
                        <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px" alt="">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label><br/>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                     </div>
                     <div class="col-md-12 mb-3">
                        <h4>SEO tags</h4>
                     </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Meta Title</label>
                       <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                            @error('meta_title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                       <label for="">Meta keyword</label>
                       <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                    

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end shadow-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
@endsection