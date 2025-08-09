<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Models\Vet;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('vet_id')
                    ->label('Author')
                    ->relationship('vet', 'nama')
                    ->required(),
                TextInput::make('judul')
                    ->label('Judul Artikel')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('isi')
                    ->label('Isi Artikel')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('gambar')
                    ->label('Thumbnail')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9', '4:3', '1:1',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Thumbnail')
                    ->circular()
                    ->size(40),
                TextColumn::make('vet.nama')
                    ->label('Nama Vet')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable()
                    ->limit(50),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
