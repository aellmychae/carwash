<?php

namespace App\Filament\Resources\CarStores\Pages;

use App\Filament\Resources\CarStores\CarStoreResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCarStore extends ViewRecord
{
    protected static string $resource = CarStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
