<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index()
    {
        $pending_orders = Order::where('status', 'pendig')->latest()->get();
        return view('admin.pendingorders', compact('pending_orders'));
    }

    public function ApproveOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'approved';
        $order->save();
        return redirect()->route('pendingorder')->with('message', 'Approve Order');
    }
}
