<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuggestionResource\Pages;
use App\Filament\Resources\SuggestionResource\RelationManagers;
use App\Models\Suggestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;



class SuggestionResource extends Resource
{
    protected static ?string $navigationGroup = 'Add products';
    protected static ?string $model = Suggestion::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-right';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_condition')
                    ->required()
                    ->options([
                        'support' => 'support', 
                        'owned' =>'owned'
                    ]),
                Forms\Components\Textarea::make('product_name_ar')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('product_name_en')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('manufacturer_company')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_num')
                    ->tel()
                    ->numeric()
                    ->default(null),
                    Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'declined' => 'Declined',
                    ])
                    ->default('pending')
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_condition'),
                Tables\Columns\TextColumn::make('manufacturer_company')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_num')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('status'),
                     
                    Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->default('pending')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\ApproveSuggestion::make(),
                // Tables\Actions\DeclineSuggestion::make(),
                // Tables\Actions\Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSuggestions::route('/'),
            'create' => Pages\CreateSuggestion::route('/create'),
            'edit' => Pages\EditSuggestion::route('/{record}/edit'),
        ];
    }
}
