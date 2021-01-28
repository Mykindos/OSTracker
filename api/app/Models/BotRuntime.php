<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotRuntime extends Model
{
    protected $table = 'runtimes';

    public function botusers(){
        return $this->hasOne(BotUser::class, 'id');
    }

    public function scripts(){
        return $this->hasOne(Script::class, 'id');
    }
}
