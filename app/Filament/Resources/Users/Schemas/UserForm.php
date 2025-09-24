<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Role;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
        Select::make('role')
          ->label('Rôle')
          ->options(Role::class)
          ->required(),
        TextInput::make('first_name')
          ->label('Prénom')
          ->required(),
        TextInput::make('last_name')
          ->label('Nom')
          ->required(),
        TextInput::make('email')
          ->label('Email')
          ->email()
          ->required(),
        DatePicker::make('birthdate')
          ->label('Date de naissance')
          ->required(),
        TextInput::make('elo')
          ->label('ELO')
          ->numeric(),
        TextInput::make('phone_number')
          ->label('Numéro de téléphone')
          ->required()
          ->columnSpanFull(),
        TextInput::make('address')
          ->label('Adresse')
          ->required(),
        TextInput::make('password')
          ->label('Mot de passe')
          ->password()
          ->required(),
      ]);
  }
}