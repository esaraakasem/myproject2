<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city=City::paginate(20);
      
      return view('city.index',compact('city'));
      
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('city.create');
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
           'city_name'=>'required'
           
       ];
       
       $message=[
           
           'city_name.requied'=>'this is required'
       ];
       
       $this->validate($request,$rule,$message);
       
       $cat=City::create($request->all());
       
          flash()->message('created');
          
     return redirect(route('city.index'));
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
          $cat=City::find($id);
        
        return view('city.edit',compact('cat'));
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
               $cat=City::find($id);
          $cat->update($request->all());
          
           flash()->message('edited');
           
           return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             $cat=City::find($id);
        $cat->delete();
         flash()->message('deleted');
        return back();
    }
}
