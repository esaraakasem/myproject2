@extends('layouts.app')

@section('content')
 <section class="content-header">
      <h1>
    catogery
        <small>list of catogery</small>
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
            
          <h3 class="box-title">catogery</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <a href="{{url(route('catogery.create'))}}" class="btn btn_primary btn btn-danger" ><i class=" fa fa-edit"></i> new catogery</a>
            @include('flash::message')
        @if($cats->count())


<div class='table-responsive'>
    
    <table class='table table-bordered'>
        
        <thead>
           
            <tr>
                <td>#</td>
                <td>name</td>
               
            
                <td class="text-center">edit</td>
              <td class="text-center">delete</td>
          </tr>
           
        </thead> 
        
        <tbody>

            @foreach($cats as $cat)
           <tr>
        <td>{{$loop->iteration}}</td>  
        
        <td> {{$cat->catogery_name}}</td>



        
       
            
          <td class="text-center"> 
          <a href="{{url(route('catogery.edit',$cat->id))}}" class="btn btn-danger">edit</a>
              @include('flash::message')
          </td>
              
               <td class="text-center"> 
                   <div class="form-group">


                       {!! Form::open([

                     'action'=>['CatogeryController@destroy',$cat->id],
                     'method'=>'delete'
                 ]) !!}

                       <button class="btn btn-danger">delete</button>

                       {!! Form::close() !!}


                   </div>

          </td>

           </tr>
           @endforeach 
        </tbody>
        
        
     
            


    </table>   
    
   
    
</div>


@else 

<div class="alert alert-danger">
         no data
         </div>
          @endif
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>


@endsection
