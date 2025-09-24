<?php

namespace App\Filament\Resources\Reservations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ReservationForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        Select::make('user_id')
          ->label('Utilisateur')
          ->unique()
          ->relationship('user', 'last_name')
          ->getOptionLabelFromRecordUsing(fn($record) => "{$record->first_name} {$record->last_name}")
          ->required(),
        Select::make('event_id')
          ->label('Événement')
          ->relationship('event', 'title')
          ->required(),
      ]);
  }
}