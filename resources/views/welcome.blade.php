<html>
	<head>
		<title>{{ trans('test.title') }}</title>
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	</head>
	<body dir="{{ $locale == '/en' ? 'rtl' : 'ltr'}}">

		<div class="container">
			<div class="row">
      @include('alerts')
    </div>
			<br/>

			@yield('content')

		</div>
		
	</body>
</html>
