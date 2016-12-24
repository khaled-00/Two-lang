@extends('welcome')

@section('content')

	<!-- Back Home -->
	<h2> {{ $article->name }} </h2>
	
	<!-- Lang Settings -->
	<p class="text-center">
		{{ trans('test.hello') }},
		<a href="{{ url($locale . '/category/' . $article->id) }}"> {{ trans('test.locale_link') }} </a>
	</p>

	<!-- Back Home -->
	<a href="{{ url(\LaravelLocalization::getCurrentLocale() . '/home/') }}">
		<b>{{ trans('test.home') }}</b>
	</a>

	@foreach($posts as $post)

		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<p class="modal-heading">
					<h2>
						<a href="{{ action('FrontEndController@show', $post->id) }}"> 
							{{ $post->title }}
						</a>
					</h2>

					@if(Auth::check())
						<a href="{{ action('FrontEndController@edit', $post->id) }}"> 
						{{ trans('test.edit') }}
						</a>, 
						<a href="{{ action('FrontEndController@destroy', $post->id) }}"> 
						{{ trans('test.delete') }}
						</a>
					@endif
				</p>

				<div class="modal-body">
					<img src="{{asset('uploads/' . $post->image)}}" alt="{{$post->title}}" width="100" />
					<br/><br/>
					{{ $post->description }}
				</div>

			</div>
		</div>

	@endforeach

	<!-- pages paginate -->
	<div class="col-md-2 col-md-offset-4">
	    <?php foreach ($posts as $paginate): ?>
	        <?php echo $paginate->post; ?>
	    <?php endforeach; ?>
	</div>
	<?php echo $posts->render(); ?>

@endsection