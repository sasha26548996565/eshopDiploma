<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
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
        if (isset($request->sort))
        {
            $products = $this->sortService->sortProducts(explode('|', $request->sort));
        }

        if ($request->ajax())
        {
            return view('includes.gallery.products', compact('products'));
        }

        return view('index', compact('products'));
    }
}
