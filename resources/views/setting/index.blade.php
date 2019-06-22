@extends('layouts.app')

@section('content')
 <section class="content-header">
      <h1>
     setting
        <small>list of setting</small>
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
          <h3 class="box-title">setting</h3>

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
@if(count($sett))

<div class='table-responsive'>
    
    <table class='table table-bordered'>
        
        <thead>
           
            <tr>
                <td>#</td>
                
                <td class="text-center">facebook</td>
                
                 <td class="text-center">twitter</td>
                  <td class="text-center">youtube</td>
                   <td class="text-center">instgram</td>
                   
                    <td class="text-center">whatsapp</td>
                    
                     <td class="text-center">google</td>
                     
                      <td class="text-center">aboutme</td>
                      
                       <td class="text-center">phone</td>
                        <td class="text-center">email</td>
                
             
              <td class="text-center">edit</td>
          </tr>
           
        </thead> 
        
        <tbody>
            @foreach($sett as $set)
            <tr>
      <td>{{$loop->iteration}}</td>
        
     
        
        <td> {{$set->facebook}} </td>
            
       
         
         <td> {{$set->twitter}} </td>
<td> {{$set->youtube}} </td>
<td> {{$set->instgram}} </td>
<td> {{$set->whatsapp}} </td>
<td> {{$set->google}} </td>
<td> {{$set->aboutme}} </td>
<td> {{$set->phone}} </td>
<td> {{$set->email}} </td>




                <td class="text-center">
                    <div class="form-group">

                        <a href="{{url(route('setting.edit',$set->id))}}" class="btn btn-danger">  edit</a>
                       
 

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

  
