<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user\tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.tag.tag');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        return view('admin.tag.show',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|max:255',
            'slug' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        tag::create([
          'name' => $request->name,
          'slug' => Str::slug($request->name,'-'),

        ]);
        session()->flash('message','Post added successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = tag::all()->where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request,[
            'name' => 'required|max:255',
            'slug' => Str::slug($request->name,'-'),
        ]);


        $tag = tag::find($id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect( route('tag.create') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::where('id',$id)->delete();
        return redirect()->back();
    }
}
