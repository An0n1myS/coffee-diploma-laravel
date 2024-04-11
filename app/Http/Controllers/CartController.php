<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function cart()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect(route('login'));
        }

        $cart = Cart::where('user_id', $user->getAuthIdentifier())->first();
        if (!$cart) {
            return redirect(route('catalog'));
        }

        $cart_items = CartItems::where('cart_id', $cart->id)->get();

        $total_price = 0;

        foreach ($cart_items as $cart_item)
            $total_price +=$cart_item->product->price*$cart_item->count;

        return view('cart', compact(['cart_items','total_price']));
    }

    public function new_cart(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect(route('login'));
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);
        }

        $cartId = $cart->id;

        $product_id = $request->input('product_id');

        CartItems::updateOrInsert(
            [
                'product_id' => $product_id,
                'cart_id' => $cartId,
            ],
            [
                'count' => DB::raw('IFNULL(count, 0) + 1'),
            ]
        );

        return redirect(route('catalog'));
    }
    public function updateCartItems(Request $request)
    {
        $formData = $request->all();

        foreach ($formData['quantity'] as $productId => $quantity) {
            $cartItem = CartItems::where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->count = $quantity;
                $cartItem->save();
            }
        }
        return response()->json(['success' => true]);
    }
}
