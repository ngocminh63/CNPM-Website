<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;


class AdminController extends Controller
{
    public function loginAdmin(){
        // dd(bcrypt('23456'));
        return view('login');
    }
    public function postLoginAdmin(LoginRequest $request){
        $email =  $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('error','Sai email hoặc mật khẩu')->withInput();
        }
    }
    
    public function logout(){
    	Auth::logout();
    	return redirect()->route('login');
    }
    }
