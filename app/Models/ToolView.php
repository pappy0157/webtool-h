<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolView extends Model
{
    use HasFactory;

    public static function addView($id) {
        $tool_view = self::where(['tool_id' => $id])->first();

        if($tool_view) {
            $tool_view->views += 1;
        } else {
            $tool_view = new self();

            $tool_view->tool_id = $id;
            $tool_view->views   = 1;
        }

        $tool_view->save();
    }
}
