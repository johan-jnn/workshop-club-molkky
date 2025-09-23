<?php

namespace App\Filament\Resources\Adherents\Pages;

use App\Filament\Resources\Adherents\AdherentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdherent extends EditRecord
{
    protected static string $resource = AdherentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
