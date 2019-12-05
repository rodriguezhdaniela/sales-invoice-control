<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{

    /**
     * Relationship between invoice and client
     * @return belongsTo
     */
    public function client(): belongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     *  Relationship between invoice and seller
     * @return belongsTo
     */
    public function seller(): belongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    /**
     * @return belongsToMany
     */
    public function product(): belongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

}
