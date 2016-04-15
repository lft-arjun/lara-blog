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

        <div class="container">
        	<div class="jumbotron">
            @yield('content')
            </div>
        </div>
    </body>
</html>