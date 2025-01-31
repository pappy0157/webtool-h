<?php

namespace App\Filament\Widgets;

use App\Models\ToolView;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class ToolUses extends BaseWidget
{
    protected $allTools = [];
    
    protected int | string | array $columnSpan = 'full';
    protected static ?int   $sort = 2;

    public function resolveTools() {
        $allTools = [];

        foreach(config('tools.categories') as $cat) {
            foreach($cat['tools'] as $tool) {
                $allTools[$tool['name']] = $tool;
            }
        }

        $this->allTools = $allTools;
    }

    protected function getTableQuery(): Builder
    {
        return ToolView::query();
    }

    protected function getTableColumns(): array
    {
        $this->resolveTools();

        return [
            Tables\Columns\TextColumn::make('tool_id')->label('Tool')->getStateUsing(fn($record) => $this->allTools[$record->tool_id]['admin']['title']),
            Tables\Columns\TextColumn::make('views')->sortable()
        ];
    }
}
