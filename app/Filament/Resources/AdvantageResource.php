<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvantageResource\Pages;
use App\Filament\Resources\AdvantageResource\RelationManagers;
use App\Models\Advantage;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvantageResource extends Resource
{
    protected static ?string $model = Advantage::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    public static function getNavigationGroup(): ?string
    {
        return  __('main.Home');
    }
    public static function getNavigationLabel(): string
    {
        return __('main.Advantage');
    }
    public static function getLabel(): ?string
    {
        return  __('main.Advantage');
    }

    protected static ?int $navigationSort=2;

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
                                        ->label(__('main.Title'))
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true),
                                    Forms\Components\RichEditor::make('description_ru')
                                        ->label(__('main.Content'))


                                ]),


                            Forms\Components\Tabs\Tab::make('English')
                                ->schema([
                                    Forms\Components\TextInput::make('title_en')
                                        ->label(__('main.Title'))
                                        ->required()
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
                                ->collection('advantage-image')
                                ->maxFiles(1)
                                ->hiddenLabel(),
                        ])
                        ->collapsible(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $locale=app()->getLocale();
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_'.$locale)->label(__('main.Title')),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('advantage-image')
                    ->label(__('main.Image'))
                    ->collection('advantage-image'),

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
            'index' => Pages\ListAdvantages::route('/'),
            'create' => Pages\CreateAdvantage::route('/create'),
            'edit' => Pages\EditAdvantage::route('/{record}/edit'),
        ];
    }
}
