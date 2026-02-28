<?php

namespace App\Services\Search;

use Illuminate\Database\Eloquent\Builder;

class WhereFilter
{

    public function __construct(
        private bool|string|int|null $value,
        private string $column
    )
    {}

    public function apply(Builder $query): void
    {
        $query->when(
            filled($this->value),
            fn (Builder $query) => $query->where($this->column, $this->value)
        );
    }

}
