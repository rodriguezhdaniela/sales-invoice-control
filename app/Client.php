<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopePersonal_id($query, $personal_id)
    {
        if ($personal_id != "")
        {
            return $query->where('personal_id', $personal_id);
        }
    }
    public function scopeName($query, $name)
    {
        if ($name != "")
        {
            return $query->where('name', "LIKE", "%$name%");
        }

    }

}
