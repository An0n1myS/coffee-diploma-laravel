<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogsList(){
        $categories = Category::all();
        $blog_list = Blog::all();

        return view('blog.blogs-list', compact(['blog_list','categories']));
    }

    public function blogs(Blog $blog){
        $count_review = Review::where('blog_id',$blog->id)->count();
        $reviews = Review::where('blog_id',$blog->id)->get();
        return view('blog.blogs', compact(['blog','count_review','reviews']));
    }

    public function addReview(Request $request){
        $email = $request->input('email');
        $comment = $request->input('comment');
        $blog_id = $request->input('blog_id');

        Review::create([
            'email' => $email,
            'comment' => $comment,
            'blog_id' => $blog_id
        ]);
        return redirect(route('blog',['blog'=>$blog_id]));
    }
}
