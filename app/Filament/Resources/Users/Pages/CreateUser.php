<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
  protected static string $resource = UserResource::class;


  protected function getCreatedNotification(): ?Notification
  {
    return Notification::make()
      ->icon('heroicon-o-check-circle')
      ->iconColor('success')
      ->success()
      ->title('utilisateur créé')
      ->body("L'utilisateur a été enregistré avec succès.");
  }
}