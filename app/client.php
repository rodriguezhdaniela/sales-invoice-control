<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $guarded = [];

    /**
     * Relationship between client and sale invoice
     * @return HasMany
     */
    public function saleInvoice(): HasMany
    {
        return $this->hasMany(saleInvoice::class);
    }
}
