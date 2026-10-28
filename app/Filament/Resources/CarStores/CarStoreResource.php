<?php

namespace App\Filament\Resources\CarStores;

use App\Filament\Resources\CarStores\Pages\CreateCarStore;
use App\Filament\Resources\CarStores\Pages\EditCarStore;
use App\Filament\Resources\CarStores\Pages\ListCarStores;
use App\Filament\Resources\CarStores\Pages\ViewCarStore;
use App\Filament\Resources\CarStores\Schemas\CarStoreForm;
use App\Filament\Resources\CarStores\Schemas\CarStoreInfolist;
use App\Filament\Resources\CarStores\Tables\CarStoresTable;
use App\Models\CarStore;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarStoreResource extends Resource
{
    protected static ?string $model = CarStore::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'admin';

    public static function form(Schema $schema): Schema
    {
        return CarStoreForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarStoreInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarStoresTable::configure($table);
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
            'index' => ListCarStores::route('/'),
            'create' => CreateCarStore::route('/create'),
            'view' => ViewCarStore::route('/{record}'),
            'edit' => EditCarStore::route('/{record}/edit'),
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
