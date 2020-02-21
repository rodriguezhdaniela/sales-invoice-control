<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }

    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class);
    }


    /**
     * Relation between Clients and countries
     * @return BelongsTo
     */
    public function countries():BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Relation between Clients and states
     * @return BelongsTo
     */
    public function states():BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Relation between Clients and cities
     * @return BelongsTo
     */
    public function cities():BelongsTo
    {
        return $this->belongsTo(City::class);
    }


    public function scopePersonal_id($query, $personal_id)
    {
        if ($personal_id != "") {
            return $query->where('personal_id', $personal_id);
        }
    }
    public function scopeName($query, $name)
    {
        if ($name != "") {
            return $query->where('name', "LIKE", "%$name%");
        }
    }
}
