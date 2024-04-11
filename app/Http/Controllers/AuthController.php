<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use App\Models\Orders;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\WishlistItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(){
        $data = request()->validate([
            'name'=>'required|string',
            'phone'=>'required|string',
            'email'=>"required|email|string|unique:users",
            'password'=>'required|confirmed',
        ]);

        $user = User::create([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data[ 'email'],
            'password'=>bcrypt($data['password']),
        ]);

        if($user){
            auth("web")->login($user);
        }

        return redirect('/');
    }


    public function logout(){
        auth("web")->logout();
        return redirect('/');
    }


    public function login(){
        $data = request()->validate([
            'email'=>"required|email|string",
            'password'=>'required|',
        ]);

        if (auth("web")->attempt($data)){
            return redirect('/');
        }


        return redirect(route('login'));
    }

    public function show_login(){
        return view('auth.login');
    }

    public function show_register(){
        return view('auth.register');
    }


    public function profile(){
        $user = Auth::user();
        $orders = Orders::where('user_id', $user->getAuthIdentifier())->get();
        $cocktails = Cocktail::where('user_id',$user->getAuthIdentifier())->get();
        return view('auth.profile', compact(['user','orders','cocktails']));
    }

}
