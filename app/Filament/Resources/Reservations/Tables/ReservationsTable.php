<?php

namespace App\Filament\Resources\Reservations\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
  public static function configure(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('id')->label('ID')->sortable(),
        TextColumn::make('user.first_name')->label('First Name')->searchable()->sortable(),
        TextColumn::make('user.last_name')->label('Last Name')->searchable()->sortable(),
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