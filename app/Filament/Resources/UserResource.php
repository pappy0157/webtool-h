<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon  = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Content'; 

    public static $toSanitize = [
        'name',
        'email'
    ];

    public static function form(Form $form): Form
    {
        $form = $form->schema([
            Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('name')->required()->columnSpan(1),
                Forms\Components\TextInput::make('email')->required()->columnSpan(1)->email()->unique(ignoreRecord: true),

                Forms\Components\Toggle::make('admin')->columnSpan(2)->disabled(!auth()->user()->super_admin),

                Forms\Components\TextInput::make('pass')->required()->columnSpan(2)->password(),
            ])
        ]);

        return $form;
    }

    public static function getEloquentQuery(): Builder
    {
        return User::query()->where('super_admin', FALSE);
    }

    public static function table(Table $table): Table
    {
        $table = $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('email')->searchable(),
            Tables\Columns\BooleanColumn::make('admin'),
        ]);

        return $table;
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit')
        ];
    }
}
