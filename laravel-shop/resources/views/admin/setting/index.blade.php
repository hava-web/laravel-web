@extends('layouts/admin')
@section('title','Admin Setting')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" class="form-control">
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Website URL</label>
                                <input type="text" name="website_url" class="form-control" id="">
                            </div>
                            <div class="col-md-12 md-3">
                                <label for="">Page Title</label>
                                <input type="text" name="page_title" class="form-control" id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 md-3">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control" rows="3" id=""></textarea>
                            </div>
                            <div class="col-md-6 md-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control" rows="3" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="col-md mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Phone No.1</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Phone No.2</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Email ID 1</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md mb-3">
                                <label for="">Email ID 2</label>
                                <textarea name="address" class="form-control" rows="3"></textarea>
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
                                <input type="text" name="facebook" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter (optional)</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram (optional)</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Youtube (optional)</label>
                                <input type="text" name="facebook" class="form-control">
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