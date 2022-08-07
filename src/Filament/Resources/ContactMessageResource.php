<?php

namespace SquadMS\Contact\Filament\Resources;

use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms;
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
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Section::make('Message')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                                Forms\Components\TextInput::make('email')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                                Forms\Components\TextInput::make('user')
                                    ->relationship('user', 'name')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                                Forms\Components\TextInput::make('subject')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                                Forms\Components\Textarea::make('message')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                            ])
                            ->columnSpan(1),
                        Forms\Components\Section::make('Admin')
                            ->schema([
                                Forms\Components\TextInput::make('user')
                                    ->relationship('user', 'name')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                                Forms\Components\Textarea::make('resolution')
                                    ->disabled()         // Disable editing
                                    ->dehydrated(false), // Disable saving
                            ])
                            ->columnSpan(1),
                    ])
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
