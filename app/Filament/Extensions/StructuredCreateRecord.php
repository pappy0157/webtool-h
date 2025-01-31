<?php

namespace App\Filament\Extensions;

class StructuredCreateRecord extends BitflanCreateRecord {
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = parent::mutateFormDataBeforeCreate($data);

        $last = $this->getModel()::orderBy('order', 'desc')->first();

        $data['order'] = $last ? $last->order + 1 : 1;

        return $data;
    }
}