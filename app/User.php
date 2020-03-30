<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type_id', 'personal_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation between Clients and cities
     * @return BelongsToMany
     */
    public function Role():BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }


    public function getRoleOfClient(User $user)
    {
        if (DB::table('clients')->where('personal_id', $user->personal_id)->exists()) {
            $user->assignRole('Client');
        } elseif (DB::table('sellers')->where('personal_id', $user->personal_id)->exists()) {
            $user->assignRole('Seller');
        } else {
            $user->assignRole('Guest');
        }
    }
}
