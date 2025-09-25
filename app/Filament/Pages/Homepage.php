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
                        ->label('Titre'),
                    RichEditor::make('hero_description')
                        ->label('Description'),
                    FileUpload::make('hero_image')
                        ->label('Image')
                        ->image()
                        ->directory('events')
                        ->disk('public')
                        ->visibility('public'),
                ]),
                Section::make('Sections')
                    ->components(
                        [
                            Repeater::make('sections')
                                ->hiddenLabel()
                                ->label('Sections')
                                ->components([
                                    TextInput::make('title')
                                        ->label('Titre'),
                                    RichEditor::make('description')
                                        ->label('Description'),
                                    FileUpload::make('image')
                                        ->label('Image')
                                        ->image()
                                        ->directory('events')
                                        ->disk('public')
                                        ->visibility('public'),
                                ]),
                        ]
                    ),
                Section::make('Événements')
                    ->components([
                        TextInput::make('events_title')
                            ->label('Titre de la section événements'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $data['sections'] = json_encode($data['sections'] ?? '[]');

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

    /**
     * Récupère les 3 derniers événements pour l'affichage sur la homepage
     * Méthode statique pour être utilisable dans le template Blade
     */
    public static function getLatestEvents()
    {
        return \App\Models\Event::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    /**
     * Fournit les données pour la vue (utilisé par Filament)
     */
    protected function getViewData(): array
    {
        return array_merge(parent::getViewData(), [
            'events' => self::getLatestEvents(),
        ]);
    }
}
