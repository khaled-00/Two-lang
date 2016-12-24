@extends('welcome')

@section('content')

	<!-- Back Home -->
	<a href="{{ url(\LaravelLocalization::getCurrentLocale() . '/home/') }}">
		<b>{{ trans('test.home') }}</b>
	</a>

	<!-- Lang Settings -->
	<p class="text-center">
		{{ trans('test.hello') }},
		<a href="{{ url($locale . '/post/' . $post->id) }}"> {{ trans('test.locale_link') }} </a>
	</p>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2 class="modal-heading">{{ $post->title }}</h2>

			<div class="modal-body">
				<img src="{{asset('uploads/' . $post->image)}}" alt="{{$post->title}}" width="200" />
				<br/><br/>
				{{ $post->description }}
			</div>

			<div class="modal-footer"> 
				<!-- Showing The Catigore of this post -->
				@if($article)
					<a href="{{ action('FrontEndController@article', $article->id) }}"> 
						{{ $article->name }}
					</a>
				@endif
			</div>
		</div>
	</div>

@endsection