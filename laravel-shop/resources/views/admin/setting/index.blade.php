@extends('layouts/admin')
@section('title','Admin Setting')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <form action="{{ url('/admin/setting') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">Website Name</label>
                                <input type="text" value="{{ $setting->website_name }}" name="website_name" class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Website URL</label>
                                <input type="text" value="{{ $setting->website_url }}" name="website_url" class="form-control" id="">
                            </div>
                            <div class="col-md-12 md-3">
                                <label for="">Page Title</label>
                                <input type="text" value="{{ $setting->page_title }}" name="title" class="form-control" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control" rows="3" id="">{{ $setting->meta_keyword }}</textarea>
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control" rows="3" id="">{{ $setting->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="">Phone No.1</label>
                                <input name="phone1" value="{{ $setting->phone1 }}" class="form-control" >
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Phone No.2</label>
                                <input name="phone2" value="{{ $setting->phone2 }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md mb-3">
                                <label for="">Email ID 1</label>
                                <input name="email1" value="{{ $setting->email1 }}" class="form-control" >
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Email ID 2</label>
                                <input name="email2" value="{{ $setting->email2 }}" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Facebook (optional)</label>
                                <input type="facebook" value="{{ $setting->facebook }}" name="facebook" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter (optional)</label>
                                <input type="twitter" value="{{ $setting->twitter }}" name="twitter" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram (optional)</label>
                                <input type="instagram" value="{{ $setting->instagram }}" name="instagram" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Youtube (optional)</label>
                                <input type="youtube" value="{{ $setting->youtube }}" name="youtube" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection