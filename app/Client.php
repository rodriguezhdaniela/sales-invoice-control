<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    /**
     * Relationship between client and sale invoice
     * @return HasMany
     */
    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
