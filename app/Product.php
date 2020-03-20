<?php

namespace App;

use App\Helpers\MoneyHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $guarded = [];


    /**
     * Relation between products and invoices
     * @return BelongsToMany
     */
    public function invoices():BelongsToMany
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function priceFormatted(): string
    {
        return MoneyHelper::format($this->price, config('app.monetary_locale'));
    }

    public function scopeName($query, $name)
    {
        if ($name != "") {
            return $query->where('name', "LIKE", "%$name%");
        }
    }

    public function scopeDescription($query, $description)
    {
        if ($description != "") {
            return $query->where('description', "LIKE", "%$description%");
        }
    }
}
