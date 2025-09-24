<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingsResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
  protected static string $resource = SettingsResource::class;

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Paramètre sauvegardé')
      ->body('Le paramètre a été mis à jour avec succès.')
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
            ->title('Paramètre supprimé')
            ->body('Le paramètre a été supprimé avec succès.'),
        )
    ];
  }
}