<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificadoResource\Pages;
use App\Filament\Resources\CertificadoResource\RelationManagers;
use App\Models\Certificado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificadoResource extends Resource
{
    protected static ?string $model = Certificado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('vencimiento'),
                Forms\Components\DatePicker::make('fecha_vencimiento'),
                Forms\Components\Textarea::make('observaciones')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('estado')
                    ->required(),
                Forms\Components\Select::make('curso_id')
                    ->relationship('curso', 'id')
                    ->required(),
                Forms\Components\Select::make('estudiante_id')
                    ->relationship('estudiante', 'id')
                    ->required(),
                Forms\Components\Select::make('sede_id')
                    ->relationship('sede', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('vencimiento')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_vencimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado'),
                Tables\Columns\TextColumn::make('curso.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estudiante.id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCertificados::route('/'),
            'create' => Pages\CreateCertificado::route('/create'),
            'edit' => Pages\EditCertificado::route('/{record}/edit'),
        ];
    }
}
