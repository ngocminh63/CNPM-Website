<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){

        $users = $this->user->latest()->paginate(4);
        return view('user.listuser', compact('users'));
    }

   
}
