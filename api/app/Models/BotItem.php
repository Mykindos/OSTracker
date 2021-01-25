<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BotItem extends Model
{
    protected $table = 'scriptitems';
    //

    public function itemstatus(){
        return $this->hasOne(ItemStatus::class, 'id');
    }

    public function item(){
        return $this->hasOne(Item::class, 'id');
    }
}
