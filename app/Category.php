<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Triva()
    {
        return $this->hasMany(Triva::class);
    }
}
