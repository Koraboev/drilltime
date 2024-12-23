<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Filament\Resources\PartnerResource\RelationManagers;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function getNavigationGroup(): ?string
    {
        return __('main.Home'); // TODO: Change the autogenerated stub
    }

    public static function getNavigationLabel(): string
    {
        return __('main.Partner'); // TODO: Change the autogenerated stub
    }

    public static function getLabel(): ?string
    {
        return __('main.Partner'); // TODO: Change the autogenerated stub
    }

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
//                        Forms\Components\Tabs::make('Tabs')
//                            ->tabs([
//                                Forms\Components\Tabs\Tab::make('O\'zbek')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('name_uz')
//                                            ->label(__('main.Name'))
//                                            ->required()
//                                            ->maxLength(255)
//                                            ->live(onBlur: true),
//
//
//                                    ]),
//
//                                Forms\Components\Tabs\Tab::make('русский')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('name_ru')
//                                            ->label(__('main.Name'))
//                                            ->required()
//                                            ->maxLength(255)
//                                            ->live(onBlur: true)
//
//
//                                    ]),
//
//
//                                Forms\Components\Tabs\Tab::make('English')
//                                    ->schema([
//                                        Forms\Components\TextInput::make('name_en')
//                                            ->label(__('main.Name'))
//                                            ->required()
//                                            ->maxLength(255)
//                                            ->live(onBlur: true),
//
//
//                                    ]),
//                            ])
//                            ->columnSpan('full'),

                        SpatieMediaLibraryFileUpload::make('media')
                            ->collection('partner-image')
                            ->maxFiles(1)
                            ->hiddenLabel(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_' . app()->getLocale())->label(__('main.Name')),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('partner-image')
                    ->label(__('main.Image'))
                    ->collection('partner-image'),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}