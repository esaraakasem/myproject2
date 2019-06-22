@extends('layouts.app')

@section('content')
 <section class="content-header">
      <h1>
     connect
        <small>list of connect</small>
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
          <h3 class="box-title">conects</h3>

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
@if(count($cons))

<div class='table-responsive'>
    
    <table class='table table-bordered'>
        
        <thead>
           
            <tr>
                <td>#</td>
                
                <td>address</td>
                
              <td>text</td>
              <td class="text-center">delete</td>
          </tr>
           
        </thead> 
        
        <tbody>
            @foreach($cons as $con)
            <tr>
        <td>{{$loop->iteration}}</td>  
        
     
        
        <td> {{$con->address}} </td>
            
       
         
         <td> {{$con->text}} </td>


                <td class="text-center">
                    <div class="form-group">


                        {!! Form::open([

                      'action'=>['ConnectController@destroy',$con->id],
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

  
