<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    public function destroy(){
        Auth::logout();
        
        return redirect('/');
    }
}
