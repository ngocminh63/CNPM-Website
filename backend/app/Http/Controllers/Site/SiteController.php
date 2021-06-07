<?php

namespace App\Http\Controllers\Site;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    // public function index(){
    //     return view('Frontend.index');
    // }
    public function login(){
        // dd(bcrypt('23456'));
        return view('Frontend.login');
    }
    public function postLogin(LoginRequest $request){
        $email =  $request->email;
        $password = $request->password;

        $customer = Customer::where('email','=',$email)->where('password','=',md5($password))->count();
        if($customer>0){
            $customers = Customer::where('email','=',$email)->first();
            $request->session()->put('logined', 'true');
            $request->session()->put('user', $customers->id);
            return redirect()->route('sanpham.index');
        }else{
            return redirect()->back()->with('error','Sai email hoặc mật khẩu')->withInput();

        }
    }

    public function signup(){
        // dd(bcrypt('23456'));
        return view('Frontend.signup');
    }
    public function postSignup(SignupRequest $request){
        $customer = new Customer();
        $customer->fullname = $request->fullname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->gender = $request->gender;
        if($request->password == $request->psw_repeat){
            $customer->password = md5($request->password);
        }else{
            $customer->password = '';
        }
        $customer->save();

        // DB::insert('insert into customers (fullname, email, password, phone, gender, address) values (?, ?, ?, ?, ?, ?)', [$request->fullname, $request->email, $request->password, $request->phone, $request->gender, $request->address]);
        
        // Customer::create([
        // 'fullname' => $request->fullname,
        // 'email' => $request->email,
        // 'phone' => $request->phone,
        // 'address' => $request->address,
        // 'gender' => $request->gender,
        // 'password' => md5($request->password)
        
        // ]);
       
        return redirect()->route('dangnhap')->with('success', 'Thêm người dùng thành công');

    }

    public function dangxuat(Request $request){
        $request->session()->forget('logined');
        $request->session()->forget('cart');
        $request->session()->forget('user');
        return redirect()->route('trangchu');
    }
}



   

   




