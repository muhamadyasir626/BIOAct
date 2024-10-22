<?php

namespace App\Filament\Resources\SatwaResource\Pages;

use App\Filament\Resources\SatwaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSatwas extends ListRecords
{
    protected static string $resource = SatwaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
