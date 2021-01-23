<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserScript extends Model
{
    protected $table = 'userscripts';
    protected $fillable = ['userID', 'scriptID'];

    public function script(){
        return $this->hasOne(Script::class, 'id', "scriptID");
    }

    public function users(){
        return $this->hasOne(User::class, 'id', "userID");
    }
}
