<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CategoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'childrens';

    protected static ?string $title = 'Nested categories';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(200),
                Forms\Components\Select::make('parent_id')
                    ->label('Parent category')
                    ->relationship('parent', 'name')
                    ->preload()
                    ->default($this->ownerRecord->getAttribute('id'))
                    ->searchable(),
//                Forms\Components\TextInput::make('parent_id')
//                    ->numeric()
//                    ->default($this->ownerRecord->getAttribute('id')),
                Forms\Components\FileUpload::make('image')
                    ->image(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
