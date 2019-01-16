<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type', 'fk_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
    public function profile()
    {
        try {
            switch ($this->user_type) {
                case 'u':
                    return $this->hasOne('App\Models\Passenger', 'id', 'fk_id');
                case 'd':
                    return $this->hasOne('App\Models\Driver', 'id', 'fk_id');
            }
        } catch (ModelNotFoundException $e) {
            return 'Exception';
        }
        
    }
}
