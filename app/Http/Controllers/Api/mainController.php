<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Government;

use App\City;

use App\Post;

use App\Category;

use App\Donation;

use App\Bloods;

use App\Setting;

use App\Report;

use App\Connect;

use App\Notification;


use App\Http\Controllers\Controller;

class mainController extends Controller
{
      public function governments(){
       
   $govs= Government::all();
   
   return responseJson(1,"success", $govs);
       
   }
      public function cities(Request $request){
       
     $city=City::where(function($query) use($request) {
         
         
         if($request->has('government_id')){
             
           $query->where('government_id',$request->government_id);  
         }
         
     })->get();  
       
       return responseJson(1,"success", $city); 
   }
   
   public function posts(Request $request){
       
      $post=Post::where(function($query)use($request) {
          
          if($request->has('category_id')){
              
              $query->where('category_id',$request->category_id);
          }
          
      })->get();
       
       return responseJson(1,"success",$post); 
   }
   
   
   public function catogery(){
       
  $catogery= Category::all();
  
   return responseJson(1,"success",$catogery);
       
   
   }
   
   
   public function donationrequest(){
       
      $donation=Donation::paginate();
      
         return responseJson(1,"success",$donation);
       
       
   }
   
   
   
   public function createdonationrequest(Request $request){
       
       
            $rule=[
            
                 'name'=>'required',
                 'blood'=>'required',
                 'age'=>'required',
                 'addresshospital'=>'required',
                 'phone'=>'required',
                 'notices'=>'required',
                'client_id'=>'required',
                'city_id'=>'required',
                'hospitalname'=>'required'
            ];
        
        $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
       
       $donation=Donation::create($request->all());
       
         return responseJson(1,' تم الارسال',$donation);
   }
   
   
   
   public function bloods(){
       
       $blood=Bloods::all();
       
          return responseJson(1,"success",$blood);
   }
   
    public function settings()
    {
        $setting=Setting::paginate(20);
        
        
        return responseJson(1, 'loaded', $setting);
    }
   
    public function report(Request $request){
        
        $rule=[
            'contain'=>'required'
            ];
        
        $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
           
        
        $report=Report::create($request->all());
        
        
         return responseJson(1,' تم الارسال',$report);
        
        
    }
    
    
    public function notification(){
        
        $notif=Notification::paginate(20);
        
         return responseJson(1,"success",$notif);
        
        
    }
    
    public function contact(Request $request){
        
       $rule=[
            'address'=>'required',
             'text'=>'required'
                    
            ];
        
        $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
        
        
        $conn= Connect::create($request->all());
        
         return responseJson(1,' تم الارسال',$conn);
        
    }
    
    
    public function detailsdonationrequest(Request $request){
        
      
        
        $donations = Donation::where(function ($query) use ($request) {
            if ($request->input('government_id')) {
                $query->whereHas('city', function ($query) use($request){
                    $query->where('government_id',$request->government_id);
                });
            }elseif ($request->input('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            
               elseif ($request->input('client_id')) {
                $query->where('client_id', $request->client_id);
            }
          
        })->with('city', 'clients')->latest()->paginate(10);

        return responseJson(1, 'success', $donations);
    }
    
    public function detailpost(Request $request){
        
        
       
        $post = Post::with('catogery')->find($request->post_id);
        if (!$post) {
            return responseJson(0, '404 no post found');
        }
        return responseJson(1, 'success', $post);
        
        
    }
    
    
    public function registertoken(Request $request){
        
        
            $rule=[
            'token'=>'required',
             'platform'=>'required'
                    
            ];
        
        $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
        
       $register=$request->user()->requests()->create($request->all());
        
    }
}
