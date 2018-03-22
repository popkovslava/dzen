<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class MainMenu extends Model
{
    use OrderableModel;

    protected $table = 'main_menus';

    protected $fillable = ['page_id', 'title', 'position', 'public'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
    
    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery');
    }

    public function scopePublic($query)
    {
        return $query->where('public', 1);
    }

    public function getOrderField()
    {
        return 'position';
    }
}
