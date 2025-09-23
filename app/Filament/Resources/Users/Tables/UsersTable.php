<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\Role;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('role')
          ->badge(),
        TextColumn::make('first_name')
          ->searchable(),
        TextColumn::make('last_name')
          ->searchable(),
        TextColumn::make('email')
          ->label('Email address')
          ->searchable(),
        TextColumn::make('birthdate')
          ->date()
          ->sortable(),
        TextColumn::make('elo')
          ->numeric()
          ->sortable(),
        TextColumn::make('address')
          ->searchable(),
        TextColumn::make('email_verified_at')
          ->dateTime()
          ->sortable(),
        TextColumn::make('created_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        SelectFilter::make('role')
          ->label('Rôle')
          ->options([
            Role::USER->value => 'Utilisateur',
            Role::CONTRIBUTOR->value => 'Contributeur',
            Role::ADMINISTRATOR->value => 'Administrateur',
          ])
          ->multiple(), // permet de sélectionner plusieurs rôles
      ])
      ->recordActions([
        EditAction::make(),
      ])
      ->toolbarActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
        ]),
      ]);
  }
}
