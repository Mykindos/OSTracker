<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $table = 'scripts';
    protected $fillable = ['name'];

    public function userScripts(){
        return $this->hasMany(UserScript::class, 'scriptID');
    }
}
