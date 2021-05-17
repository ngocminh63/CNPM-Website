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

    public function create(){
        return view('user.adduser');
    }
    public function store(AddUserRequest $request){
        
        $this->user->create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'level' => $request->level,
            'address' => $request->address
        ]);
       

        return redirect()->route('user.index')->with('success', 'Thêm người dùng thành công');
       
    }
    public function edit($id){
        $user = $this->user->find($id);
        return view('user.edituser', compact('user'));
    }
    public function update(EditUserRequest $request, $id){
        $this->user->find($id)->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'level' => $request->level,
            'address' => $request->address
        ]);

        return redirect()->route('user.index')->with('success', 'Sửa thông tin người dùng thành công');
    }

    public function delete($id){
        $this->user->find($id)->delete();

        return redirect()->route('user.index')->with('success', 'Xóa người dùng thành công');
    }
}
