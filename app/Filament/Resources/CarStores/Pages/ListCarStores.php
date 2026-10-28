<?php

namespace App\Filament\Resources\CarStores\Pages;

use App\Filament\Resources\CarStores\CarStoreResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarStores extends ListRecords
{
    protected static string $resource = CarStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
