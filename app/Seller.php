<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seller extends Model
{
    protected $guarded = [];

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

}


