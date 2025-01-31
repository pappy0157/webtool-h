<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use App\Settings\LanguageSettings;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use JKHarley\FilamentTrumbowyg\Trumbowyg;

class BlogPostResource extends Resource
{
    use Translatable;

    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getTranslatableLocales(): array
    {
        return array_map(fn($item) => $item['code'], app(LanguageSettings::class)->languages);
    }

    public static $toSanitize = [
        'title',
        'slug',
        'summary'
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Forms\Components\TextInput::make('title')->placeholder('The Title for the Blog Post')->columnSpan(1)->required(),
                    Forms\Components\TextInput::make('slug')->placeholder('The Permalink / Slug for the Blog Post')->columnSpan(1)->required()->unique(ignorable: fn (?BlogPost $record): ?BlogPost => $record),
                    Forms\Components\Textarea::make('summary')->rows(3)->placeholder('Short Summary, Used as the Meta Description')->required()->columnSpan(2),
                    Forms\Components\TextInput::make('keywords')->placeholder('Used as Meta Keywords')->required()->columnSpan(2)->helperText('Comma separated keywords'),
                    Forms\Components\FileUpload::make('thumbnail')->image()->columnSpan(2)->helperText('1230x700 Recommended Size'),
                    Forms\Components\RichEditor::make('content')->disableToolbarButtons(['codeBlock'])->columnSpan(2)->required(),
                    // TinyEditor::make('content')->simple()->required()->columnSpan(2),
                    // Trumbowyg::make('content')->required()->columnSpan(2)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug')
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
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }    
}
