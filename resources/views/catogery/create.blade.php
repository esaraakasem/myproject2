@extends('layouts.app')
@inject('model','App\Category')
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
  
        {!!Form::model($model,[
        'action'=>'CatogeryController@store'
        
        ]) !!}


            <div class='form-group' >
                <label> name</label>

                {!!Form::text('catogery_name',null,[
                'class'=>'form-control'
                ])!!}
                <div class='form-group' >
                    <button class="btn btn-primary" type="submit"> submit</button>
                </div>

            </div>
        {!!Form::close()!!}

    
    
    
</div>





        <!-- /.box-body -->
        
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    @endsection

  
