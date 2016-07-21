<!doctype html>
<html lang="en">
<head>

	<title>Welcome</title>

	@include('includes.head')

</head>
<body>

    <div class="mcc-grid-full">
     <div class="mcc-width-one-whole">

    	<div class="mcc-grid-full">
    		<div class="mcc-width-one">
                @if (Auth::check())
                    @include('includes.headerLoggedIn')
                @else
                    @include('includes.header')
                @endif			
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