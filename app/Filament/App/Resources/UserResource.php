<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\UserResource\Pages;
use App\Filament\App\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('stripe_customer_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('subscription_status')
                    ->required()
                    ->maxLength(255)
                    ->default('inactive'),
                Forms\Components\DateTimePicker::make('subscription_end'),
                Forms\Components\TextInput::make('max_projects')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('current_projects_count')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('setting_id')
                    ->relationship(name: 'settings', titleAttribute: 'id')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('visitor_id')
                    ->relationship(name: 'visitors', titleAttribute: 'id')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\TextEntry::make('email_verified_at')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('stripe_customer_id'),
                Infolists\Components\TextEntry::make('subscription_status'),
                Infolists\Components\TextEntry::make('subscription_end')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('max_projects')
                    ->numeric(),
                Infolists\Components\TextEntry::make('current_projects_count')
                    ->numeric(),
                Infolists\Components\TextEntry::make('created_at')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('updated_at')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('settings.id'),
                Infolists\Components\TextEntry::make('visitors.id'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stripe_customer_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscription_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscription_end')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_projects')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_projects_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('settings.id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visitors.id')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ProjectsRelationManager::class,
            RelationManagers\UploadedDocumentsRelationManager::class,
            RelationManagers\VisitorsRelationManager::class,
            RelationManagers\MailingListsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
