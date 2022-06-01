<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    public function player()
    {
        return $this->belongsTo(player::class);

    }
}
