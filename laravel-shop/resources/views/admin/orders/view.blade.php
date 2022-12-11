@extends('layouts/admin')
@section('content')
    
            

            <div class="col-md-12">
                <div class="card-header d-flex flex-row-reverse">
                    <a href="{{ url('admin/invoice/'.$orders->id.'/generate') }}" class="btn btn-primary btn-sm float-end ">Download Invoice</a>
                    <a href="{{ url('admin/invoice/'.$orders->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-3 ">View Invoice</a>
                </div>
                <div class="shadow bg-white p-3 ">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header shadow p-3 mb-5 bg-white rounded">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Order Details
                        </h4>
                        <a href="{{ url('/admin/orders') }}" class="d-none d-sm-inline-block btn btn btn-danger shadow-sm">Back</a>
                    </div>
                   
                    
                    @if (session('message'))
                        <div class="alert alert-success mb-3">{{ session('message') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Detail</h5>
                            <hr>
                            <h6>Order Id: {{ $orders->id }} </h6>
                            <h6>Order Created Date: {{ $orders->created_at }} </h6>
                            <h6>Payment Mode: {{ $orders->payment_mode }} </h6>
                            <h6 class=" p-2 text-primary">
                                @if ($orders->status_message == "in progress")
                                    Order Status: <span class="text-uppercase text-white bg-primary status">{{ $orders->status_message }}</span>
                                @endif
                                @if ($orders->status_message == "completed")
                                    Order Status: <span class="text-uppercase text-white bg-success status">{{ $orders->status_message }}</span>
                                @endif
                                @if ($orders->status_message == "canceled")
                                    Order Status: <span class="text-uppercase text-white bg-danger status">{{ $orders->status_message }}</span>
                                @endif
                                @if ($orders->status_message == "pending")
                                    Order Status: <span class="text-uppercase text-white bg-warning status">{{ $orders->status_message }}</span>
                                @endif
                            </h6>
                            @if ($orders->status_message == "in progress")
                                
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>User Detail</h5>
                            <hr>
                            <h6>Fullname: {{ $orders->user->name }}</h6>
                            <h6>Phone: {{ $orders->user->customer->phone }}</h6>
                            <h6>Address: {{ $orders->user->customer->address }}</h6>
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
                                            @foreach ($orders->orderItem as $item)    
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

                    <div class="card">
                        <div class="card-body">
                            <h5>Order Process</h5>
                            <hr>

                            <div class="row">
                                <div class="col-md-5">
                                    <form action="{{ url('admin/orders/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')  
                                        <label for="">Update status</label>
                                        <div class="input-group">
                                            <select name="order_status" class="form-control" id="">
                                                <option value="">Select Status</option>
                                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>In progress</option>
                                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                                                <option value="canceled" {{ Request::get('status') == 'canceled' ? 'selected':'' }}>Canceled</option>
                                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for delivery</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-7">
                                    <br>
                                    <h5 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $orders->status_message }}</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection