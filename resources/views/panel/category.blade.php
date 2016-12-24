@extends('panel.index', ['p' => 'category'])

@section('content')
<div class="row">
      <div class="col-md-offset-1 col-md-10">

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">adding a new Category</h3>
          </div>
          <div class="box-body">
            {!! Form::open(['url' => 'panel/category']) !!}
              
              <div class="form-group"> 
                {!! Form::label('en_category', "Category's name in ENGLISH:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-archive"></i>
                  </div> 
                  {!! Form::text('en_category', null, 
                  ['class' => 'form-control', 'placeholder' => 'Something cool...']) !!}
                </div>
              </div>

              <div class="form-group"> 
                {!! Form::label('ar_category', "Category's name in ARABIC:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-archive"></i>
                  </div> 
                  {!! Form::text('ar_category', null,
                  ['class' => 'form-control', 'placeholder' => 'Something cool...']) !!}
                </div>
              </div>
               
              <div class="form-group">  
              {!! Form::submit('Add Catigory', ['class' => 'btn btn-primary form-control']) !!}
              </div>

            {!! Form::close() !!}
          </div>
          <!-- /.box-body -->

          </div>
         </div>
        </div>
     </div>
@stop