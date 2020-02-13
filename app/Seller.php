<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    protected $guarded = [];

    /**
     * Relation between sellers and invoices
     * @return HasMany
     */
    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopePersonal_id($query, $personal_id)
    {

        if ($personal_id != "")
        {
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
