<?php

namespace App\Filament\Resources\CarServices\Pages;

use App\Filament\Resources\CarServices\CarServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarServices extends ListRecords
{
    protected static string $resource = CarServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
