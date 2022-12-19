<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $earning = Order::select(
            DB::raw('sum(total_price) as sums'), 
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months")
            )
            ->where('status_message','completed')
            ->groupBy('months')
            ->get();

        $total = Order::select(
            DB::raw('sum(total_price) as total')
            )
            ->where('status_message','completed')
            ->get();

        $orders = Order::where('status_message','!=','canceled')->count();

        $orders_pending = Order::where('status_message','pending')->count();
        return view('admin.dashboard',compact('earning','total','orders','orders_pending'));
    }
    
}
