<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use App\Models\ToolView;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    private function getToolViews() {
        return array_reduce(ToolView::all()->toArray(), fn($carry, $item) => $carry + $item['views'], 0);
    }

    private function getPopularTool() {
        $allTools = [];

        foreach(config('tools.categories') as $cat) {
            foreach($cat['tools'] as $tool) {
                $allTools[$tool['name']] = $tool;
            }
        }

        $toolView = ToolView::orderBy('views', 'DESC')->first();

        if($toolView) {
            return $allTools[$toolView->tool_id]['admin']['title'];
        } else {
            return 'None';
        }
    }

    protected function getCards(): array {

        return [
            Card::make('Total Views',  $this->getToolViews())  ->description('Total uses of all Tools')->color('success'),
            Card::make('Most Popular', $this->getPopularTool())->description('Your most popular tool.')->color('success'),
            Card::make('Pages',        Page::count()      )->description('Amount of Pages')->color('primary'),
        ];
    }
}
