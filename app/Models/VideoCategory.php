<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    protected $table = 'video_categories';

    protected $fillable = ['title'];

    public function videos()
    {
        return  $this->hasMany('App\Models\Video')->orderBy('position', 'asc')->where('public', 1);
    }
}
