<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';

    protected $fillable = ['id', 'title', 'key_config_id', 'link_id'];

    public function keyConfig()
    {
        return $this->belongsTo('App\Models\KeyConfig');
    }

    public function link()
    {
        return $this->belongsTo('App\Models\Link');
    }
}
