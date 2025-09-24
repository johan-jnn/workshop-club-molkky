<?php

namespace App\Filament\Resources\Licenses\Pages;

use App\Filament\Resources\Licenses\LicensesResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditLicense extends EditRecord
{
  protected static string $resource = LicensesResource::class;

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Licence sauvegardée')
      ->body('La licence a été mise à jour avec succès.')
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
            ->title('Licence supprimée')
            ->body('La licence a été supprimée avec succès.'),
        )
    ];
  }
}
