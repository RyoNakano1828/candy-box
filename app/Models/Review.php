<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function candy()
    {
        return $this->belongsTo('App\Models\Candy','id');
    }
}
