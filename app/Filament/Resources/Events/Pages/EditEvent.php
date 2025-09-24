<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
  protected static string $resource = EventResource::class;

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Événement sauvegardé')
      ->body('L\'événement a été mis à jour avec succès.');
  }

  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make()
        ->successNotification(
          Notification::make()
            ->icon('heroicon-o-trash')
            ->iconColor('danger')
            ->success()
            ->title('Évenement supprimé')
            ->body('L\'événement a été supprimé avec succès.'),
        )
    ];
  }
}