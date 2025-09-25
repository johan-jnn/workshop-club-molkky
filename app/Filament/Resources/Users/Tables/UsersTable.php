<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\Role;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
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
                    ->label('Rôle')
                    ->badge()
                    ->formatStateUsing(fn (Role $state): string => match ($state) {
                        Role::USER => 'Utilisateur',
                        Role::CONTRIBUTOR => 'Contributeur',
                        Role::ADMINISTRATOR => 'Administrateur',
                    }),
                TextColumn::make('first_name')
                    ->label('Prénom')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label('Nom de famille')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('birthdate')
                    ->label('Date de naissance')
                    ->date()
                    ->sortable(),
                TextColumn::make('elo')
                    ->label('Elo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Adresse')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            EditAction::make()
                    ->label('Modifier'),
            DeleteAction::make()
                    ->label('Supprimer')
                    ->successNotificationTitle('Utilisateur supprimé'),

        ])
            ->toolbarActions([
            BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Supprimer les utilisateurs sélectionnés'),
            ]),
        ]);
    }
}
