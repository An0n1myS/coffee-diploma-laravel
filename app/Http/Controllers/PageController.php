<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Cocktail;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function main(){
        $products = Product::all();
        $new_products = Product::orderByDesc('id')->get();
        $blog_list = Blog::all();

        return view('main', compact(['products','new_products','blog_list']));
    }


    public function product(Product $product){
        $products = Product::orderByDesc('id')->get();
        return view('product', compact(['product','products']));
    }


}
