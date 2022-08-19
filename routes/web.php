<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/controlPanel', function(){
    if (Auth::check()){
        if (auth()->user()->type == 'user')
            return Redirect::to('user/home');
        if (auth()->user()->type == 'admin')
            return Redirect::to('/admin/home');
    }
    else return Redirect::to('/');
});

Route::get('/logout', function(){
   Session::flush();
   Auth::logout();
   return redirect('/login');
});

Auth::routes(['verify' => true]);

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');
});

Route::post('/user/edit/name', function(\http\Env\Request $request){

});
Route::post('/user/edit/email', function(\http\Env\Request $request){

});
Route::post('/user/edit/url', function(\http\Env\Request $request){

});
Route::post('/user/delete', function(\http\Env\Request $request){

});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

//    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::redirect('/admin/home', 'user')->name('admin.home');
    Route::resource('/admin/user', UserController::class);
});
