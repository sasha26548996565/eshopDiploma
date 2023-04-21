<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Category;
use App\Models\Collection;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Product\Priceable;
use App\Models\Traits\Product\Discountable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Attributes\SearchUsingFullText;

class Product extends Model
{
    use HasFactory, SoftDeletes, Discountable, Priceable;

    protected $fillable = [
        'article', 'title', 'description', 'price', 'category_id', 'collection_id', 'picture', 'discount', 'properties',
    ];

    protected $casts = [
        'properties' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }
   
    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
