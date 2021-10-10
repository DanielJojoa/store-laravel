<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user =User::find(Auth::user()->id);
        if($user->hasRole('super-admin')){
            return view('admin');
        
        }else if($user->hasRole('seller')){
            return view('seller');
        }else{
            return view('customer');
        }

    }
}
