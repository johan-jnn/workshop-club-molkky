<?php

namespace App\Filament\Resources\Licenses\Pages;

use App\Filament\Resources\Licenses\LicensesResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateLicense extends CreateRecord
{
  protected static string $resource = LicensesResource::class;

  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->icon('heroicon-o-check-circle')
      ->iconColor('success')
      ->success()
      ->title('Notification créée')
      ->body("La notification a été enregistrée avec succès.");
  }
}
