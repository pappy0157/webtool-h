<?php

namespace App\Filament\Extensions;

use App\Bitflan;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Collection;

class Reorderable extends Page {
    protected static string $titleField = 'title';
    protected static string $view       = 'filament.order-page';
    protected static ?string $title     = 'Re-order Entries';
    
    public Collection $records;

    public function mount() {
        $this->records = static::getResource()::getModel()::orderBy('order')->get();
    }

    public function moveUp($i) {
        if( ! Bitflan::DEMO_MODE ) {
            if( isset( $this->records[ $i ] ) && $i > 0 ) {
                $temp = $this->records[$i]->order;
    
                $this->records[$i]->order     = $this->records[$i - 1]->order;
                $this->records[$i - 1]->order = $temp;
    
                $this->records[$i]->save();
                $this->records[$i - 1]->save();
    
                $temp = $this->records[$i];
                $this->records[$i]     = $this->records[$i - 1];
                $this->records[$i - 1] = $temp;
            }   
        } else {
            $this->notify('success', 'This feature is disabled in Demo Mode.');
        }
    }

    public function moveDown($i) {
        if( ! Bitflan::DEMO_MODE ) {
            if( isset( $this->records[ $i ] ) && $i < (count($this->records) - 1) ) {
                $temp = $this->records[$i]->order;

                $this->records[$i]->order     = $this->records[$i + 1]->order;
                $this->records[$i + 1]->order = $temp;

                $this->records[$i]->save();
                $this->records[$i + 1]->save();

                $temp = $this->records[$i];
                $this->records[$i]     = $this->records[$i + 1];
                $this->records[$i + 1] = $temp;
            }
        } else {
            $this->notify('success', 'This feature is disabled in Demo Mode.');
        }
    }
}