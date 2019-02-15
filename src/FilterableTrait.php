<?php

namespace RalphMorris\LaravelRequestFilters;

use RalphMorris\LaravelRequestFilters\QueryFilter;

trait FilterableTrait
{
    /**
     * Filter Users based on query strings
     * 
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}