
@if($errors ->any())
	<div class="col-md-offset-1 col-md-10 alert alert-danger" role="alert">
	    <strong>Warning!</strong> 
	    @foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
@endif

@if(Session::has('flash_message'))
	<div class="col-md-offset-1 col-md-10 alert alert-success" role="alert">
		<strong>Well done!</strong> 
		{{Session::get('flash_message')}}
	</div>
@endif
