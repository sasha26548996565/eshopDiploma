<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Services\SortService;

class IndexController extends Controller
{
    private SortService $sortService;

    public function __construct(SortService $sortService)
    {
        $this->sortService = $sortService;
    }

    public function index(Request $request): View
    {
        $products = Product::latest()->paginate(6);

        if ($request->ajax())
        {
            $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter([
                'sort' => $request->sort,
                'categoryIds' => $request->categoryIds,
                'collectionIds' => $request->collectionIds
            ])]);
            $products = Product::filter($filter)->paginate(6);
            return view('includes.gallery.products', compact('products'));
        }

        return view('index', compact('products'));
    }
}
