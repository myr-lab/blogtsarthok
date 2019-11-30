<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\user\category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.category.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = category::all();
        return view('admin.category.show',compact('category'));
         // return view('admin.category.category');
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
            'name' => 'required|unique:categories|max:255',

        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        category::create([
          'name' => $request->name,
          'slug' => Str::slug($request->name,'-'),

        ]);
        session()->flash('message','Post added successfully');
         return redirect( route('category.create') );
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
        $category = category::all()->where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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

        ]);

        $category = category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug( $request->name , '-');


        $category->save();

        return redirect( route('category.create') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id',$id)->delete();
        return redirect()->back();
    }
}
