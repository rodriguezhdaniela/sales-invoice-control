<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function scopePersonal_id($query, $personal_id)
    {
<<<<<<< HEAD
        if ($personal_id != "") {
            return $query->where('personal_id', $personal_id);
        }
    }

    public function scopeName($query, $name)
    {
        if ($name != "") {
            return $query->where('name', "LIKE", "%$name%");
        }

=======
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
>>>>>>> 28363c4c22a2c3ec9f43d2f0f9d0d62572744232

    }

}
