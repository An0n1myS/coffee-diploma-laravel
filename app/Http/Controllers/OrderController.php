<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Delivery;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Payment;
use Composer\XdebugHandler\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder()
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            $order = Orders::create([
                'user_id' => $user->id,
            ]);

            $cartItems = CartItems::where('cart_id', $cart->id)->get();

            foreach ($cartItems as $cartItem) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'item' => $cartItem->product->id,
                    'count' => $cartItem->count,
                ]);

                $order->total_amount += $cartItem->product->price * $cartItem->count;
            }

            $order->save();

            $cart->delete();
        }
        $order = Orders::where('status_id', 1)->first();

        $order_items = OrderItems::where('order_id', $order->id)->get();

        $total_price = 0;

        foreach ($order_items as $order_item)
            $total_price +=$order_item->product->price*$order_item->count;

        $payments = Payment::all();
        $deliveries = Delivery::all();
        return view('order', compact(['order_items','total_price','order','payments','deliveries']));
    }

    public function changeOrder(Request $request)
    {
        $select_payment = $request->input('select_payment');
        $select_delivery = $request->input('select_delivery');
        $order_id = $request->input('order_id');
        $order = Orders::find($order_id);

        $order->update(
            [
                'payment_id' => $select_payment,
                'delivery_id' => $select_delivery,
                'status_id'=> 2,
            ]
        );

        return redirect(route('profile'));
    }
}
