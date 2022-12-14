@extends('layouts.app')
@section('title','Home Page')
    
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">

    @foreach ($sliders as $key => $slider)
      <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
        @if ($slider->image)
        <img src="{{ asset("$slider->image") }}" class="d-block w-100" alt="...">
        @endif
        {{-- <div class="carousel-caption d-none d-md-block">
          <h5>{{ $slider->title }}</h5>
          <p>{{ $slider->description }}</p>
        </div> --}}
        <div class="carousel-caption ">
          <div class="custom-carousel-content">
            <h1>
              <span>{{ $slider->title }}</span>
            </h1>
            <p>{{ $slider->description }}</p>
            <div class="">
                <a href="" class="btn btn-slider">Get Now</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      
  </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Prev</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="sr-only">Next</span>
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>

  <div class="py-3 bg-white">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h4>Welcome To Laravel Shopping</h4>
          <div class="underline"></div>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio laborum similique aliquam, libero accusamus sed veritatis explicabo magni commodi in maiores modi ipsum necessitatibus sapiente laboriosam eum quisquam quod id?</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Trending Product</h4>
          <div class="underline mb-4"></div>
        </div>
        @if ($trendingProducts)
        <div class="row">
          <div class="owl-carousel owl-theme product-trending">
            @foreach ($trendingProducts as $product)
            <div class="item">
                <div class="product-card">
                    <div class="product-card-img">
                      <label for="" class="stock bg-success">New</label>
                        @if ($product->productImages->count() > 0)
                        <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                            <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                        </a>
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $product->brand }}</p>
                        <h5 class="product-name">
                        <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->name) }}">
                               {{ $product->name }} 
                        </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{ $product->selling_price }}</span>
                            <span class="original-price">${{ $product->original_price }}</span>
                        </div>
                        {{-- <div class="mt-2">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn btn1">Add To Cart</button>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        </div>    
          @else
          <div class="col-md-12">
              <div class="p-2">
                  <h4>No Product Available for {{ $category->name }}</h4>
              </div>
          </div> 
          @endif
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
      $('.product-trending').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
@endsection