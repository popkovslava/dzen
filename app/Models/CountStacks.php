<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountStacks extends Model
{
    protected $table = 'count_stacks';

    protected $fillable = ['stack_category_id', 'stack_id'];
}
