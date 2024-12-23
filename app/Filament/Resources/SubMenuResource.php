<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubMenuResource\Pages;
use App\Filament\Resources\SubMenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\SubMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubMenuResource extends Resource
{
    protected static ?string $model = SubMenu::class;
    public static function getNavigationLabel(): string
    {
        return  __('main.seo'); // TODO: Change the autogenerated stub
    }
    public static function getLabel(): ?string
    {
        return __('main.seo'); // TODO: Change the autogenerated stub
    }


    public static function getNavigationParentItem(): ?string
    {
        return  __('main.Menu'); // TODO: Change the autogenerated stub
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Tabs::make('Tabs')
                            ->tabs([
                                Forms\Components\Tabs\Tab::make('O\'zbek')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_uz')
                                            ->required()
                                            ->label(__('main.MetaTitle'))
                                            ->maxLength(255)
                                            ->live(onBlur: true),
                                        Forms\Components\RichEditor::make('meta_description_uz')
                                        ->label(__('main.MetaContent'))

                                    ]),

                                Forms\Components\Tabs\Tab::make('Pусский')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_ru')
                                            ->required()
                                            ->label(__('main.MetaTitle'))
                                            ->maxLength(255)
                                            ->live(onBlur: true),
                                        Forms\Components\RichEditor::make('meta_description_ru')
                                        ->label(__('main.MetaContent'))
                                    ]),


                                Forms\Components\Tabs\Tab::make('English')
                                    ->schema([
                                        Forms\Components\TextInput::make('meta_title_en')
                                            ->required()
                                            ->label(__('main.MetaTitle'))
                                            ->maxLength(255)
                                            ->live(onBlur: true),
                                        Forms\Components\RichEditor::make('meta_description_en')
                                        ->label(__('main.MetaContent'))

                                    ]),
                            ])
                            ->columnSpan('full'),
                        Forms\Components\Select::make('menu_id')
                        ->options(Menu::pluck('name_'.app()->getLocale(), 'id'))
                        ->label(__('main.Menu'))
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('meta_title_'.app()->getLocale())->label(__('main.MetaTitle')),
                TextColumn::make('menu.name_'.app()->getLocale()),
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
            'index' => Pages\ListSubMenus::route('/'),
            'create' => Pages\CreateSubMenu::route('/create'),
            'edit' => Pages\EditSubMenu::route('/{record}/edit'),
        ];
    }
}
