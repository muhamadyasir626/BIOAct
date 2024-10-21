<?php 

namespace App\Filament\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responable;

class LogoutResponse implements Responable{
  public function toResponse($request)
  {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect('/');
 } 
}