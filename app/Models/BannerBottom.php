<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerBottom extends Model
{
    protected $table = 'banner_bottoms';
    protected $fillable = ['title','description','gallery_id'];

    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery');
    }

    public function page()
    {
        return $this->hasOne('App\Models\Page');
    }
}
