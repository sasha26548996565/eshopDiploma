<?php

declare(strict_types=1);

namespace App\ViewComposers;

use App\Models\Collection;
use Illuminate\Contracts\View\View;

class CollectionComposer implements ComposerContract
{
    public function compose(View $view): View
    {
        return $view->with('collections', Collection::latest()->get());
    }
}
