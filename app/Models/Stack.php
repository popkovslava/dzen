<?php

namespace App\Models;

use App\Admin\Http\Sections\StackCategory;
use SleepingOwl\Admin\Traits\OrderableModel;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    protected $table = 'stacks';
    protected $fillable = ['title', 'type', 'public', 'position'];

    use OrderableModel;

    public function category()
    {
        return $this->belongsTo('App\Models\StackCategory');
    }

    public function getOrderField()
    {
        return 'position';
    }

    public function scopePublic($query)
    {
        return $query->where('public', 1);
    }

    public function scopePosition($query)
    {
        return $query->orderBy('position', 'asc');
    }
}
