<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Circle School Meadow Campus Dream Campaign | @yield('title','Welcome!')</title>
        
        <!-- BOOTSTRAP -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ URL::asset('packages/bootstrap/css/bootstrap.min.css') }}">
        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ URL::asset('packages/bootstrap/css/bootstrap-theme.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('css/application.css') }}">
       
        <!-- JQUERY -->
        <script src="{{ URL::asset('packages/jquery/jquery-1.11.1.min.js') }}"></script>

        <script src="{{ URL::asset('js/background-fix.js') }}"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('head')

    </head>
    <body
        class='
        @if(Auth::check())
            {{ "logged-in" }}
        @endif
        @yield("bodyclass")
        '
    >
    <div id="header">
        <div class="container">
            <div class="page-header">
                <h1><a href="/" class="no-link-style"><span class="sr-only">The Circle School </span>Meadow Campus Dream Campaign</a></h1>
                    <!-- Nav bar -->
            </div> 
        </div>  
    </div>
    <div id="background">
        <div class="container">
            <!-- TODO: Try to get this working: http://stackoverflow.com/questions/10099422/flushing-footer-to-bottom-of-the-page-twitter-bootstrap -->
            <div class="main">
                
                
                <!-- Admin nav bar -->
                @if(Auth::check())
                    <nav class="navbar navbar-pills navbar-fixed-top admin-nav" role="navigation">
                        <div class="container">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <span class="navbar-brand">Hi {{ Auth::user()->first_name }}!</span>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/donors/admin">Donors</a></li>
                            <li><a href="#">Users</a></li>
                            <li><a href="#">Your Account</a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                @endif
                
                <div class="content clearfix">
                    <!-- Alert messages - success and error -->
                    @if(Session::get('success_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{ Session::get('success_message') }}
                        </div>
                    @endif

                    @if(Session::get('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{ Session::get('error_message') }}
                        </div>
                    @endif
                    @yield('content') 
                </div>

            </div>

            <!-- Footer -->
            <div>
                <div class="row footer">
                    <div class="col-md-3"></div>
                    <!-- Contact info -->
                    <div class="col-md-6">
                        <address class="text-center small">
                            The Circle School &nbsp;|&nbsp; 210 Oakleigh Avenue, Harrisburg, PA 17111<br>
                            717-564-6700 &nbsp;|&nbsp; <a href="mailto:hello@circleschool.org">hello@circleschool.org</a> &nbsp;|&nbsp; <a href="http://circleschool.org/">http://circleschool.org</a>
                        </address>
                    </div>
                    <!-- Admin login -->
                    <div class="col-md-3">
                        <p class="small" id="login">
                            <br>
                            @if(Auth::check())
                                <a href="/logout">Log out</a>
                            @else
                                <a href="/login">Log in</a>
                            @endif
                        </p>
                    </div>
                <div>
            </div>
        
            

        @yield('body')
    </div>
    <!-- Bootstrap's Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('foot')

    </body>
</html>