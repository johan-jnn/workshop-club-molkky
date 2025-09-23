<?php

namespace App\Filament\Resources\Adherents\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AdherentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'id')
                    ->required(),
                Select::make('license_id')
                    ->relationship('license', 'name')
                    ->required(),
                DateTimePicker::make('registration_date')
                    ->required(),
            ]);
    }
}
