@extends('layouts.app')

@section('content')
 <section class="content-header">
      <h1>
   report
        <small>list of report</small>
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
          <h3 class="box-title">report</h3>

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
@if(count($report))

<div class='table-responsive'>
    
    <table class='table table-bordered'>
        
        <thead>
           
            <tr>
                <td>#</td>
                
                <td>contain</td>
                
              <td>client_id</td>
              <td class="text-center">delete</td>
          </tr>
           
        </thead> 
        
        <tbody>
            @foreach($report as $con)
            <tr>
        <td>{{$loop->iteration}}</td>  
        
     
        
        <td> {{$con->contain}} </td>
            
       
         
         <td> {{$con->client_id}} </td>


                <td class="text-center">
                    <div class="form-group">


                        {!! Form::open([

                      'action'=>['ReportController@destroy',$con->id],
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

  
