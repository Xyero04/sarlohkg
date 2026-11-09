<?php

use App\Http\Controllers\GoPath;
use App\Http\Controllers\Logincontrol;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Logincontrol::class,'display']);

Route::post('/login',[Logincontrol::class,'checking']);

Route::get('/dashboard/order',[GoPath::class,'goOrder']);
Route::get('/dashboard/kitchen',[GoPath::class,'goKitchen']);
Route::get('/dashboard/finance',[GoPath::class,'goFinance']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
