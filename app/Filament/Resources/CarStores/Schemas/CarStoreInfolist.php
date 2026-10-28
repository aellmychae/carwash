<?php

namespace App\Filament\Resources\CarStores\Schemas;

use App\Models\CarStore;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CarStoreInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail'),
                IconEntry::make('is_open')
                    ->boolean(),
                IconEntry::make('is_full')
                    ->boolean(),
                TextEntry::make('address')
                    ->columnSpanFull(),
                TextEntry::make('phone_number'),
                TextEntry::make('cs_name'),
                TextEntry::make('city.name')
                    ->label('City'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (CarStore $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
