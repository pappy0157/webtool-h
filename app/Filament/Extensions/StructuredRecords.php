<?php

namespace App\Filament\Extensions;

use Filament\Pages\Actions\ButtonAction;

class StructuredRecords extends BitflanListRecords {
    protected function getActions(): array
    {
        $actions = [];

        if( $this->hasCreateAction() ) {
            $actions = [
                $this->getOrderAction(),
                $this->getCreateAction()
            ];
        }

        return $actions;
    }

    protected function getOrderAction(): ButtonAction
    {
        $resource = static::getResource();
        $label = $resource::getLabel();

        return ButtonAction::make('order')
            ->label('Re-order')
            ->url(fn () => $resource::getUrl('order'))
            ->color('secondary');
    }
}