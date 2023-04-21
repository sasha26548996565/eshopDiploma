<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade;
use App\Http\Requests\Main\Cart\AddRequest;
use App\Http\Requests\Main\Cart\RemoveRequest;
use App\Http\Requests\Main\Cart\UpdateRequest;

class CartController extends Controller
{
    // public function __contsruct()
    // {
    //     if (session()->get('cartId') == null)
    //         session(['cartId' => uniqid()]);
    // }

    public function index(): JsonResponse
    {
        $cart = CartFacade::session(session()->get('cartId'));
        return response()->json(['products' => $cart->getContent(), 'totalPrice' => $cart->getSubTotal()]);
    }

    public function add(AddRequest $request): JsonResponse
    {
        if (session()->get('cartId') == null)
            session(['cartId' => uniqid()]);

        $params = $request->validated();
        $product = Product::findOrFail($params['product_id']);
        $cart = CartFacade::session(session()->get('cartId'))->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $params['quantity'],
            'associatedModel' => $product
        ]);
        return response()->json(['products' => $cart->getContent(), 'totalPrice' => $cart->getSubTotal()]);
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        $params = $request->validated();
        $product = Product::findOrFail($params['product_id']);
        $cart = CartFacade::session(session()->get('cartId'));
        $cart->update($product->id, ['quantity' => ['relative' => false, 'value' => $params['quantity']]]);
        return response()->json(['products' => $cart->getContent()]);
    }

    public function remove(RemoveRequest $request): JsonResponse
    {
        $params = $request->validated();
        $cart = CartFacade::session(session()->get('cartId'));
        $cart->remove($params['product_id']);
        return response()->json(['products' => $cart->getContent()]);
    }

    public function clear(): JsonResponse
    {
        $cart = CartFacade::session(session()->get('cartId'));
        $cart->clear();
        return response()->json(['Cart be clear successful!']);
    }
}
