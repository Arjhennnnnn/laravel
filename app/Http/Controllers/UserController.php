<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Employees;
use App\Models\User;

class UserController extends Controller
{


    public function register(){
        return view('user.register',['title' => 'Register']);
    }

    public function create(Request $request){
        $validate = $request -> validate([
            "name" => ['required','min:4'],
            "email" => ['required','email',Rule::unique('users','email')],
            "password" => 'required|confirmed|min:6',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $user = User::create($validate);
        return redirect('/register')->with('message','Register Successfully');
    }


    public function login(){
        return view('user.login',['title' => 'Login']);
    }

    public function process(Request $request){
        $validate = $request -> validate([
            "email" => ['required'],
            "password" => 'required',
        ]);
        if(auth()->attempt($validate)){
            $request->session()->regenerate();
            return redirect('/supervisor')->with('message','Welcome Back');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/userlogin')->with('message','Logout Successfully');
    }

    


      
}
