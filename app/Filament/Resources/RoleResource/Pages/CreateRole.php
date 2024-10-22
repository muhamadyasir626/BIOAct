<?php

namespace App\Filament\Resources\RoleResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Membuat slug dari field name
        $data['slug'] = Str::slug($data['name']);
        return $data;
    }

    protected function afterSave(): void
    {
        // Redirect ke URL /dashboard/roles setelah penyimpanan berhasil
        redirect('/dashboard/roles')->send();
    }
}
