@extends('welcome')

@section('content')

	<!-- Lang Settings -->
	<p class="text-center">
		{{ trans('test.hello') }},
		<a href="{{ url($locale . '/home/') }}"> {{ trans('test.locale_link') }} </a>
	</p>

	@foreach($posts->items() as $post)

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

				<div class="modal-footer"> 
					<!-- Showing The Catigore of this post -->
					@foreach($articles as $article)
						@if($article->id == $post->article_id)

							<a href="{{ action('FrontEndController@article', $article->id) }}"> 
								{{ $article->name }}
							</a>

						@endif
					@endforeach
					
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