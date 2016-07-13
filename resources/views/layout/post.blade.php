<!doctype html>
<html lang="en">
<head>

	@if ($post)
		<title>Post - {{ $post->_id }}</title>
	@endif

	@include('includes.head')

</head>
<body>

    <div class="mcc-grid-full">
     <div class="mcc-width-one-whole">

    	<div class="mcc-grid-full">
    		<div class="mcc-width-one">
			@include('includes.header')
			</div>
    	</div>

    	<div id="main" class="mcc-grid">
    		<div class="mcc-width-one">
        		@yield('content')
        	</div>
   		</div>

    	<div class="mcc-grid-full">
    		<div class="mcc-width-one">
			@include('includes.footer')
			</div>
    	</div>


     </div>
    </div>
</body>
</html>