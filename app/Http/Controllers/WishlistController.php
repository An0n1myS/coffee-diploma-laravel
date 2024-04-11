<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect(route('login'));
        }


        $wishlist = Wishlist::where('user_id', $user->getAuthIdentifier())->first();
        if (!$wishlist) {
            return redirect(route('catalog'));
        }

        $wishlist_items = WishlistItems::where('wishlist_id', $wishlist->id)->get();

        return view('wishlist', compact('wishlist_items'));
    }


    public function new_wishlist(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect(route('login'));
        }

        $wishlist = Wishlist::where('user_id', $user->id)->first();

        if (!$wishlist) {
            $wishlist = Wishlist::create([
                'user_id' => $user->id,
            ]);
        }

        $wishlistId = $wishlist->id;

        $product_id = $request->input('product_id');

        WishlistItems::create([
            'product_id' => $product_id,
            'wishlist_id' => $wishlistId
        ]);

        return redirect(route('catalog'));
    }

    public function removeFromWishlist(Request $request){
        $product_id = $request->input('product_id');
        WishlistItems::where('product_id',$product_id)->delete();
        return redirect(route('wishlist'));
    }
}
