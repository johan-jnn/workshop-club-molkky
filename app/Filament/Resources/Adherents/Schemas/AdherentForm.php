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
          ->label('Utilisateur')
          ->relationship('user', 'last_name')
          ->getOptionLabelFromRecordUsing(fn($record) => "{$record->first_name} {$record->last_name}")
          ->required(),
        Select::make('license_id')
          ->label('Licence')
          ->relationship('license', 'name')
          ->required(),
        DateTimePicker::make('registration_date')
          ->label("Date d'adhésion")
          ->required(),
      ]);
  }
}