<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntrenadorResource\Pages;
use App\Filament\Resources\EntrenadorResource\RelationManagers;
use App\Models\Entrenador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntrenadorResource extends Resource
{
    protected static ?string $model = Entrenador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_completo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('doc_tipo')
                    ->required(),
                Forms\Components\TextInput::make('doc_numero')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_de_nacimiento')
                    ->required(),
                Forms\Components\TextInput::make('licencia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('escuela')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('sede_id')
                    ->relationship('sede', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_completo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('doc_tipo'),
                Tables\Columns\TextColumn::make('doc_numero')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_de_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('licencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('escuela')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sede.id')
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEntrenadors::route('/'),
            'create' => Pages\CreateEntrenador::route('/create'),
            'edit' => Pages\EditEntrenador::route('/{record}/edit'),
        ];
    }
}
