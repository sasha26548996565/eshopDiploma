<?php

declare(strict_types=1);

namespace App\Models\Traits\Product;

trait Discountable
{
    public function issetDiscount(): bool
    {
        return $this->discount == 0 ? false : true;
    }

    public function getPriceWithDiscount(): float
    {
        if ($this->discount == 0)
            return $this->price;

        $priceWithDiscount = $this->price - ($this->price * $this->discount / 100);
        return $priceWithDiscount;
    }
}
