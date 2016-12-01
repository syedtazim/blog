<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex()
    {
        $posts= Post::paginate(3);
        return view('blog.index',compact('posts'));
    }

    public function getSingle($slug)
    {
        //dd($slug);
        $post = Post::where('slug','=',$slug)->first();
       // dd($post);
        return view('blog.single',compact('post'));
    }

}
