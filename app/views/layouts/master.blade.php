<!doctype html>
<html lang="en">
	<head>
		<meta charset= "UTF-8" >
		<title>Blogs</title>
		
		<!-- CSS -->
		<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" > -->

		{{HTML::style('css/bootstrap.css') }}
		{{HTML::script('js/jquery-1.12.3.js')}}
		{{HTML::script('js/bootstrap.js')}}

		<!-- js -->
		<!-- <script src= "https://code.jquery.com/jquery.js" ></script> -->
		<!-- <script src= "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
 -->
	</head>
    <body>
    <header>
		<nav class="navbar navbar-defualt" role="navigation">
			<div class="navbar-header">
				<ul class="nav navbar-nav">
					 @if(!Auth::check())
		                    <li>{{ HTML::link('users/create', 'Register') }}</li>   
		                    <li>{{ HTML::link('login', 'Login') }}</li>   
		              @else
		                    <li>{{ HTML::link('users/logout', 'logout') }}</li>
		              @endif
				</ul>
			</div>
		</nav>
	</header> 
   
        <div class="container">
        	<div class="jumbotron">
        	@if(Session::has('message'))
            	<p class="alert">{{ Session::get('message') }}</p>
        	@endif
            @yield('content')
            </div>
        </div>
    </body>
</html>