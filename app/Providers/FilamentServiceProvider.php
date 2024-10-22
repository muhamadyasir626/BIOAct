<?php 
namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->bootFilamentUserMenu();
        
    }

    protected function bootFilamentUserMenu()
    {
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'user.profile' => UserMenuItem::make()
                    ->label('Profile')
                    ->url(route('profile.show'))  
                    ->icon('heroicon-o-user-circle'),
            ]);
            
        });
    }
}
