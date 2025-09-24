<?php

namespace App\Filament\Resources\Adherents\Pages;

use App\Filament\Resources\Adherents\AdherentsResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAdherent extends CreateRecord
{
  protected static string $resource = AdherentsResource::class;

  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->icon('heroicon-o-check-circle')
      ->iconColor('success')
      ->success()
      ->title('Adhérent créé')
      ->body("L'adhérent a été enregistré avec succès.");
  }
}
