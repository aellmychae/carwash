<?php

namespace App\Filament\Resources\CarServices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class CarServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                Textarea::make('about')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('photo')
                    ->image()
                    ->required(),
                FileUpload::make('icon')
                    ->required(),
                TextInput::make('duration_in_hour')
                    ->required()
                    ->numeric(),
            ]);
    }
}
