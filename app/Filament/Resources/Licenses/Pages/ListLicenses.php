<?php

namespace App\Filament\Resources\Licenses\Pages;

use App\Filament\Resources\Licenses\LicensesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLicenses extends ListRecords
{
    protected static string $resource = LicensesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Ajouter une licence'),
        ];
    }
}
