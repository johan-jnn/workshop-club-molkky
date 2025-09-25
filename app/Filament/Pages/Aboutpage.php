<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

class Aboutpage extends Page
{
  protected string $view = 'filament.pages.aboutpage';

  protected static ?string $title = 'A propos';

  protected static string|UnitEnum|null $navigationGroup = 'Pages';

  protected static ?string $navigationLabel = 'A propos';

  protected static ?int $navigationSort = 2;

  public array $data = [];

  public function mount(): void
  {
    $data = \App\Models\Aboutpage::all()->pluck("value", "key")->toArray();

    $data["stories"] = json_decode($data["stories"] ?? "[]", true);
    $data["values"] = json_decode($data["values"] ?? "[]", true);
    $data["members"] = json_decode($data["members"] ?? "[]", true);

    $this->form->fill(
      $data
    );
  }

  public function save(): void
  {
    $data = $this->form->getState();
    $data["stories"] = json_encode($data["stories"] ?? []);
    $data["values"] = json_encode($data["values"] ?? []);
    $data["members"] = json_encode($data["members"] ?? []);

    $updated = 0;

    foreach ($data as $key => $value) {
      \App\Models\Aboutpage::updateOrCreate(
        ['key' => $key],
        ['value' => $value]
      );
      $updated++;
    }


    Notification::make()
      ->title("$updated / " . count($data) . ' modifications apportées.')
      ->success()
      ->send();
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
        Section::make('Histoire de l\'association')
          ->components(
            [
              TextInput::make('stories_title')
                ->label("Titre de la section histoire de l\'association")
                ->required(),
              Repeater::make('stories')
                ->hiddenLabel()
                ->label('Histoires')
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
                    ->directory('stories')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                ])
                ->minItems(1)
                ->addActionLabel('Ajouter une histoire'),
            ]
          ),
        Section::make('Valeurs de l\'association')
          ->components([
            TextInput::make('values_title')
              ->label("Titre de la section valeurs de l\'association")
              ->required(),
            Repeater::make('values')
              ->hiddenLabel()
              ->label('Valeurs')
              ->components([
                TextInput::make('title')
                  ->label('Titre')
                  ->required(),
                RichEditor::make('description')
                  ->label('Description')
                  ->required(),
              ])
              ->minItems(1)
              ->maxItems(3)
              ->addActionLabel('Ajouter une valeur')
              ->reorderableWithButtons()

              ->collapsible()

          ]),
        Section::make('Bureau de l\'association')
          ->components(
            [
              TextInput::make('members_title')
                ->label("Titre de la section membres de l\'association")
                ->required(),
              Repeater::make('members')
                ->hiddenLabel()
                ->label('Membres')
                ->components([
                  TextInput::make('title')
                    ->label('Titre')
                    ->required(),
                  FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('members')
                    ->disk('public')
                    ->visibility('public')
                    ->required(),
                ])
                ->minItems(1)
                ->addActionLabel('Ajouter un membre'),
            ]
          ),
      ])
      ->statePath('data');
  }


  public function save(): void
  {
    $data = $this->form->getState();
    $data["stories"] = json_encode($data["stories"] ?? []);
    $data["values"] = json_encode($data["values"] ?? []);
    $data["members"] = json_encode($data["members"] ?? []);

    $updated = 0;

    foreach ($data as $key => $value) {
      \App\Models\Aboutpage::updateOrCreate(
        ['key' => $key],
        ['value' => $value]
      );
      $updated++;
    }

    Notification::make()
      ->title("$updated / " . count($data) . " modifications apportées.")
      ->success()
      ->send();
  }

}
