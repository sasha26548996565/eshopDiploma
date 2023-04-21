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
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        $products = QueryBuilder::for(Product::class)->allowedFilters(
            AllowedFilter::exact('title'),
            AllowedFilter::exact('article'),
            AllowedFilter::exact('description'),
            AllowedFilter::exact('category_id'),
            AllowedFilter::scope('price_from'),
            AllowedFilter::scope('price_to'),
        )->paginate(6);

        return view('index', compact('products'));
    }
}
