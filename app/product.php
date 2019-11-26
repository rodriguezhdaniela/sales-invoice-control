<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];

/**
 * Relationship between product and product_invoice
 * @return belongsTo
 */
    public function product_invoice(): belongsTo
    {
        return $this->belongsTo(product_invoice::class);
    }
}
