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
        $count = Order::where('status_message','in progress')->count();
        $todayDate = Carbon::now()->format('Y-m-d');
        $date = Carbon::now();
        $dateNow =  Carbon::parse($todayDate)->timestamp;
        $order1 = Order::where('user_id',auth()->user()->id)->first()->created_at;
        $datePro =  Carbon::parse($order1)->timestamp;
        $time = $date->addDays(1)->format('Y-m-d');
        $sub = $dateNow - $datePro;

        $orders = Order::when($request->date != null,function($q) use ($request){
                return $q->whereDate('created_at',$request->date);
        })
                        ->when($request->status != null,function($q) use ($request){
                 return $q->where('status_message',$request->status);
        })
                        ->paginate(10);
        return view('admin.orders.index',compact('orders','todayDate','order1','dateNow','datePro','sub'));
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

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id',$orderId)->first();

        if($order)
        {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/'.$orderId)->with('message','Order Status Updated');
        }
        else
        {
            return redirect('admin/orders/')->with('message','Order ID not found');
        }
    }

    public function viewInvoice(int $ordeId)
    {
        $order = Order::findOrFail($ordeId);
        return view('admin.invoice.generate-invoice',compact('order'));
    }

    public function generateInvoice()
    {
        # code...
    }
}
