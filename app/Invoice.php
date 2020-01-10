<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    protected $guarded = [];

    /**
     * Relation between invoices and clients
     * @return BelongsTo
     */
    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }


    /**
     * Relation between invoices and sellers
     * @return BelongsTo
     */
    public function seller():BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }


    /**
     * Relation between invoices and products
     * @return BelongsToMany
     */
    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

    public function scopeSearch($query, $type, $search) {

        if(trim($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }


}
