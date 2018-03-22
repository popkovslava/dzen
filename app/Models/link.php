<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class Link extends Model
{
    use OrderableModel;

    protected $table = 'links';
    protected $fillable = ['title', 'position', 'public', 'url', 'page_id'];

    public function getOrderField()
    {
        return 'position';
    }

    public function page()
    {
        return  $this->hasMany('App\Models\Page');
    }

    public function scopePosition($query)
    {
        return $query->orderBy('position', 'asc');
    }
}
