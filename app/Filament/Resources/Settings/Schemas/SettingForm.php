<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->label('Clé')
                    ->required(),
                TextInput::make('label')
                    ->label('Label')
                    ->required(),
                TextInput::make('value')
                    ->label('Valeur')
                    ->required(),
                DateTimePicker::make('updated_date')
                    ->label('Date de mise à jour')
                    ->required(),
            ]);
    }
}
