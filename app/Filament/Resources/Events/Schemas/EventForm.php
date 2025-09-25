<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nom de l\'événement')
                    ->required(),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull()
                    ->required(),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('events')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                TextInput::make('address')
                    ->label('Adresse')
                    ->required(),
                TextInput::make('max_participants')
                    ->label('Max Participants')
                    ->numeric(),
                TextInput::make('min_elo')
                    ->label('Min ELO')
                    ->numeric(),
                TextInput::make('max_elo')
                    ->label('Max ELO')
                    ->numeric(),
                DateTimePicker::make('date_start')
                    ->label('Date et heure de début')
                    ->required(),
                DateTimePicker::make('date_end')
                    ->label('Date et heure de fin')
                    ->required(),

            ]);
    }
}
