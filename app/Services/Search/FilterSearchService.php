<?php

namespace App\Services\Search;

use Illuminate\Database\Eloquent\Builder;

class FilterSearchService
{

    public function apply(Builder $query, array $filters)
    {
        foreach ($filters as $filter) {
            $filter->apply($query);
        }

        return $query;

    }

}
