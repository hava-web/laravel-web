@extends('layouts.app')
@section('title','All Orders')
    
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>

                        
                        @forelse ($orders as $order)
                        <div class="col-md-12 mb-4">
                            <div class="shadow bg-white p-3">
                                <div class="order-title">
                                    <h5 class="text-primary">
                                        Order id: {{ $order->id }}
                                    </h5>
                                    @if ($order->status_message == "in progress")
                                        <h6 class="bg-primary text-white status ">Status: {{ $order->status_message }}</h6>
                                    @endif
                                    @if ($order->status_message == "completed")
                                        <h6 class="bg-success text-white status">Status: {{ $order->status_message }}</h6>
                                    @endif
                                    @if ($order->status_message == "canceled")
                                        <h6 class="bg-danger text-white status">Status: {{ $order->status_message }}</h6>
                                    @endif
                                    @if ($order->status_message == "pending")
                                        <h6 class="text-white bg-warning status">Status: {{ $order->status_message }}</h6>
                                    @endif
                                </div>
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
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <a href="{{ url('orders/'.$order->id) }}" class="btn btn-primary btn-sm float-end">View Details</a>
                                    </div>
                                </div>
                            </div>     
                                @empty
                                    <tr>
                                        <td colspan="7">You Have No Orders</td>
                                    </tr>
                                          
                                @endforelse
                           <div class="">
                            {{ $orders->links() }}
                           </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection