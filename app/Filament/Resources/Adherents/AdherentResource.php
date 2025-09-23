<?php

namespace App\Filament\Resources\Adherents;

use App\Filament\Resources\Adherents\Pages\CreateAdherent;
use App\Filament\Resources\Adherents\Pages\EditAdherent;
use App\Filament\Resources\Adherents\Pages\ListAdherents;
use App\Filament\Resources\Adherents\Schemas\AdherentForm;
use App\Filament\Resources\Adherents\Tables\AdherentsTable;
use App\Models\Adherent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AdherentResource extends Resource
{
    protected static ?string $model = Adherent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?string $recordTitleAttribute = 'Adherent';

    // Groupe principal
    protected static string|UnitEnum|null $navigationGroup = 'Adhérents';

    // Nom du sous-onglet
    protected static ?string $navigationLabel = 'Liste';

    // Ordre dans le groupe
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return AdherentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdherentsTable::configure($table);
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
            'index' => ListAdherents::route('/'),
            'create' => CreateAdherent::route('/create'),
            'edit' => EditAdherent::route('/{record}/edit'),
        ];
    }
}
