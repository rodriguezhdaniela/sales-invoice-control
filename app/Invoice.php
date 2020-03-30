<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Relation between invoices and Payment Attempts
     * @return BelongsToMany
     */
    public function PaymentAttempts():BelongsToMany
    {
        return $this->belongsToMany(PaymentAttempt::class)->withPivot('requestId', 'processUrl', 'status');
    }

    /**
     * Scope to filter invoices by clients
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
     * Scope to filter invoices by seller
     *
     * @param Builder $query
     * @param string|null $id
     * @return Builder
     */
    public function scopeOfSeller(Builder $query, ?string $id)
    {
        if ($id) {
            return $query->where('seller_id', $id);
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


    /**
     * Scope to filter invoices by expiration date
     *
     * @param Builder $query
     * @param string|null $status
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function scopeStatus(Builder $query, ?string $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }

        return $query;
    }
}
