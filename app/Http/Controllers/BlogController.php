<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //Get all blog posts
    public function getIndex() {
        // create a var and store all the blog posts in it
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('blog.index')->withPosts($posts);
    }
    //Get single blog post
    public function getSingle($slug) {

        //fetch single post from DB based on $slug
        $post = Post::where('slug', '=', $slug)->first();
        //return the view
        return view('blog.single')->withPost($post);


    }

}
