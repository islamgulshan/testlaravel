<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $category =  Category::all();
        return view('admin.categories.index',compact('category'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

 
        
        $input = $request->all();
 
        Category::create($input);


        return redirect('/admin/Categoires');

        //
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
        $Category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('Category'));
        //
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
        //
        
        $Categoires = Category::findOrFail($id);

        $input = $request->all();
    
        $Categoires->update($input);

        return redirect('/admin/Categoires');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Category = Category::findOrFail($id);
        
        $Category->delete();

        return redirect('/admin/Categoires');

        //
    }
}
