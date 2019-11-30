<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user\post;
use App\model\user\tag;
use App\model\user\category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class postController extends Controller
{
    public function __construct(){
     return $this->middleware('auth:admin');
    }
    
    public function index()
    {
        // return $request->all();
  
        $post = post::all();
        return view('admin.post.show',compact('post'));

         // return view('admin.post.home');
    }

 
    public function create()
    {

        $category = category::all();

        $tag = tag::all();
        return view('admin.post.home',compact('tag', 'category'));
    }

 
    public function store(Request $request)
    {

       $this->validate($request,[
        'title' => 'required',
        'subtitle' => 'required',
        'body' => 'required',
        'image' => 'required',


       ]);

       if($request->hasFile('image')){
            $imageName = $request->image->store('public');
        }

       $post = new post;
       $post->title = $request->title;
       $post->subtitle = $request->subtitle;
       $post->slug = Str::slug( $request->title , '-');
       $post->image = $imageName;
       $post->status = $request->status;
       $post->body = $request->body;

       $post->save();

       $post->tags()->sync( $request->tags);
       $post->categories()->sync( $request->categories);

       
       return redirect ( route('post.index') );

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = tag :: all();
        $category =category::all();
        $post = post::all()->where('id',$id)->first();
        return view('admin.post.edit',compact('post','tag','category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate( $request,[
            'title' => 'required|max:255',
            'body' => 'required',

        ]);

        if($request->hasFile('image')){
            $imageName = $request->image->store('public');
        }

        $post = post::find($id);

        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = Str::slug( $request->title , '-');
        $post->body = $request->body;
        $post->image = $request->image;

        // if ($request->image) {
        //     $post->image = $request->image;
        // }

        $post->status = $request->status;
        $post->save();

        $post->tags()->sync( $request->tags);
        $post->categories()->sync( $request->categories);
        

        return redirect( route('post.index') );

    }

    public function destroy($id)
    {

         \DB::table('post_tags')->where('post_id', $id)->delete();
         \DB::table('category_posts')->where('post_id', $id)->delete();
         
        post::where('id',$id)->delete();

        return redirect()->back();

    }
}
