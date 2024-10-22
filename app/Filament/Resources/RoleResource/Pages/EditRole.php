<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\TextInput;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }    

    protected function afterSave(): void
    {
        $model = $this->record; 
        // $model->slug = Str::slug($model->name, '_');
        $model->save();
        

        // dd($model);

    
        $this->redirect('/dashboard/roles');
    }
    
}
