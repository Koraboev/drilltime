<?php

namespace App\Filament\Clusters\Products\Resources\ProductResource\Widgets;

use App\Filament\Clusters\Products\Resources\ProductResource\Pages\ListProducts;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListProducts::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make(__('main.Total'), $this->getPageTableQuery()->count()),
            Stat::make(__('main.ProductInventory'), $this->getPageTableQuery()->sum('qty')),
            Stat::make(__('main.Average'), number_format($this->getPageTableQuery()->avg('price'), 2)),
        ];
    }
}
