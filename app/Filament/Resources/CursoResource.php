<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CursoResource\Pages;
use App\Filament\Resources\CursoResource\RelationManagers;
use App\Models\Curso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CursoResource extends Resource
{
    protected static ?string $model = Curso::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('titulacion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duracion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('valor')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('estado')
                    ->default('abierto'),
                Forms\Components\TextInput::make('limite_estudiantes')
                    ->required()
                    ->maxLength(255)
                    ->default(50),
                Forms\Components\Select::make('area_id')
                    ->relationship('area', 'nombre')
                    ->required(),
                Forms\Components\Select::make('nivel_id')
                    ->relationship('nivel', 'etiqueta')
                    ->required(),
                Forms\Components\Select::make('cupon_id')
                    ->relationship('cupon', 'nombre')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duracion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('valor')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado'),
                Tables\Columns\TextColumn::make('limite_estudiantes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estudiantes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nivel.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cupon.id')
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
            'index' => Pages\ListCursos::route('/'),
            'create' => Pages\CreateCurso::route('/create'),
            'edit' => Pages\EditCurso::route('/{record}/edit'),
        ];
    }
}
