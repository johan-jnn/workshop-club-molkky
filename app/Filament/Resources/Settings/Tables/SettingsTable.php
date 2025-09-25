<?php

namespace App\Filament\Resources\Settings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('Clé')
                    ->searchable(),
                TextColumn::make('label')
                    ->label('Label')
                    ->searchable(),
                TextColumn::make('value')
                    ->label('Valeur')
                    ->searchable(),
                TextColumn::make('updated_date')
                    ->label('Date de mise à jour')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Modifier le paramètre'),
                DeleteAction::make()
                    ->label('Supprimer')
                    ->successNotificationTitle('Paramètre supprimé'),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Supprimer les paramètres sélectionnés'),
                ]),
            ]);
    }
}
