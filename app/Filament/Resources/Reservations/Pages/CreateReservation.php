<?php

namespace App\Filament\Resources\Reservations\Pages;

use App\Filament\Resources\Reservations\ReservationResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->icon('heroicon-o-check-circle')
            ->iconColor('success')
            ->success()
            ->title('Réservation créé')
            ->body('La réservation a été enregistrée avec succès.');
    }
}
