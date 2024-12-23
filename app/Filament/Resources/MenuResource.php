<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;
    public static function getLabel(): ?string
    {
        return __('main.Menu');
    }
    public static function getNavigationLabel(): string
    {
        return __('main.Menu');
    }

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Menu')
                ->schema([
                    Forms\Components\Tabs::make('Tabs')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make('O\'zbek')
                                ->schema([
                                    Forms\Components\TextInput::make('name_uz')
                                        ->label(__('main.Title'))
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true),
                                    Forms\Components\RichEditor::make('description_uz')
                                    ->label(__('main.Content'))

                                ]),

                                Forms\Components\Tabs\Tab::make('Русский')
                                ->schema([
                                    Forms\Components\TextInput::make('name_ru')
                                        ->label(__('main.Title'))
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true),
                                    Forms\Components\RichEditor::make('description_ru')
                                        ->label(__('main.Content'))
                                ]),


                            Forms\Components\Tabs\Tab::make('English')
                                ->schema([
                                    Forms\Components\TextInput::make('name_en')
                                        ->label(__('main.Title'))
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true),
                                    Forms\Components\RichEditor::make('description_en')
                                        ->label(__('main.Content'))

                                ]),
                        ])
                        ->columnSpan('full'),
                    Forms\Components\TextInput::make('slug')
                        ->label(__('main.Slug'))
                    ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_'.app()->getLocale())->label(__('main.Title')),
                Tables\Columns\TextColumn::make('slug')->label(__('main.Slug')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
