<?php

use App\Models\Role;
use App\Models\User;
use App\Models\List_Lk;
use App\Models\List_Upt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('filament.dashboard.auth.login');

Route::get('/permission', function(){
    return view('permission');
})->name('permission');

Route::get('/register', function(){
    $roles = Role::all();
    $list_lks = List_Lk::all();
    $list_upts = List_Upt::all();
    return view('auth.register', compact('roles','list_lks','list_upts'));
})->name('register');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        // Route::get('/dashboard', function () {
        //             // dd(Auth::user()->role->name);
            
        //             // return view('dashboard');
        //         })->name('filament.dashboard.pages.dashboard');

        // Route::group(['prefix' => 'dashboard', 'as' => 'filament.'], function () {
        //     Route::get('/dashboard', [\Filament\Http\Controllers\DashboardController::class, 'index'])
        //         ->middleware('auth:sanctum') 
        //         ->name('filament.dashboard.pages.dashboard');
        // });
    });

Route::get('/dashboard/login', function(){
        return redirect('/');
    });


