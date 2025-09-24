<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
  protected static string $resource = EventResource::class;

  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->icon('heroicon-o-check-circle')
      ->iconColor('success')
      ->success()
      ->title('Événement créé')
      ->body("L'événement a été enregistré avec succès.");
  }
}