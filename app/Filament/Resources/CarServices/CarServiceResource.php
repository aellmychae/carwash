<?php

namespace App\Filament\Resources\CarServices;

use App\Filament\Resources\CarServices\Pages\CreateCarService;
use App\Filament\Resources\CarServices\Pages\EditCarService;
use App\Filament\Resources\CarServices\Pages\ListCarServices;
use App\Filament\Resources\CarServices\Pages\ViewCarService;
use App\Filament\Resources\CarServices\Schemas\CarServiceForm;
use App\Filament\Resources\CarServices\Schemas\CarServiceInfolist;
use App\Filament\Resources\CarServices\Tables\CarServicesTable;
use App\Models\CarService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarServiceResource extends Resource
{
    protected static ?string $model = CarService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CarServiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarServiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCarServices::route('/'),
            'create' => CreateCarService::route('/create'),
            'view' => ViewCarService::route('/{record}'),
            'edit' => EditCarService::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
