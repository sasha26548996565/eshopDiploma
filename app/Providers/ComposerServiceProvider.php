<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\ViewComposers\ProductComposer;
use App\ViewComposers\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use App\ViewComposers\CollectionComposer;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('includes.left_panel.categories', CategoryComposer::class);
        View::composer('includes.left_panel.categories', CollectionComposer::class);
    }
}
