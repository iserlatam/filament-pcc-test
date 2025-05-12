<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NivelResource\Pages;
use App\Filament\Resources\NivelResource\RelationManagers;
use App\Models\Nivel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NivelResource extends Resource
{
    protected static ?string $model = Nivel::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $activeNavigationIcon = 'heroicon-s-trophy';

    protected static ?string $navigationGroup = 'Cursos';

    protected static ?string $navigationLabel = 'Niveles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('etiqueta')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('etiqueta')
                    ->searchable(),
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
            'index' => Pages\ListNivels::route('/'),
            'create' => Pages\CreateNivel::route('/create'),
            'edit' => Pages\EditNivel::route('/{record}/edit'),
        ];
    }
}
