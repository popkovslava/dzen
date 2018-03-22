<?php namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class WorkFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function stacks($stacks)
    {
        $this->whereHas('stackCategory.stacks', function ($query) use ($stacks) {
            $table = $query->getModel()->getTable();
            return $query->whereIn("{$table}.id", $stacks);
        });
    }

    public function setup()
    {
        $this->table = $this->getModel()->getTable();
    }
}
