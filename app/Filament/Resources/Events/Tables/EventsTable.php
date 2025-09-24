<?php

namespace App\Filament\Resources\Events\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventsTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('title')
          ->label('Nom de l\'événement')
          ->badge(),
        TextColumn::make('date_start')
          ->label('Date de début')
          ->dateTime()
          ->sortable(),
        TextColumn::make('date_end')
          ->label('Date de fin')
          ->dateTime()
          ->sortable(),
        TextColumn::make('address')
          ->label('Adresse')
          ->searchable(),
        TextColumn::make('max_participants')
          ->label('Participants max')
          ->numeric()
          ->sortable(),
        TextColumn::make('min_elo')
          ->label('Elo min')
          ->numeric()
          ->sortable(),
        TextColumn::make('max_elo')
          ->label('Elo max')
          ->numeric()
          ->sortable(),
      ])
      ->filters([
        // Add filters if needed
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