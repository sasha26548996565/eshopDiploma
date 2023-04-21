<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(string $article): View
    {
        $product = Product::where('article', $article)->first();
        $previews = $product->images->mapToGroups(function ($item) {
            return ['preview_images' => $item->image_preview];
        });
        $images = $product->images->mapToGroups(function ($item) {
            return ['images' => $item->image];
        });
        return view('product', compact('product', 'previews', 'images'));
    }
}
