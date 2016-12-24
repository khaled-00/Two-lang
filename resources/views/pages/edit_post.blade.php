@extends('welcome')

@section('content')
	
	<h1> Update Post</h1>
	<hr/>

	{!! Form::model($old_data, ['method' => 'PATCH',
	'files' => true , 'action' => ['FrontEndController@update', $post->id] ]) !!}
			{!! Form::hidden('old_image', $post->image) !!}
			{!! Form::hidden('old_id', $post->id) !!}
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

                	<!-- The old article -->
                  	@foreach($articles as $article)
                  		@if ($article->id == $post->article_id)

                  			<option value="{{ $article->id }} ">
		                       "{{ $article->translate('en')->name }}" 
		                        .. 
		                       "{{ $article->translate('ar')->name }}" 
	                    	</option>

                  		@endif

                  	@endforeach

                  	<!-- The rest of articles -->
              		@foreach($articles as $article) 
              			<!-- Don't show the old article again -->          		
	                    @if($article->id != $post->article_id )

		                    <option value="{{ $article->id }} ">
		                       "{{ $article->translate('en')->name }}" 
		                        .. 
		                       "{{ $article->translate('ar')->name }}" 
		                    </option>

						@endif
                  	@endforeach
                </select>
              </div>
              <!-- /.Article -->

              <div class="form-group">  
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary form-control']) !!}
              </div>

		
	{!! Form::close() !!}


	

@stop