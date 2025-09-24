<?php

namespace App\Filament\Resources\Licenses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LicensesTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')
          ->label('Nom de la licence')
          ->searchable(),
        TextColumn::make('period_limit')
          ->label('Date de fin de validité')
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
        //
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