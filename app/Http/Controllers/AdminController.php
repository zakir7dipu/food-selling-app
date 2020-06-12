<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $orders = OrderProduct::orderBy('created_at','DESC')->get();
        return view('admin.dashboard',compact('orders'));
    }
}
