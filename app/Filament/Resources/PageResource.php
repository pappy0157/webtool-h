<?php

namespace App\Filament\Resources;

use App\Filament\Extensions\Reorderable;
use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use App\Settings\LanguageSettings;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Concerns\Translatable;

class PageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon  = 'heroicon-o-collection';

    public static $toSanitize = [
        'title',
        'slug',
        'location'
    ];

    public static function getTranslatableLocales(): array
    {

        return array_map(fn($item) => $item['code'], app(LanguageSettings::class)->languages);
    }

    public static function form(Form $form): Form
    {
        $form = $form->schema([
            Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('title')->reactive()->columnSpan(1)->required()->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')->columnSpan(1)->required()->unique(ignorable: fn (?Page $record): ?Page => $record),
                Forms\Components\Select::make('location')->columnSpan(2)->required()->options([
                    'header' => 'Header',
                    'footer' => 'Footer',
                    'both'   => 'Both'
                ]),
                Forms\Components\RichEditor::make('content')->disableToolbarButtons(['codeBlock'])->columnSpan(2)->required(),

                Forms\Components\Card::make()->columnSpan(2)->schema([
                    Forms\Components\Textarea::make('seoDescription')->placeholder('SEO Description')->helperText('This the SEO Description that will be used in Meta & Open-Graph Tags')->rows(2)->required()->columnSpan(2),
                    Forms\Components\Textarea::make('seoKeywords')->placeholder('SEO Keywords')->helperText('This will be used in the Meta Keywords Field.')->rows(2)->columnSpan(2),
                ])
            ])
        ]);

        return $form;
    }

    public static function table(Table $table): Table
    {
        $table = $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\BadgeColumn::make('location')->formatStateUsing(fn ($state) => ([ 'both' => 'Both', 'header' => 'Header', 'footer' => 'Footer' ])[$state])
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
            'order' => Pages\OrderPage::route('/order')
        ];
    }
}
