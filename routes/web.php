<?php

use App\Models\List_Lk;
use App\Models\List_Upt;
use App\Models\Role;
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
});

Route::get('/register', function(){
    $roles = Role::all();
    $list_lks = List_Lk::all();
    $list_upts = List_Upt::all();
    return view('auth.register', compact('roles','list_lks','list_upts'));
})->name('register');


// Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified',])
// ->group(function () {
//     Route::get('/dashboard', function () {
//         dd(Auth::user()->role->name);

//         // return view('dashboard');
//     })->name('dashboard');

//     Route::group(['prefix' => 'admin', 'as' => 'filament.'], function () {
//         Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//         Route::post('/dashboard/logout', [CustomAuthController::class, 'logout'])->name('filament.auth.logout');

//     });
// });

Route::get('/dashboard/login', function(){
        return redirect('/');
    });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        // 
        // Route::group(['prefix' => 'dashboard', 'as' => 'filament.'], function () {
        //     Route::get('/dashboard', [\Filament\Http\Controllers\DashboardController::class, 'index'])
        //         ->middleware('auth:sanctum') // Memastikan autentikasi secara eksplisit
        //         ->name('dashboard');
        //     Route::post('/dashboard/logout', [CustomAuthController::class, 'logout'])->name('filament.auth.logout');
        // });
    });
