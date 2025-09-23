<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        TextInput::make('title')
          ->required(),
        Textarea::make('description')
          ->rows(3)
          ->columnSpanFull()
          ->required(),
        TextInput::make('address')
          ->required(),
        TextInput::make('max_participants')
          ->label('Max participants')
          ->numeric(),
        TextInput::make('min_elo')
          ->label('Min ELO')
          ->numeric(),
        TextInput::make('max_elo')
          ->label('Max ELO')
          ->numeric(),
        DateTimePicker::make('date_start')
          ->label('Start date & time')
          ->required(),
        DateTimePicker::make('date_end')
          ->label('End date & time')
          ->required(),


      ]);
  }
}