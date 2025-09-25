<?php

namespace App\Filament\Resources\Adherents\Pages;

use App\Filament\Resources\Adherents\AdherentsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdherents extends ListRecords
{
    protected static string $resource = AdherentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Ajouter un adhérent'),
        ];
    }
}
