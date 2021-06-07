<?php

namespace App\Http\Controllers\Site\Cart;

use App\Components\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ship;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function giohang(Request $request){
        if(!$request->session()->has('logined')){
            return redirect()->route('dangnhap');

        }else{
            $carts = session()->get('cart');
            return view('Frontend.cart.shoppingcart',compact('carts'));
        }
    }

    public function gioHangThem(Request $request, $id){
        if(!$request->session()->has('logined')){
            return redirect()->route('dangnhap');

        }else{
        // session()->flush();
            $product = Product::find($id);
            $cart = session()->get('cart');
            if(isset($cart[$id])){
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            }else{
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1
                ];
            }
            session()->put('cart',$cart);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }
    }

    public function gioHangSua(Request $request){
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart_content = view('Frontend.cart.cart_content', compact('carts'))->render();
            return response()->json(['cart_content' => $cart_content, 'code' => 200]);
        }
    }

    public function gioHangXoa(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart_content = view('Frontend.cart.cart_content', compact('carts'))->render();
            return response()->json(['cart_content' => $cart_content, 'code' => 200]);
        }
    }

    public function ChiPhi($id){
        $ship = Ship::find($id);
        $chiphi = $ship->tenTing;
        dd($chiphi);
        // return response()->json(['result' => $chiphi]);
    }

    public function thanhToan(){
        $ships = Ship::all();
        $carts = session()->get('cart');
        $tong = 0;
        foreach($carts as $id => $cartItem){
            $tong += $cartItem['price']*$cartItem['quantity'];
        }
        return view('Frontend.cart.checkout', compact('ships', 'tong'));
    }
    public function xlThanhToan(Request $request){
        $user = session()->get('user');
        $carts = session()->get('cart');

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $order = Order::create([
            'MaHoaDon' => substr(str_shuffle($permitted_chars), 0, 5),
            'customers_id' => $user,
            'ships_id' =>2,
            'TenNguoiNhan' => $request->fname.$request->lname,
            'DiaChiNhan' =>$request->address,
            'DienThoai' =>$request->tel,
            'TrangThai' => 0
        ]);

        foreach($carts as $id => $cartItem){
            OrderDetail::create([
                'quantity' =>$cartItem['quantity'],
                'products_id' =>$id,
                'orders_id' =>$order->id

            ]);
        }
        $request->session()->forget('cart');
        return redirect()->route('trangchu')->with('success', 'Thêm danh mục thành công');

    }
}
