<?php

namespace App\Filament\Resources\Reservations\Pages;

use App\Filament\Resources\Reservations\ReservationResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditReservation extends EditRecord
{
  protected static string $resource = ReservationResource::class;

  protected function getSavedNotification(): ?Notification
  {
    return Notification::make()
      ->success()
      ->title('Réservation sauvegardée')
      ->body('La réservation a été mise à jour avec succès.')
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
            ->title('Réservation supprimée')
            ->body('La réservation a été supprimée avec succès.'),
        )
    ];
  }
}