<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    public static function getNavigationGroup(): ?string
    {
        return __('main.About');
    }
    public static function getNavigationLabel(): string
    {
        return __('main.About');
    }


    public static function getLabel(): ?string
    {
        return __('main.About');
    }
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make()
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('O\'zbek')
                            ->schema([
                                Forms\Components\TextInput::make('title_uz')
                                    ->label(__('main.Title'))
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true),


                                Forms\Components\RichEditor::make('description_uz')
                                    ->label(__('main.Content'))

                            ]),

                        Forms\Components\Tabs\Tab::make('Русский')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                    ->required()
                                    ->label(__('main.Title'))
                                    ->maxLength(255)
                                    ->live(onBlur: true),
                                Forms\Components\RichEditor::make('description_ru')
                                    ->label(__('main.Content'))
                            ]),


                        Forms\Components\Tabs\Tab::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->required()
                                    ->label(__('main.Title'))
                                    ->maxLength(255)
                                    ->live(onBlur: true),
                                Forms\Components\RichEditor::make('description_en')
                                    ->label(__('main.Content'))


                            ]),
                    ])
                    ->columnSpan('full'),
                Forms\Components\Section::make(__('main.Image'))
                    ->schema([

                        SpatieMediaLibraryFileUpload::make('media')
                            ->collection('about-image')
                            ->maxFiles(5)
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $locale = app()->getLocale();
        return $table
            ->columns([
                TextColumn::make('title_' . $locale),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('about-image')
                    ->label('Image')
                    ->collection('about-image'),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
