<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.head')
</head>

<body>
	@include('includes.nav') 
	@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

@endif


	<div class="container">

    @yield('components')
    
	</div>
	@include('includes.footer')
</body>

</html>