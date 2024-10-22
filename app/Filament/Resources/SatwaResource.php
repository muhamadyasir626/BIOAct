<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Satwa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SatwaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SatwaResource\RelationManagers;

class SatwaResource extends Resource
{
    protected static ?string $model = Satwa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = "Satwa";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_lk')->label('Lembaga Konservasi'),
                TextColumn::make('jenis_koleksi')->label('Jenis Koleksi'),
                TextColumn::make('tipe_spesies')->label('Jenis Spesies'),
                TextColumn::make('status_perlindungan')->label('Status Perlindungan'),
                TextColumn::make('nama_lokal')->label('Nama Lokal'),
                TextColumn::make('nama_ilmiah')->label('Nama Ilmiah'),
                TextColumn::make('status_satwa')->label('Status Satwa'),
                TextColumn::make('jumlah_jantan')->label('Jumlah Jantan'),
                TextColumn::make('jumlah_betina')->label('Jumlah Betina'),
                TextColumn::make('id_tagging')->label('Jenis Tagging'),
                TextColumn::make('kode_tagging')->label('Kode Tagging'),
                TextColumn::make('alasan_belum_tangging')->label('Alasan Belum Tagging'),
                TextColumn::make('alasan_belum_tangging')->label('Alasan Belum Tagging'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSatwas::route('/'),
            'create' => Pages\CreateSatwa::route('/create'),
            'edit' => Pages\EditSatwa::route('/{record}/edit'),
        ];
    }
}
