<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    public function catalog(Request $request) {
        $categories = Category::all();
        $perPage = $request->input('perPage', 12);
        $currentPage = $request->input('page', 1);
        $categoryId = $request->input('category');

        $query = Product::query();

        if ($categoryId) {
            // Если выбрана категория, фильтруем товары по категории
            $query->whereHas('category', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        $products = $query->paginate($perPage);

        return view('catalog', compact(['categories', 'products', 'perPage', 'categoryId']));
    }

}

