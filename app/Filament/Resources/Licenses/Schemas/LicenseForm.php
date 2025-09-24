<?php

namespace App\Filament\Resources\Licenses\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LicenseForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('name')
          ->label('Nom')
          ->required(),
        Textarea::make('description')
          ->columnSpanFull(),
        DateTimePicker::make('period_limit')
          ->label("Date de fin de validité"),
      ]);
  }
}