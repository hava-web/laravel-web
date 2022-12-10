@extends('layouts.app')
@section('title','Order Details')
    
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> My Order Details
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <h5>Order Detail</h5>
                                <hr>
                                <h6>Order Id: {{ $order->id }} </h6>
                                <h6>Order Created Date: {{ $order->created_at }} </h6>
                                <h6>Payment Mode: {{ $order->payment_mode }} </h6>
                                <h6 class="border p-2 text-primary">
                                    @if ($order->status_message == "in progress")
                                        Order Status: <span class="text-uppercase text-white bg-primary status">{{ $order->status_message }}</span>
                                    @endif
                                    @if ($order->status_message == "completed")
                                        Order Status: <span class="text-uppercase text-white bg-success status">{{ $order->status_message }}</span>
                                    @endif
                                    @if ($order->status_message == "canceled")
                                        Order Status: <span class="text-uppercase text-white bg-danger status">{{ $order->status_message }}</span>
                                    @endif
                                </h6>
                                @if ($order->status_message == "in progress")
                                    
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>User Detail</h5>
                                <hr>
                                <h6>Fullname: {{ $order->user->name }}</h6>
                                <h6>Phone: {{ $order->user->customer->phone }}</h6>
                                <h6>Address: {{ $order->user->customer->address }}</h6>
                            </div>

                            <h5 class="title-items">Order Items</h5>
                            

                                    <div class="table-responsive">
                                        <table class="table bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalPrice = 0;
                                                @endphp
                                                @foreach ($order->orderItem as $item)    
                                                <tr>
                                                    {{-- {{ $item->productColor->color->name }} --}}
                                                    <td style="max-width: 400px">{{ $item->product->name }}
                                                        @if ($item->productColor)
                                                            <p>Color: {{ $item->productColor->color->name }}</p>
                                                        @else
                                                    </td>
                                                    @endif
                                                    <td width="10%">
                                                        @if ($item->product->productImages)
                                                            <img src="{{ asset($item->product->productImages[0]->image) }}" alt="" style="width:50px; height: 50px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>${{ $item->quantity * $item->price }}</td>
                                                </tr>
                                                @php
                                                    $totalPrice += $item->quantity * $item->price;
                                                @endphp
                                                @endforeach
                                                <tr>
                                                    <td colspan="3" class="fw-bold">Total Amount:</td>
                                                    <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection