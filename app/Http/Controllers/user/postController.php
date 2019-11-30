<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user\post;
use App\model\user\tag;
use App\model\user\category;

class postController extends Controller
{
    
    public function getAllPostContent()
    {
    	$posts = post::orderBy('created_at','DESC')->paginate(5);
    	return view("user.home",['post' => $posts]);
    }

    public function post(post $post)
    {   

    	return view("user.post",compact('post'));
    }

    public function tag(tag $tag)
    {   

    	$post = $tag->posts();
    	return view('user.home', compact('post'));

    }

    public function category(category $category)
    {   

    	$post = $category->posts();
    	 return view('user.home', compact('post'));
    	
    }
}
