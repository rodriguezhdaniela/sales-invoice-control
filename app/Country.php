<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{

    protected $guarded = [];

    /**
     * Relation between country and clients
     * @return HasMany
     */
    public function client():HasMany
    {
        return $this->hasMany(Client::class);
    }

}
