<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Split::make([
                   Forms\Components\Section::make('Info')->schema([
                       Forms\Components\TextInput::make('name')
                           ->required()
                           ->maxLength(40),
                       Forms\Components\RichEditor::make('description')
                           ->required()
                           ->maxLength(200),
                   ]),
                   Forms\Components\Section::make('Other info')->schema([
                       Forms\Components\Select::make('parent_id')
                           ->label('Parent category')
                           ->relationship('parent', 'name')
                           ->preload()
                           ->searchable(),
                       Forms\Components\FileUpload::make('icon')
                           ->image(),
                       Forms\Components\FileUpload::make('preview_image')
                           ->image(),
                       Forms\Components\Toggle::make('navigation_only')
                   ])->collapsible()
               ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.name'),
                Tables\Columns\IconColumn::make('navigation_only')
                    ->boolean()
                    ->trueColor('warning')
                    ->falseColor('info')
                    ->alignCenter()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('icon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nesting_level')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('navigation_only')
                    ->query(fn (Builder $query): Builder => $query->where('navigation_only', true))
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
            RelationManagers\CategoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
