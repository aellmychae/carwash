<?php

namespace App\Filament\Resources\CarStores\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;

class CarStoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone_number')
                    ->required()
                    ->maxLength(255),

                TextInput::make('cs_name')
                    ->required()
                    ->maxLength(255),

                Select::make('is_open')
                    ->options([
                        true => 'Open',
                        false => 'Closed',
                ])
                    ->required(),

                Select::make('is_full')
                    ->options([
                        true => 'Available',
                        false => 'Full_Booked',
                ])
                    ->required(),

                Select::make('city_id')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preLoad()
                    ->required(),

                Repeater::make('storeServices')
                ->relationship()
                ->schema([
                    Select::make('car_service_id')
                        ->relationship('service','name')
                        ->required(),
                ]),

                FileUpload::make('thumbnail')
                    ->image()
                    ->required(),

                Textarea::make('address')
                    ->required()
                    ->rows(10)
                    ->cols(20),
                 
               
            ]);
    }
}
