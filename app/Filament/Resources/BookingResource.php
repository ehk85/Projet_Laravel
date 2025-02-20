<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('Utilisateur'),

                Forms\Components\Select::make('property_id')
                    ->relationship('property', 'name')
                    ->required()
                    ->label('Propriété'),

                Forms\Components\DatePicker::make('start_date')
                    ->required()
                    ->label('Date de début'),

                Forms\Components\DatePicker::make('end_date')
                    ->required()
                    ->label('Date de fin'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->sortable()->label('Utilisateur'),
                Tables\Columns\TextColumn::make('property.name')->sortable()->label('Propriété'),
                Tables\Columns\TextColumn::make('start_date')->sortable()->label('Date de début'),
                Tables\Columns\TextColumn::make('end_date')->sortable()->label('Date de fin'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
