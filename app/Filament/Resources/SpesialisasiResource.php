<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpesialisasiResource\Pages;
use App\Filament\Resources\SpesialisasiResource\RelationManagers;
use App\Models\Spesialisasi;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpesialisasiResource extends Resource
{
    protected static ?string $model = Spesialisasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_hewan')
                    ->label('Nama Spesialisasi Hewan')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->placeholder('Contoh: Kucing, Ikan, Sapi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_hewan')
                ->label('Nama Spesialisasi Hewan')
                ->searchable()
                ->sortable(),
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
            'index' => Pages\ListSpesialisasis::route('/'),
            'create' => Pages\CreateSpesialisasi::route('/create'),
            'edit' => Pages\EditSpesialisasi::route('/{record}/edit'),
        ];
    }
}
