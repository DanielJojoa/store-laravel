<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('auth', AuthController::class);
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
route::post('/login',function(Request $request){
    $params = $request->all();
    $credentials = ['email'=>$params['email'],'password'=>$params['password']];
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login');
})->name('login.auth');
Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
