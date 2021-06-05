<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::latest()->paginate(4);
        return view('Backend.customer.index', compact('customers'));
    }

    public function thongke($id){
        $name = Customer::find($id)->fullname;
        $orders =  Order::where('customers_id', '=', $id)->get();
        return view('Backend.customer.thongke', compact('orders', 'name'));
    }
}
