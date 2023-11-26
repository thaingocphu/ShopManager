<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AccountValidation;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //index function
    public function index(){
        return view('admin.users.login', [
            'title' => 'Welcome to Login'
        ]);
    }
    //store function
    public function store(AccountValidation $request){
        $request->validated();
        //Authentication to check input with database values
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => '1'
        ], 
        $request -> input('remember'))){
            return redirect()->route('admin');
        }
        return redirect()->back();
    }

}
