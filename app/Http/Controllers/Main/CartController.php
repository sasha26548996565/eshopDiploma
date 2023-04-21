<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade;
use App\Http\Requests\Main\Cart\AddRequest;

class CartController extends Controller
{
    public function add(AddRequest $request): JsonResponse
    {
        if (session()->get('cartId') == null)
            session(['cartId' => uniqid()]);

        $params = $request->validated();
        $product = Product::findOrFail($params['product_id']);
        $cart = CartFacade::add(session()->get('cartId'))->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $product->quantity,
            'attributes' => [
                'article' => $product->article,
                'image_preview' => $product
            ]
        ]);
        return response()->json();
    }
}
