<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyConfig extends Model
{
    protected $table = 'key_configs';

    protected $fillable = ['id', 'title', 'public'];

    public function config()
    {
        return  $this->hasMany('App\Models\Config');
    }
}
