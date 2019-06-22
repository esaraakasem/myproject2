<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post=Post::paginate(20);
       
       return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
           'post_name'=>'required'
           
       ];
       
       $message=[
           
           'post_name.requied'=>'this is required'
       ];
       
       $this->validate($request,$rule,$message);
       
       $cat=Post::create($request->all());
       
         if($request->hasFile('image')){
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(300, 300)->save( public_path('/uploads/' . $filename ) );
            $cat->image = $filename;
            $cat->save();
        };

       
          flash()->message('created');
          
     return redirect(route('post.index'));
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
           $cat=Post::find($id);
        
        return view('post.edit',compact('cat'));
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
      $catt=Post::find($id);
          $catt->update($request->all());
          
          
              if($request->hasFile('image')){
            $thumbnail = $request->file('image');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->resize(200, 200)->save( public_path('/uploads/' . $filename ) );
            $catt->image = $filename;
            $catt->save();
        };

          
          
           flash()->message('edited');
           
           return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $cat=Post::find($id);
        $cat->delete();
         flash()->message('deleted');
        return back();
    }
}
