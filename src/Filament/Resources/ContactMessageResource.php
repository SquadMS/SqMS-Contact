<?php

namespace SquadMS\Contact\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use SquadMS\Contact\Filament\Resources\ContactMessageResource\Pages;
use SquadMS\Contact\Models\ContactMessage;

class ContactMessageResource extends Resource
{
    use Translatable;

    protected static ?string $navigationGroup = 'Contact Management';

    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('subject')->sortable(),
            ])
            ->filters([
                //
            ]);
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
            'index' => Pages\ListContactMessage::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }
}
