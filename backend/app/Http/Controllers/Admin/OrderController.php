<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\Print_;

class OrderController extends Controller
{
    public function chuaxuly(){
        $orders = Order::where('TrangThai',0)->paginate(3);
        return view('Backend.orders.chuaxuly', compact('orders'));
    }

    public function chitiet($orderId){

        $order =  Order::find($orderId);
        return view('Backend.orders.chitiet', compact('order'));
    }
    public function xuly($orderId, $trangthai){
        $order = Order::find($orderId);
        $order->TrangThai = $trangthai;
        $order->save();
        return redirect()->route('order.chuaxuly')->with('success', 'Thay đổi trạng thái hóa đơn thành công');
    }
    public function daxuly(){
        $orders = Order::where('TrangThai','>',0)->paginate(3);
        return view('Backend.orders.daxuly', compact('orders'));
    }

    public function tkdoanhthu(Request $request){
        $thoigian = $request->input('thoigian');
        $choose = $request->input('choose');
        if($choose == 'Năm'){
            $orders = Order::where('TrangThai', '=', 1)
                ->whereYear('updated_at',$thoigian)
                ->get();
        }else{
            $year = Carbon::now();
            $orders = Order::where('TrangThai', '=', 1)
                ->whereMonth('updated_at',$thoigian)
                ->whereYear('updated_at',$year)
                ->get();
        }
       return view('Backend.orders.tkdoanhthu', compact('orders','choose','thoigian'));
    }
}
