<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class ProductFilterService
{
    /**
     * Применить фильтры к запросу.
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function applyFilters(Builder $query, array $filters): Builder
    {
        foreach ($filters as $name => $values) {
            $query->whereHas('properties', function ($query) use ($name, $values) {
                $query->where('name', $name)
                    ->whereIn('value', $values);
            });
        }

        return $query;
    }
}
