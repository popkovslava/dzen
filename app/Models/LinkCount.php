<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkCount extends Model
{
    protected $table = 'link_counts';
    protected $fillable = ['link_id', 'img_gallery_id'];
}
