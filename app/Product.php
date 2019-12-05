<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $guarded = [];

    /**
     * Relationship between product and product_invoice
     * @return HasMany
     */
    public function invoice(): belongsToMany
    {
        return $this->belongsToMany(Invoice::class);
    }
}
