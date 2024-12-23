<?php

namespace App\Filament\Clusters\Products\Resources\TechnologicResource\Pages;

use App\Filament\Clusters\Products\Resources\TechnologicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTechnologics extends ListRecords
{
    protected static string $resource = TechnologicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
