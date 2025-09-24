<?php

namespace App\Filament\Pages;

use Arr;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class Homepage extends Page
{
  protected string $view = 'filament.pages.homepage';

  protected static string|UnitEnum|null $navigationGroup = 'Pages';

  public array $data = [];


  public function mount(): void
  {
    $data = \App\Models\Homepage::all()->pluck("value", "key")->toArray();
    $data["sections"] = json_decode($data["sections"] ?? "[]", true);
    $this->form->fill(
      $data
    );
  }

  public function form(Schema $form): Schema
  {
    return $form
      ->schema([
        Section::make('Héro-Header')->components([
          TextInput::make('hero_title')
            ->label("Titre")
            ->required(),
          RichEditor::make('hero_description')
            ->required()
            ->label("Description")
        ]),
        Section::make('Sections')
          ->components(
            [
              Repeater::make('sections')
                ->hiddenLabel()
                ->label("Sections")
                ->components([
                  TextInput::make('title')
                    ->label("Titre")
                    ->required(),
                  RichEditor::make('description')
                    ->label("Description")
                    ->required()
                ])
                ->minItems(1)
            ]
          ),
        Section::make('Autres')
          ->components([
            TextInput::make('events_title')
              ->label("Titre introduisant les événements")
              ->required()
          ])
      ])
      ->statePath('data');
  }

  public function save(): void
  {
    $data = $this->form->getState();
    $data["sections"] = json_encode($data["sections"]);

    $updated = \App\Models\Homepage::upsert(
      Arr::map($data, fn($value, $key) => ["key" => $key, "value" => $value]),
      "key"
    );

    Notification::make()
      ->title("$updated / " . count($data) . " modifications apportés.")
      ->success()
      ->send();
  }
}
