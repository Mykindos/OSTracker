<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getScripts(){
        return $this->hasManyThrough(Script::class, UserScript::class, 'userID', 'id', 'id', 'scriptID');
    }

    /**
     * @param int $scriptID ID of the script
     * @return bool Returns true if the user has access to this script
     */
    public function hasScriptAccess($scriptID){
        return $this->getScripts()->where('scriptID', '=', $scriptID)->count() > 0;
    }


}
