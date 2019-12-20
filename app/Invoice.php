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

    public function scopeSearch($query, $type, $search) {

        if(trim($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }


}
