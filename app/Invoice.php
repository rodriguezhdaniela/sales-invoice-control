<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Scope to filter invoices by client
     *
     * @param Builder $query
     * @param string|null $id
     * @return Builder
     */
    public function scopeOfClient(Builder $query, ?string $id)
    {
        if ($id) {
            return $query->where('client_id', $id);
        }

        return $query;
    }

    /**
     * Scope to filter invoices by expedition date
     *
     * @param Builder $query
     * @param string|null $date
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeExpeditionDate(Builder $query, ?string $date)
    {
        if ($date) {
            return $query->whereDate('created_at', $date);
        }

        return $query;
    }

    /**
     * Scope to filter invoices by expiration date
     *
     * @param Builder $query
     * @param string|null $date
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeExpirationDate(Builder $query, ?string $date)
    {
        if ($date) {
            return $query->whereDate('expiration_date', $date);
        }

        return $query;
    }

}
