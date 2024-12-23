<?php

namespace App\Filament\Resources\DilerResource\Pages;

use App\Filament\Resources\DilerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDilers extends ListRecords
{
    protected static string $resource = DilerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
