<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::latest()->get();
        if ($request->ajax())
        {
            $sort = explode('|', $request->sort);
            $products = Product::orderBy(
                in_array($sort[0], ['title', 'price']) ? $sort[0] : 'name',
                in_array($sort[1], ['asc', 'desc']) ? $sort[1]: 'asc',
            )->get();
            return view('includes.gallery.products', compact('products'));
        }

        return view('index', compact('products'));
    }
}
