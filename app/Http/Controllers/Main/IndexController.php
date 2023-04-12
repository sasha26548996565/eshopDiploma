<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Services\SortService;
use App\Http\Filters\ProductFilter;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query()->select(['id', 'title', 'description', 'price', 'properties', 'collection_id', 'article'])
            ->when(request('search'), function (Builder $builder) {
                $builder->whereFullText(['title', 'description'], request('search'));
            })
            ->filtered()->sorted()
            ->paginate(6);

        return view('index', compact('products'));
    }
}
