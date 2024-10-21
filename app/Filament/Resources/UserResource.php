<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $pluralModelLabel = "Users";

    public static function getNavigationGroup(): ?string
    {
        return 'Manage Access'; 
    }

    public static ?string $label = "user";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')->label('Name'),
            TextColumn::make('nip')->label('NIP'),
            TextColumn::make('email')->label('Email'),
            TextColumn::make('role')
                ->label('Role')
                ->formatStateUsing(function ($record) {
                    $role = json_decode($record->role, true);
                    return $role['name'] ?? 'No role';
                }),
            TextColumn::make('status_permission')->label('Status')
                ->formatStateUsing(function($state){
                    return $state == 0 ? 'Not Allowed' : 'Allowed';
                })
                ->color(function($state){
                    return $state == 0 ? 'danger': 'success';
                }),
            ToggleColumn::make('status_permission')
                ->label('Status verifikasi')
                ->action(function ($record, $column) {
                    $record->status_permission = !$record->status_permission;
                    $record->save();
                }),
        ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
