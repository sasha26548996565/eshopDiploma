<?php

declare(strict_types=1);

namespace App\Http\Filters;

use App\Models\Product;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    private const PRICE_FROM = 'priceFrom';
    private const PRICE_TO = 'priceTo';
    private const SORT = 'sort';
    private const CATEGORY_IDS = 'categoryIds';
    private const COLLECTION_IDS = 'collectionIds';

    public function getCallbacks(): array
    {
        return [
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo'],
            self::SORT => [$this, 'sort'],
            self::CATEGORY_IDS => [$this, 'categoryIds'],
            self::COLLECTION_IDS => [$this, 'collectionIds'],
        ];
    }

    public function priceFrom(Builder $builder, $value): void
    {
        $builder->where('price', '>=', $value);
    }

    public function priceTo(Builder $builder, $value): void
    {
        $builder->where('price', '<=', $value);
    }

    public function sort(Builder $builder, $value): void
    {
        $sort = explode('|', $value);
        $builder->orderBy(in_array($sort[0], Product::ALLOWED_SORTING) ? $sort[0] : 'name',
            in_array($sort[1], ['asc', 'desc']) ? $sort[1] : 'asc');
    }

    public function collectionIds(Builder $builder, $value): void
    {
        $builder->whereIn('collection_id', $value);
    }

    public function categoryIds(Builder $builder, $value): void
    {
        $builder->whereIn('category_id', $value);
    }
}
