<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ContactMessageForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
      ->components([
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
        Textarea::make('message')
          ->label('Message')
          ->required()
          ->columnSpanFull(),
      ]);
  }
}