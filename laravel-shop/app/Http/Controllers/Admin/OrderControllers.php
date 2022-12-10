<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderControllers extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');

        $orders = Order::when($request->date != null,function($q) use ($request){
                return $q->whereDate('created_at',$request->date);
        })
                        ->when($request->status != null,function($q) use ($request){
                 return $q->where('status_message',$request->status);
        })
                        ->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }

    public function show($orderId)
    {
        $orders = Order::where('id',$orderId)->first();
        if($orders)
        {
            return view('admin.orders.view',compact('orders'));
        }
        else
        {
            redirect('admin/orders')->with('message','Order Not Found');
        }
    }
}
