<?php

namespace App\Filament\Resources\ContactMessages;

use App\Filament\Resources\ContactMessages\Pages\CreateContactMessage;
use App\Filament\Resources\ContactMessages\Pages\EditContactMessage;
use App\Filament\Resources\ContactMessages\Pages\ListContactMessages;
use App\Filament\Resources\ContactMessages\Schemas\ContactMessageForm;
use App\Filament\Resources\ContactMessages\Tables\ContactMessagesTable;
use App\Models\ContactMessage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContactMessageResource extends Resource
{
  protected static ?string $model = ContactMessage::class;

  protected static ?string $recordTitleAttribute = 'Adhérent';

  // Groupe
  protected static string|UnitEnum|null $navigationGroup = 'Message de Contact';
  protected static ?string $navigationLabel = 'Message de Contact';
  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Message de Contact';
  protected static ?string $pluralModelLabel = 'Message de Contacts';

  protected static string|BackedEnum|null $navigationIcon = Heroicon::ChatBubbleLeftRight;

  public static function form(Schema $schema): Schema
  {
    return ContactMessageForm::configure($schema);
  }

  public static function table(Table $table): Table
  {
    return ContactMessagesTable::configure($table);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => ListContactMessages::route('/'),
    ];
  }
}