<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingsResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
  protected static string $resource = SettingsResource::class;

  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->icon('heroicon-o-check-circle')
      ->iconColor('success')
      ->success()
      ->title('Paramètre créé')
      ->body("Le paramètre a été enregistré avec succès.");
  }
}