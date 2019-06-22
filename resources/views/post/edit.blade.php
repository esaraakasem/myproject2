@extends('layouts.app')
@inject('category','App\Category')
@section('content')
 <section class="content-header">
      <h1>
post
        <small>list of post</small>
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
          <h3 class="box-title">post</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
  
          {!!Form::model($cat,[
        'action'=>['PostController@update',$cat->id],
        'method'=>'put',
        'files'=>true,
        ]) !!}


            <div class='form-group' >
                       <label> name</label>

                {!!Form::text('post_name',null,[
                'class'=>'form-control'
                ])!!}
                 <label> contains</label>
                 {!!Form::text('contains',null,[
                'class'=>'form-control'
                ])!!}
                
                   <label> image</label>

                {!!Form::file('image',null,[
                'class'=>'form-control'
                ])!!}
                
                
                   <label> catogery</label>
              {!!Form::select('category_id',$category->pluck('catogery_name','id')->toArray(),null,[
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

  
