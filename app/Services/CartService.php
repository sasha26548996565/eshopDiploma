<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;

class CartService
{
    public function add(string $cartId, Product $product, int $quantity): Cart
    {
        return CartFacade::session($cartId)->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $quantity,
            'associatedModel' => $product
        ]);
    }

    public function update(Cart $cart, int $productId, int $quantity): void
    {
        $cart->update($productId, ['quantity' => ['relative' => false, 'value' => $quantity]]);
    }

    public function remove(Cart $cart, int $productId): void
    {
        $cart->remove($productId);
    }

    public function clear(Cart $cart): void
    {
        $cart->clear();
    }
}
