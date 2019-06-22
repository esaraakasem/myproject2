<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;


use App\Client;

use Illuminate\Validation\Validator;

use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;


class AuthController extends Controller
{
 
   public function register(Request $request){
       
 
$rule=[
    'phone'=>'required',
    
    'password'=>'required',
    
    'age'=>'required',
    
    'number'=>'required',
    
    'username'=>'required',
    
    'city_id'=>'required',
    
    'notices'=>'required',
    
    'addres'=>'required',
    
    'name_hospital'=>'required',
    

];

   $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
       
        
   $client=Client::create($request->all());
   
  $request->merge(['password'=> bcrypt($request->password)]);
  
     $client=Client::create($request->all());
     
     $client->api_token=str_random(60);
     
     $client->save();
     
     $data=[
         'api_token'=>$client->api_token,
         'client'=>$client
         
     ];
   
   return responseJson(1,' تم التسجيل بنجاح',$data);
           
 
   
   }  
   
   
   public function login(Request $request){
       
        
$rule=[
    'phone'=>'required',
    
    'password'=>'required',
    
 
];

   $validator=validator()->make($request->all(),$rule);
        
        if($validator->fails()){
            
                 return responseJson(1,$validator->errors()->first(),$validator->errors());
        }
       
      //$auth=auth()->guard('api')->validate($request->all());
        
        $client=Client::where('phone',$request->phone)->first();
        
        if($client){
            
       if(\Illuminate\Support\Facades\Hash::check($request->password,$client->password))     
            
       {   
           return responseJson(1,' تم التسجيل بنجاح',[
               
          'api_token'=>$client->api_token,
         'client'=>$client
               
           ]);
       }
       
           else  { return responseJson(0,'لا يوجد حساب لهد الرقم ');}
       
        }
      
 
       
       
   }
   
  public function profile(Request $request){
      
       $validation = validator()->make($request->all(), [
            'password' => 'required',
          
            'phone' => Rule::unique('clients')->ignore($request->user()),
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            return responseJson(0,$validation->errors()->first(),$data);
        }
        
        $profile=$request->user();
        
        $profile->update($request->all());
        
         if ($request->has('password'))
        {
            $profile->password = bcrypt($request->password);
        }
        
        $profile->save();
        
         return responseJson(1,'تم تحديث البيانات',$profile);
        
        
      
  }
   
   

}
