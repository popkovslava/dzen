<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stack;

class StackCategory extends Model
{
    protected $table = 'stack_categories';

    protected $fillable = ['title', 'public', 'stack_id'];

    public function stacks()
    {
        return $this->belongsToMany(Stack::class, 'count_stacks')
            ->where('stacks.public', '=', true)
            ->orderBy('stacks.position', 'ASC');
    }

    public function isType($type = '')
    {
        foreach ($this->stacks as $item) {
            if ($item->type == $type) {
                return true;
            }
        }
        return false;
    }
}
