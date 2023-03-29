<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'name', 'title_description', 'description', 'picture'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'collection_id', 'id');
    }
}
