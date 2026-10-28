<?php

namespace App\Filament\Resources\CarServices\Pages;

use App\Filament\Resources\CarServices\CarServiceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarService extends ViewRecord
{
    protected static string $resource = CarServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
