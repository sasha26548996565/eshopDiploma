<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class IndexController extends Controller
{
    public function index(): View
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
