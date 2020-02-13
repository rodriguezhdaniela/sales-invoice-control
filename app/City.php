<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static Where(string $string, $state_id)
 */
class City extends Model
{
    protected $guarded = [];
    /**
     * Relation between city and clients
     * @return HasMany
     */
    public function clients():HasMany
    {
        return $this->hasMany(Client::class);
    }

}
