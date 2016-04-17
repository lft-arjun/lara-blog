<!doctype html>
<html lang="en">
	<head>
		<meta charset= "UTF-8" >
		<title>Blogs</title>
		<script>
			var APP_ENV = {{ '"' . App::environment() .'"';}}
			
		</script>
		<!-- CSS -->
		{{HTML::style('css/bootstrap.css') }}
		{{HTML::style('css/styles.css') }}
		<!-- js -->
		{{HTML::script('js/jquery-1.12.3.js')}}
		{{HTML::script('js/bootstrap.js')}}
		{{HTML::script('js/comment.js')}}

	</head>
    <body>
	 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Blogs</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if(Auth::check() && Auth::User()->role === 'admin')
                <ul class="nav navbar-nav">
                    <li>
                        {{ HTML::link('posts/list', 'All Post') }}
                    </li>
                    <li>
                    	{{ HTML::link('comment/list', 'All Comments') }}
                    </li>
                </ul>
                @endif
                <div class="nav navbar-nav navbar-right">
               		 @if(!Auth::check())
		                    <li>{{ HTML::link('users/create', 'Register') }}</li>   
		                    <li>{{ HTML::link('login', 'Login') }}</li>   
		              @else
		                    <li><a>{{strtoupper(Auth::user()->role)}}</a></li>
		                    <li>{{ HTML::link('logout', 'logout') }}</li>
		              @endif
            	</div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
        <div class="container">
        	@if(Session::has('message'))
        		<div class="alert alert-info">
            	{{ Session::get('message') }}
            	</div>
        	@endif
            @yield('content')
             <!-- Footer -->
	        <footer>
	            <div class="row">
	                <div class="col-lg-12">
	                    <p>Copyright &copy; arjun.coders</p>
	                </div>
	                <!-- /.col-lg-12 -->
	            </div>
	            <!-- /.row -->
	        </footer>
        </div>

    </body>
</html>