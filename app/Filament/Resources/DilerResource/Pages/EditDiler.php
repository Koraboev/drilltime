<?php

namespace App\Filament\Resources\DilerResource\Pages;

use App\Filament\Resources\DilerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiler extends EditRecord
{
    protected static string $resource = DilerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
