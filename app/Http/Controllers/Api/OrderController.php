<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('FID','ASC')->take(5)->get();
        return new OrderResource(true, 'List 5 Data Order', $orders);
    }

    public function show($FID)
    {
        $orders = Order::find($FID);
        if (!$orders) {
        return new OrderResource(false, 'Data Order Tidak Ditemukan!', null);
        }
        return new OrderResource(true, 'Detail Data Order Ditemukan!', $orders);
    }
}
