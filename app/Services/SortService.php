<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class SortService
{
    public function sortProducts(array $params): Collection
    {
        $sort = in_array($params[0], Product::ALLOWED_SORTING) ? $params[0] : 'name';
        $sortMethod = in_array($params[1], ['asc', 'desc']) ? $params[1] : 'asc';
        return Product::orderBy($sort, $sortMethod)->get();
    }
}
