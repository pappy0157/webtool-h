<?php

namespace App\Http\Livewire\Tools;

use App\Extensions\CheckSSL;
use Livewire\Component;

class TimestampConverter extends Component
{
    public ?string $formatted = '';
    public mixed   $timestamp = 0;
    public mixed   $seconds   = 0;

    public mixed $month     = 0;
    public mixed $day       = 0;
    public mixed $year      = 0;
    public mixed $hour      = 0;
    public mixed $minute    = 0;
    public mixed $second    = 0;

    public ?string $convertedTimestamp = null;
    public ?string $convertedDate      = null;
    public ?string $convertedFormatted = null;
    public mixed   $convertedSeconds   = null;

    public bool $formattedError = false;

    public function mount() {
        $this->seconds   = 0;
        $this->timestamp = time();
        $this->formatted = now()->toFormattedDateString();

        $this->month  = now()->month;
        $this->day    = now()->day;
        $this->year   = now()->year;
        $this->hour   = now()->hour;
        $this->minute = now()->minute;
        $this->second = now()->second;
    }

    public function convertTimestamp() {
        if($this->timestamp > 2147483647) {
            $this->timestamp = 2147483647;
        }

        $this->convertedTimestamp = date('M d, Y h:i:s A', $this->timestamp);
    }

    public function convertDate() {
        $this->error = [];

        if($this->day <= 0)
            $this->day = 1;
        
        if($this->day >= 32)
            $this->day = 31;

        if($this->month <= 0)
            $this->month = 1;
        
        if($this->month >= 13)
            $this->month = 12;

        if($this->year <= 0)
            $this->year = 1;

        if($this->year >= 9999)
            $this->year = now()->year;

        if($this->hour < 0)
            $this->hour = 0;

        if($this->hour >= 25)
            $this->hour = 24;

        if($this->minute < 0)
            $this->minute = 0;

        if($this->minute >= 61)
            $this->minute = 60;

        if($this->second < 0)
            $this->second = 0;

        if($this->second >= 61)
            $this->second = 60;

        $this->convertedDate = strtotime($this->day . '-' . $this->month . '-' . $this->year . ' ' . $this->hour . ':' . $this->minute . ':' . $this->second . ' UTC');
    }

    public function convertFormatted() {
        $this->formattedError = false;

        try {
            $this->convertedFormatted = strtotime($this->formatted);
        } catch(\Exception $e) {
            $this->formattedError = true;
        }
    }

    public function convertSeconds() {
        return true;
    }

    public function render() {
        return view('modules.tools.timestamp-converter.livewire');
    }
}
