<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Government;

class GovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $govs=  Government::paginate(20);
        
        return view('government.index',compact('govs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('government.create');
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
            'government_name'=>'required'
            
        ];
        $message=[
            'government_name.required'=>'this is required'
        ];
        
       $this->validate($request,$rule,$message);
       
       $gov=  Government::create($request->all());
       
        flash()->message('created');
        
        return redirect(route('government.index'));
        
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
        $gov=  Government::find($id);
        return view('government.edit',compact('gov'));
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
       $gov=  Government::find($id);
       $gov->update($request->all());
         flash()->message('edited');
            return redirect(route('government.index'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $gov=Government::find($id);
        $gov->delete();
         flash()->message('deleted');
        return back();
    }
}
