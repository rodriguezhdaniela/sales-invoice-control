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

    public function setAmountAttribute() {

        $this->amount = $this->price * $this->quantity;
    }


    public function amount()
    {

        $amount = 0;
        foreach($invoice->products as $product){
            $amount = $product->price * $product->pivot->quantity;
        }

        return $amount;
    }
    

    public function getSubtotalAttribute()
    {
        return $this->products->sum('invoice.amount');
    }

    public function getIvaAttribute()
    {

        return $this -> getSubtotalAttribute() * (.19);
    }

    public function getTotalAttribute(){
        return $this->getSubtotalAttribute() + $this->$this->getIvaAttribute();
    }


}
