@extends('layouts/admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-2 card-header shadow p-3 bg-white rounded">
        <h1 class="h3 mb-0 text-gray-800">All Orders</h1>
        <a href="{{ url('admin/dashboard') }}" class="d-none d-sm-inline-block btn btn btn-primary shadow-sm">Back</a>
    </div>
    {{-- {{ $datePro }}
    {{ $dateNow }}
    {{ $order1 }} --}}
    {{-- {{ $sub }} --}}
    <div class="card-body">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Filter by date</label>
                    <input type="date" value="{{ Request::get('date') /*?? date('Y-m-d')*/ }}" class="form-control" name="date" id="">
                </div>
                <div class="col-md-3">
                    <label for="">Filter by status</label>
                    <select name="status" class="form-select form-control" id="">
                        <option value="">Select Status</option>
                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>In progress</option>
                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                        <option value="canceled" {{ Request::get('status') == 'canceled' ? 'selected':'' }}>Canceled</option>
                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for delivery</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <hr>
    </div>
    <div class="card-body rounded  shadow p-3 mb-5 bg-white rounded ">
            <div class="shadow bg-white p-3">
                <div class="table-responsive">
                    <table class="table bordered table-striped ">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)    
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status_message == "in progress")
                                            <span class="text-uppercase text-white bg-primary status">{{ $order->status_message }}</span>
                                        @endif
                                        @if ($order->status_message == "completed")
                                            <span class="text-uppercase text-white bg-success status">{{ $order->status_message }}</span>
                                        @endif
                                        @if ($order->status_message == "canceled")
                                            <span class="text-uppercase text-white bg-danger status">{{ $order->status_message }}</span>
                                        @endif
                                        @if ($order->status_message == "pending")
                                        <span class="text-uppercase text-white bg-warning status">{{ $order->status_message }}</span>
                                        @endif
                                        @if ($order->status_message == "pending")
                                            
                                        @endif
                                    <td>
                                        <a href="{{ url('admin/orders/'.$order->id) }}" class="btn btn-primary btn-sm float-end">View Details</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">You Have No Orders</td>
                                    </tr>         
                                @endforelse
                            </tbody>
                        </table>
                        <div class="">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>     
   
@endsection