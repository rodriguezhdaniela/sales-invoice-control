<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

    /*public function getSubtotalAttribute()
    {
        $subtotal = 0;

        foreach ($this->products as $product){

            $subtotal += $product->price * $product->pivot->quantity;
        }
        return $subtotal;
        */


}
