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
    public function index(Request $request): View
    {

        return view('index', compact('products'));
    }
}
