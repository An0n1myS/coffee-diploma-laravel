<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CocktailController extends Controller
{
    public function shake(){
        return view('shake');
    }
    public function send_cocktail(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect(route('login'));
        }

        $title = $request->input('cocktail_title');
        $ingredients = $request->input('ingredients');

        $cocktail = Cocktail::create([
            'title' => $title,
            'ingredients' => $ingredients,
            'user_id' => $user->id,
        ]);

        return redirect(route('shake'));
    }
}
