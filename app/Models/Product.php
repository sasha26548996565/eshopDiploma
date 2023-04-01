<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'article', 'title', 'description', 'price', 'category_id', 'collection_id', 'picture', 'discount', 'properties',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public const ALLOWED_SORTING = ['title', 'price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100
        );
    }

    public function scopeFiltered(Builder $builder): void
    {
        $builder->when(request('filters.categories'), function (Builder $query) {
            $query->whereIn('category_id', request('filters.categories'));
        })->when(request('filters.collections'), function (Builder $query) {
            $query->whereIn('collection_id', request('filters.collections'));
        })->when(request('filters.price'), function (Builder $query) {
            $query->whereBetween('price', [request('filters.price.from') * 100, request('filters.price.to') * 100]);
        });
    }

    public function scopeSorted(Builder $builder): void
    {
        $builder->when(request('sort'), function (Builder $query) {
            $column = request()->str('sort');
            if ($column->contains(self::ALLOWED_SORTING))
            {
                $direction = $column->contains('-') ? 'DESC' : 'ASC';
                $query->orderBy((string) $column->remove('-'), $direction);
            }
        });
    }

    public function issetDiscount(): bool
    {
        return $this->discount == 0 ? false : true;
    }

    public function getPriceWithDiscount(): float
    {
        if ($this->discount == 0)
            return $this->price;

        $priceWithDiscount = $this->price - ($this->price * $this->discount / 100);
        return $priceWithDiscount;
    }
}
