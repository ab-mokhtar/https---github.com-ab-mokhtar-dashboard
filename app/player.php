<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class player extends Model
{
    public function games()
    {
        return $this->hasMany(game::class);

    }
}
