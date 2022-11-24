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
@endsection