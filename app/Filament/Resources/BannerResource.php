<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;


    public static function getNavigationGroup(): ?string
    {
        return  __('main.Home');
    }
    public static function getNavigationLabel(): string
    {
         return  __('main.Banner');
    }
    public static function getLabel(): ?string
    {
        return  __('main.Banner');
    }

    protected static ?int $navigationSort=1;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('O\'zbek')
                            ->schema([
                                Forms\Components\TextInput::make('title_uz')

                                    ->required()
                                    ->label(__('main.Title'))
                                    ->maxLength(255)
                                    ->live(onBlur: true),


                                Forms\Components\RichEditor::make('description_uz')
                                    ->label(__('main.Content'))

                            ]),

                        Forms\Components\Tabs\Tab::make('русский')
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
                            ->collection('banner-image')
                            ->maxFiles(5)
                            ->imageEditor()
                            ->optimize('webp')
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $locale=app()->getLocale();
        return $table
            ->columns([
                TextColumn::make('title_'.$locale)->label(__('main.Title')),

                Tables\Columns\SpatieMediaLibraryImageColumn::make('banner-image')
                    ->label(__('main.Image'))
                    ->collection('banner-image'),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
