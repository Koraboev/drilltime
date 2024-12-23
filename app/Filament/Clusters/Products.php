<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Products extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

   public static function getNavigationGroup(): ?string
   {
       return __('main.Shop'); // TODO: Change the autogenerated stub
   }

    protected static ?int $navigationSort = 0;

    protected static ?string $slug = 'shop/products';
}