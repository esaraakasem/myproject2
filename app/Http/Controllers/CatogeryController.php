<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CatogeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cats=  Category::paginate(20);
       //dd($cats);
       return view('catogery.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('catogery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rule=[
           'catogery_name'=>'required'
           
       ];
       
       $message=[
           
           'catogery_name.requied'=>'this is required'
       ];
       
       $this->validate($request,$rule,$message);
       
       $cat=Category::create($request->all());
       
          flash()->message('created');
          
     return redirect(route('catogery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::find($id);
        
        return view('catogery.edit',compact('cat'));
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
          $cat=Category::find($id);
          $cat->update($request->all());
          
           flash()->message('edited');
           
           return redirect(route('catogery.index'));
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=Category::find($id);
        $cat->delete();
         flash()->message('deleted');
        return back();
    }
}
