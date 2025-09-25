<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Utilisateur sauvegardé')
            ->body('L\'utilisateur a été mis à jour avec succès.')
            ->icon('heroicon-o-check-circle')
            ->iconColor('success');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Supprimer l\'utilisateur')
                ->successNotification(
                    Notification::make()
                        ->icon('heroicon-o-trash')
                        ->iconColor('danger')
                        ->success()
                        ->title('Utilisateur supprimé')
                        ->body('L\'utilisateur a été supprimé avec succès.'),
                ),
        ];
    }
}
