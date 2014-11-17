<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Circle School Meadow Campus | @yield('title','Welcome!')</title>
        
        <!-- BOOTSTRAP -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ URL::asset('packages/bootstrap/css/bootstrap.min.css') }}">
        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ URL::asset('packages/bootstrap/css/bootstrap-theme.min.css') }}">
     
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
        <!-- JQUERY -->
        <script src="{{ URL::asset('packages/jquery/jquery-1.11.1.min.js') }}"></script>

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
        @yield("body-class")
        '
    >
    <div id="background">
        <div class="container">
            <!-- TODO: Try to get this working: http://stackoverflow.com/questions/10099422/flushing-footer-to-bottom-of-the-page-twitter-bootstrap -->
            <div class="main">

                <!-- Logo and site name -->
                <div class="page-header row">
                     <div class="col-md-2">
                        <a href="/">
                            <img id="logo" src="{{ URL::asset('images/websitelogo-170px.png') }}">  
                        </a>
                    </div>
                    <div class="col-md-10">
                        <h1><a href="/" class="no-link-style"><span class="sr-only">The Circle School </span>Meadow Campus Project</a></h1>
                        <!-- Nav bar -->
                    <nav class="navbar navbar-default nav-justified" role="navigation">
                      <div class="container-fluid">
                                                <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
<!--                           <a class="navbar-brand" href="/">
                            <img alt="The Circle School" src="{{ URL::asset('images/websitelogo.png') }}">
                            <span class="sr-only">The Circle School </span>Meadow Campus Project
                          </a> -->
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav nav-pills nav-justified" role="tablist">
<!--                             <li class="active"><a href="http://localhost/about">About the <br>Project</a></li>
                            <li><a href="http://localhost/help">How You <br>Can Help</a></li>
                            <li class="pledge-button"><a href="http://localhost/pledge">Pledge <br>Now!</a></li>-->
                            
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                About the <br>Project <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/plans">Plans and Drawings</a></li>
                                    <li><a href="/updates">Updates from the Meadow</a></li>
                                </ul>
                            </li>
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Fundraising <br>Campaign <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/help">We Need Your Help!</a></li>
                                    <li><a href="/scenarios">Scenarios &amp; Calculators</a></li>
                                    <li><a href="/donors">Donor List</a></li>
                                </ul>
                            </li>
                            <li class="pledge-button"><a href="https://secure.jotform.us/form/42086602993157" target="_blank" class="btn btn-lg btn-success navbar-btn" role="button">Pledge<br>Now</a><!--<a href="http://localhost/pledge">Pledge <br>Now!</a>--></li>
                        </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                    </div> 

                    

                </div>
                
                <!-- Admin nav bar -->
                @if(Auth::check())
                    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#">Hi {{ Auth::user()->first_name }}!</a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li><a href="/progress/edit">Manage Progress</a></li>
                            <li><a href="/donors/create ">Manage Donors</a></li>
                            <li><a href="/updates/add">Manage Updates</a></li>
                            <li><a href="/updates/add">Manage Admin Users</a></li>
                            <li><a href="/updates/add">Manage Your Account</a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                @endif

                

                <!-- Alert messages - success and error -->
                @if(Session::get('success_message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ Session::get('success_message') }}
                    </div>
                @endif

                @if(Session::get('error_message'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error_message') }}
                    </div>
                @endif

                <div class="content">
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
                                <a href="logout">Log out</a>
                            @else
                                <a href="login">Log in</a>
                            @endif
                        </p>
                    </div>
                <div>
            </div>
            
        <!-- Bootstrap's Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        @yield('body')
    </div>
    </body>
</html>