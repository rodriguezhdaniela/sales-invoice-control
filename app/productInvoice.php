<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productInvoice extends Model
{

    /**
     * Relation between product invoice and products
     * @return hasMany
     */
    public function product(): hasMany
    {
        return $this->hasMany(product::class);
    }

    /**
     * Relation between product invoice and sale invoices
     * @return hasMany
     */
    public function saleInvoice(): hasMany
    {
        return $this->hasMany(saleInvoice::class);
    }
}
