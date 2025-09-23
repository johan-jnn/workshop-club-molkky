<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Schema;

class Homepage extends Page
{
  protected string $view = 'filament.pages.homepage';

  public function mount(): void
  {
    $this->form->fill(
      \App\Models\Homepage::all()->pluck("value", "key")->toArray()
    );
  }

  public function form(Schema $form): Schema
  {
    return $form
      ->schema([
        TextInput::make('hero.title')
          ->required()
      ]);
  }

  public function save(): void
  {
    $data = $this->form->getState();
    dd($data);
  }

  public function getActions(): array
  {
    return [
      Action::make('submit')
        ->action(fn() => $this->save())
    ];
  }
}
