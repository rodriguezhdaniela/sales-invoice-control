<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class invoiceState extends Model
{


    /**
     * Relation between city and collaborators
     * @return HasMany
     */
    public function saleInvoice(): HasMany
    {
        return $this->hasMany(saleInvoice::class);
    }
}
