<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static get()
 */
class State extends Model
{
    protected $fillable = [
        'state', 'country_id'
    ];


    /**
     * Relation between states and clients
     * @return HasMany
     */
    public function client():HasMany
    {
        return $this->hasMany(Client::class);
    }

}
