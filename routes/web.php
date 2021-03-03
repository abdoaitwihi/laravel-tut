<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'show']);


use App\Http\Controllers\MenuItemController;
Route::resource('menu-items', MenuItemController::class);










Route::get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');