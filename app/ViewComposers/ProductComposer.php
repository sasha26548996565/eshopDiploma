<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductComposer implements ComposerContract
{
    public function compose(View $view): View
    {
        return $view->with('products', Product::latest()->get());
    }
}
