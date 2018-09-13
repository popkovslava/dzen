<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = ['id', 'title', 'url', 'public', 'shuffle'];

    public function slides()
    {
        return $this->hasMany('App\Models\ImgGallery')->orderBy('position', 'asc')->where('public', 1);
    }

    public static function getList()
    {
        return static::lists('title', 'id')->toArray();
    }
}
