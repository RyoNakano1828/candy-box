<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candy extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'candy_id');
    }

    public function selected_candies()
    {
        return $this->hasMany('App\Models\SelectedCandy', 'candy_id');
    }
}
