<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemStatus extends Model
{
    public $timestamps = false;

    protected $table = 'itemstatus';
    protected $fillable = ['status'];
}
