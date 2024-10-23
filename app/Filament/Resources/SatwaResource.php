<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Satwa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\SatwaResource\Pages;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Set;

class SatwaResource extends Resource
{
    protected static ?string $model = Satwa::class;

    protected static ?string $navigationIcon = 'heroicon-s-server-stack';

    protected static ?string $pluralModelLabel = "Satwa";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    wizard\Step::make('informasi_status_satwa')
                        ->label('Informasi Status Satwa')
                        ->schema([
                            //1
                            Radio::make('status_satwa')
                                ->label('Jenis satwa yang akan didata?')
                                ->options([
                                    'koleksi' => 'Satwa Koleksi',
                                    'titipan' => 'Satwa Titipan'
                                ])
                                ->required(),

                            //2
                            Radio::make('asal_satwa')->label('Satwa Indonesia')
                                ->options([
                                    'satwa indonesia' => 'Ya, Satwa asli Indonesia',
                                    'tidak' => 'Tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('show_confirm_satwa_no_sats', $state === 'tidak');
                                    $set('status_perlindungan_visible', $state === 'satwa indonesia');
                                })
                                ->required(),

                            // 3
                            Radio::make('confirm_satwa_no_sats')
                                ->visible(fn($get) => $get('show_confirm_satwa_no_sats'))
                                ->label('Apakah Satwa memiliki No. SATS-LN')
                                ->options([
                                    'ya' => "Ya, Sudah Ada",
                                    'tidak memiliki' => 'Belum atau tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('no_sats_ln_visible', $state === 'ya');
                                })
                                ->required(),

                            //4
                            TextInput::make('no_sats_ln')
                                ->visible(fn($get) => $get('no_sats_ln_visible'))
                                ->label('Nomor SATS-LN')
                                ->required(),

                            //5
                            Radio::make('status_perlindungan')
                                ->visible(fn($get) => $get('status_perlindungan_visible'))
                                ->label('Apakah status dilindungi?')
                                ->options([
                                    'dilindugi' => 'Ya, Dilindungi',
                                    'tidak dilindungi' => 'Tidak, Dilindungi'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('show_confirm_sk_kepala_visible', $state == 'tidak dilindugi');
                                    $set('habitat_satwa_visible', $state == 'dilindugi');
                                })
                                ->required(),

                            //6
                            Radio::make('show_confirm_sk_kepala')
                                ->visible(fn($get) => $get('show_confirm_sk_kepala_visible'))
                                ->label('Apakah satwa memiliki SK Kepala?')
                                ->options([
                                    'ya' => 'Ya, ada',
                                    'tidak' => 'Tidak ada'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('sk_kepala_visible', $state == 'ya');
                                })
                                ->required(),

                            //7
                            TextInput::make('sk_kepala')
                                ->visible(fn($get) => $get('sk_kepala_visible'))
                                ->label('No Surat Keputusan kepala balai')
                                ->required(),

                            //8 
                            Radio::make('habitat_satwa')
                                ->visible(fn($get) => $get('habitat_satwa_visible'))
                                ->label('Satwa berasal dari mana?')
                                ->options([
                                    'alam' => 'Ya, diambil dari alam',
                                    'bukan dari alam' => 'Tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('show_confirm_sk_ksdae_visible', $state == 'bukan dari alam');
                                    $set('show_confirm_sk_menteri_visible', $state == 'alam');
                                })
                                ->required(),

                            //9
                            Radio::make('confirm_sk_ksdae')
                                ->visible(fn($get) => $get('show_confirm_sk_ksdae_visible'))
                                ->label('Apakah satwa memiliki SK Dirjen')
                                ->options([
                                    'ya' => 'Ya, ada',
                                    'tidak' => 'Tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('sk_ksdae_visible', $state == 'ya');
                                }),

                            //10
                            TextInput::make('sk_ksdae')
                                ->visible(fn($get) => $get('sk_ksdae_visible'))
                                ->label('No Surat keputusan DIRJEN KSDAE')
                                ->required(),

                            //11
                            Radio::make('confirm_sk_menteri')
                                ->visible(fn($get) => $get('show_confirm_sk_menteri_visible'))
                                ->label('Apakah satwa memiliki SK Menteri')
                                ->options([
                                    'ya' => 'Ya, ada',
                                    'tidak' => 'tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('show_confirm_sk_menteri_visible', $state == 'alam');
                                })
                                ->required(),

                            //12
                            TextInput::make('sk_menteri')
                                ->visible(fn($get) => $get('show_confirm_sk_menteri_visible'))
                                ->label('No Surat Keputusan Menteri')
                                ->required(),

                        ]),

                    wizard\Step::make('data_satwa')
                        ->label('Data Satwa')
                        ->schema([

                            //1
                            Radio::make('satwa_berkelompok')
                                ->label('Perilaku satwa berkelompok ok?')
                                ->options([
                                    'ya' => 'Ya, berkelompok',
                                    'tidak' => 'TIdak, Individu'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('jenis_kelamin_visible', $state == 'tidak');
                                    $set('jumlah_jantan_visible', $state == 'ya');
                                })
                                ->required(),

                            //2
                            Radio::make('jenis_kelamin')
                                ->visible(fn($get) => $get('show_confijenis_kelamin_visiblerm_sk_menteri_visible'))
                                ->label('Jenis kelamin satwa')
                                ->options([
                                    'laki-laki' => 'Laki-laki',
                                    'perempuan' => 'Perempuan'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('confirm_tagging', $state == 'laki-laki' || $state == 'perempuan');
                                })
                                ->required(),

                            //3
                            Radio::make('sudah_tagging')
                                ->visible(fn($get) => $get('confirm_tagging'))
                                ->label('Apakah sudah ditangging?')
                                ->options([
                                    'ya' => 'Ya, Sudah',
                                    'tidak' => 'Tidak'
                                ])
                                ->reactive()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $set('jenis_tagging_visible', $state == 'ya');
                                }),

                            //4
                            Textinput::make('jenis_tagging')
                                ->visible(fn($get) => $get('jenis_tagging_visible'))
                                ->label('Jenis Tagging')
                                ->required(),

                            //5
                            Textinput::make('kode_tagging')
                                ->visible(fn($get) => $get('jenis_tagging_visible'))
                                ->label('Kode Tagging')
                                ->required(),

                            //6
                            TextInput::make('jumlah_jantan')
                                ->visible(fn($get) => $get('jumlah_jantan_visible'))
                                ->label('Jumlah Jantan')
                                ->required(),

                            //7
                            TextInput::make('jumlah_betina')
                                ->visible(fn($get) => $get('jumlah_jantan_visible'))
                                ->label('Jumlah betina')
                                ->required(),

                            //8
                            TextInput::make('jumlah_unsex')
                                ->visible(fn($get) => $get('jumlah_jantan_visible'))
                                ->label('Jumlah unsex')
                                ->required()
                        ]),
                    
                ])
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
