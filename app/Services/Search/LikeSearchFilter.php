<?php

namespace App\Services\Search;

use Illuminate\Database\Eloquent\Builder;

class LikeSearchFilter
{

    public function __construct(
        private ?string $value,
        private ?string $column,
    )
    {   }

    public function apply(Builder $query) : void
    {
        $query->when(
            filled($this->value),
            fn (Builder $query) => $query->where($this->column, 'like', "%{$this->value}%")
        );
    }


}
