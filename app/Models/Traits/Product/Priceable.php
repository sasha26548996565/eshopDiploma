<?php

declare(strict_types=1);

namespace App\Models\Traits\Product;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait Priceable
{
    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100
        );
    }

    public function scopePriceFrom(Builder $builder, $value): Builder
    {
        return $builder->where('price', '>=', $value * 100);
    }

    public function scopePriceTo(Builder $builder, $value): Builder
    {
        return $builder->where('price', '<=', $value * 100);
    }
}
