@extends('layouts.app')

@section('content')
 <section class="content-header">
      <h1>
   donation
        <small>list of donation</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">donation</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @include('flash::message')
@if(count($don))

<div class='table-responsive'>
    
    <table class='table table-bordered'>
        
        <thead>
           
            <tr>
                <td>#</td>
                
                <td class="text-center">name</td>
                
                 <td class="text-center">age</td>
                  <td class="text-center">blood</td>
                   <td class="text-center">addresshospital</td>
                   
                    <td class="text-center">phone</td>
                    
                     <td class="text-center">city_id</td>
                     
                      <td class="text-center">notices</td>
                      
                       <td class="text-center">client_id</td>
                        
                
             
             
          </tr>
           
        </thead> 
        
        <tbody>
            @foreach($donas $set)
            <tr>
      <td>{{$loop->iteration}}</td>
        
     
        
        <td> {{$set->name}} </td>
            
       
         
         <td> {{$set->age}} </td>
<td> {{$set->blood}} </td>
<td> {{$set->addresshospital}} </td>
<td> {{$set->phone}} </td>
<td> {{$set->city_id}} </td>
<td> {{$set->notices}} </td>
<td> {{$set->client_id}} </td>





                <td class="text-center">
                    <div class="form-group">

    
                                            {!! Form::open([

                     'action'=>['DonationController@destroy',$set->id],
                     'method'=>'delete'
                 ]) !!}

                       <button class="btn btn-danger">delete</button>

                       {!! Form::close() !!}
  
 

                    </div>

                </td>
            </tr>
           @endforeach 
        </tbody>
        
        
        @else
        <div class="alert alert-primary">
           no data
            
            
        </div>

    </table>   
    
    @endif
    
</div>








        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    @endsection

  
