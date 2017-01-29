<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fbid'
    ];

    public function vote() {
        return $this->hasOne('App\Vote');
    }

    public function hasAlreadyVoted() {
        return $this->hasOne('App\Vote')->count() > 0;
    }
}
