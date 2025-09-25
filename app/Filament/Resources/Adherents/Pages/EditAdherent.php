<?php

namespace App\Filament\Resources\Adherents\Pages;

use App\Filament\Resources\Adherents\AdherentsResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAdherent extends EditRecord
{
  protected static string $resource = AdherentsResource::class;

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Adherent sauvegardé')
      ->body('L\'adherent a été mis à jour avec succès.')
      ->icon('heroicon-o-check-circle')
      ->iconColor('success');
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
            ->title('Adherents supprimé')
            ->body('L\'adherent a été supprimé avec succès.'),
        ),
    ];
  }
}
