<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class Homepage extends Page
{
    protected string $view = 'filament.pages.homepage';

    protected static ?string $title = 'Page d\'accueil';

    protected static string|UnitEnum|null $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Page d\'accueil';

    protected static ?int $navigationSort = 1;

    public array $data = [];

    public function mount(): void
    {
        $data = \App\Models\Homepage::all()->pluck('value', 'key')->toArray();

        $data['sections'] = json_decode($data['sections'] ?? '[]', true);
        $data['events'] = json_decode($data['events'] ?? '[]', true);

        $this->form->fill(
            $data
        );
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Hero')->components([
                    TextInput::make('hero_title')
                        ->label('Titre')
                        ->required(),
                    RichEditor::make('hero_description')
                        ->required()
                        ->label('Description'),
                    FileUpload::make('hero_image')
                        ->label('Image')
                        ->image()
                        ->directory('events')
                        ->disk('public')
                        ->visibility('public')
                        ->required(),
                ]),
                Section::make('Sections')
                    ->components(
                        [
                            Repeater::make('sections')
                                ->hiddenLabel()
                                ->label('Sections')
                                ->components([
                                    TextInput::make('title')
                                        ->label('Titre')
                                        ->required(),
                                    RichEditor::make('description')
                                        ->label('Description')
                                        ->required(),
                                    FileUpload::make('image')
                                        ->label('Image')
                                        ->image()
                                        ->directory('events')
                                        ->disk('public')
                                        ->visibility('public')
                                        ->required(),
                                ])
                                ->minItems(1),
                        ]
                    ),
                Section::make('Événements')
                    ->components([
                        TextInput::make('events_title')
                            ->label('Titre de la section événements')
                            ->required(),
                        Repeater::make('events')
                            ->hiddenLabel()
                            ->label('Événements')
                            ->components([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('events')
                                    ->disk('public')
                                    ->visibility('public')
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Titre')
                                    ->required(),
                                RichEditor::make('description')
                                    ->label('Description')
                                    ->required(),
                            ])
                            ->minItems(1)
                            ->maxItems(3)
                            ->addActionLabel('Ajouter un événement')
                            ->reorderableWithButtons()
                            ->collapsible(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $data['sections'] = json_encode($data['sections']);
        $data['events'] = json_encode($data['events']);

        $updated = 0;

        foreach ($data as $key => $value) {
            \App\Models\Homepage::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
            $updated++;
        }

        Notification::make()
            ->title("$updated / ".count($data).' modifications apportées.')
            ->success()
            ->send();
    }
}
