@extends('layouts/admin')
@section('content')

@if (session('message'))
    <div class="alert alert-success"><h4>{{ session('message') }}</h4></div>
@endif
@if ($errors->any())
<div class="">
    @foreach ($errors as $error)
        <div class="">{{ $error }}</div>
    @endforeach
</div>
@endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
        <a href="{{ url('admin/products') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div> 

        <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="seotag-tab" data-toggle="tab" data-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">SEO Tags</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="detail-tab" data-toggle="tab" data-target="#detail" type="button" role="tab" aria-controls="detail" aria-selected="false">Detail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="image-tab" data-toggle="tab" data-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="color-tab" data-toggle="tab" data-target="#color" type="button" role="tab" aria-controls="color" aria-selected="false">Product Color</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" id="">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Product Slug</label>
                        <input type="text" name="slug" id="" value="{{ $product->slug }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Select Brand</label>
                        <select name="brand" class="form-control" id=""> 
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" id="" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" class="form-control" rows="4">{{ $product->description }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                    <div class="mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Keyword</label>
                        <input type="text" value="{{ $product->meta_keyword }}" name="meta_keyword" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" id=""  rows="4" class="form-control">{{ $product->meta_description }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade border p-3" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Original Price</label>
                                <input type="number" value="{{ $product->original_price }}" name="original_price" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Selling Price</label>
                                <input type="number" value="{{ $product->selling_price }}" name="selling_price" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control" id="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending" {{ $product->trending == '1'?'checked':'' }} id="" style="width: 20px; height: 20px";>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 check-status">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{ $product->status == '1'?'checked':'' }} id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                    <div class="mb-3">
                        <label for="">Upload Product Image</label>
                        <input type="file" name="image[]" multiple class="form-control" id=""/>
                    </div>
                    <div class="">
                        @if ($product->productImages)
                            <div class="row">
                                @foreach ($product->productImages as $image)
                                <div class="col-md-2">
                                    <img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;" class="me-4" alt="img">
                                    <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block">Remove</a>
                                </div>  
                                @endforeach
                            </div>
                           
                        @else
                        <h5>No Image Added</h5>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                    <div class="mb-3">
                        <h4>Add Product Color</h4>
                        <label for="">Select Color</label>
                        <div class="row">
                            @forelse($colors as $color)
                            <div class="col-md-3">
                                <div class="p-2 border mb-3">
                                    Color: <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}" id=""/>{{ $color->name }}
                                    <br>
                                    Quantity: <input type="number" name="colorquantity[{{ $color->id }}]" style="width: 70px; border: 1px solid " id="">
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <h1>No Color Not Found</h1>
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Color Name</th>
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->productColors as $prodColor)

                                <tr class="prod-color-tr">
                                    <td>
                                    @if ($prodColor->color)
                                        {{ $prodColor->color->name }}
                                    @else
                                    No Color Found !
                                    @endif
                                    </td>
                                    <td>
                                        <div class="input-group mb-3" style="width: 150px">
                                            <input type="text" value="{{ $prodColor->quantity }}" class="productColorQuantity form-control form-control-sm" name="" id=""/>
                                            <button type="button" value="{{ $prodColor->id }}" class=" updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" value="{{ $prodColor->id }}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
 
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.updateProductColorBtn',function(){

            var product_id = "{{ $product->id }}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);

            if(qty <= 0 )
            {
                alert('Quantity is required')
                return false;
            }

            var data = {
                'product_id' : product_id,
                'prod_color_id' : prod_color_id,
                'qty' : qty,
            }

            $.ajax({
                type : "POST",
                url : "/admin/product-color/" + prod_color_id,
                data : data,
                success: function(respone)
                {
                    alert(respone.message)
                }
            });
        });

        $(document).on('click','.deleteProductColorBtn',function(){

            var prod_color_id = $(this).val();
            var thisClick = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/" + prod_color_id + "/delete",
                success: function(respone){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(respone.message);
                }
            })
        });
    });
</script>

@endsection