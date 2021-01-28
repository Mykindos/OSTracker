<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotLog extends Model
{
    protected $table = 'logs';

    public function scripts(){
        return $this->hasOne(Script::class, 'id');
    }
}
