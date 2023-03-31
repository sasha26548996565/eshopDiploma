<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
