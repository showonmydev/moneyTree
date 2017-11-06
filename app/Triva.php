<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Triva extends Model
{
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
