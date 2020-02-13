<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentAttempts extends Model
{
    /**
     * Relation between Payment Attempts and Invoices
     * @return BelongsTo
     */
    public function Invoice():BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
