<?php

use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    $auth=0;
    $data = Auth::user();
    if($data!=null)
    {
        $auth=1;
    }
    return view('welcome',['auth'=>$auth]);
});

Auth::routes();


Route::post('/login_user', [LoginController::class, 'login_user'])->name('login_user');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::group(['middleware'=>'auth'],function(){

    Route::get('view/profile', [App\Http\Controllers\Controller::class, 'profile_form'])->name('profile');
    Route::post('insert/profile', [App\Http\Controllers\Controller::class, 'profile_register'])->name('register_pofile');
    Route::get('update/profile/{id}', [App\Http\Controllers\Controller::class, 'profile_Update']);

    
    Route::get('post', [App\Http\Controllers\Post::class, 'post_form'])->name('post');

    Route::post('post', [App\Http\Controllers\Post::class, 'insert_post'])->name('insert_post');
    Route::get('view_all/post', [App\Http\Controllers\Post::class, 'view_post'])->name('view_post');

    Route::get('view/post', [App\Http\Controllers\Post::class, 'view_all_post'])->name('view_my_post');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/reset_mail', [App\Http\Controllers\Controller::class, 'Reset_mail'])->name('password.email');
Route::get('/confirm/{id}', [App\Http\Controllers\Controller::class, 'update_password']);

Route::post('/change', [App\Http\Controllers\Controller::class, 'change_password'])->name('password.confirm');

Route::get('language/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

