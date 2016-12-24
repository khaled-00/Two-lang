@extends('panel.index', ['p' => 'post'])

@section('content')
    <div class="row">
      <div class="col-md-offset-1 col-md-10">

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">publishing a new Post</h3>
          </div>
          <div class="box-body">
            {!! Form::open(['url' => 'panel/post', 'files' => true]) !!}
              
              <!-- .Title -->   
              <div class="form-group"> 
                {!! Form::label('en_title', "Title in ENGLISH:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-edit "></i>
                  </div> 
                  {!! Form::text('en_title', null, 
                  ['class' => 'form-control', 'placeholder' => 'Something cool...']) !!}
                </div>
              </div>
              <div class="form-group"> 
                {!! Form::label('ar_title', "Title in ARABIC:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-edit "></i>
                  </div> 
                  {!! Form::text('ar_title', null, 
                  ['class' => 'form-control', 'placeholder' => 'Something cool...']) !!}
                </div>
              </div>
              <!-- /.Title -->   

              <!-- .Image -->
              <div class="form-group">
                  {!! Form::label('image', "An Image:") !!}
                  {!! Form::file('image', null) !!}
              </div>
              <!-- /.Image -->

              <!-- .Description -->
              <div class="form-group"> 
                {!! Form::label('en_description', "Description in ENGLISH:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-edit "></i>
                  </div> 
                  {!! Form::textarea('en_description', null, 
                  ['class' => 'form-control', 'placeholder' => 'Something cool...', 'rows' =>3]) !!}
                </div>
              </div>
              <div class="form-group"> 
                {!! Form::label('ar_description', "Description in ARABIC:") !!}
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-edit "></i>
                  </div> 
                  {!! Form::textarea('ar_description', null, 
                  ['class' => 'form-control', 'placeholder' => 'Something cool...', 'rows' =>3]) !!}
                </div>
              </div>
              <!-- /.Description -->

              <!-- .Article -->
              <div class="form-group">
                <label>Categories  "EN" .. "AR"</label>
                <select class="form-control" name="article_id">
                  @foreach($articles as $article)
                    <option value="{{ $article->id }} ">
                       "{{ $article->translate('en')->name }}" 
                        .. 
                       "{{ $article->translate('ar')->name }}" 
                    </option>
                  @endforeach
                </select>
              </div>
              <!-- /.Article -->

              <div class="form-group">  
                {!! Form::submit('Add Post', ['class' => 'btn btn-primary form-control']) !!}
              </div>

            {!! Form::close() !!}
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
       </div>
     </div>
@stop