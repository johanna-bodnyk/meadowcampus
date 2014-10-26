<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Circle School Meadow Campus | @yield('title','Welcome!')</title>
        
        <!-- BOOTSTRAP -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
     
        <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">

        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
        <div class="container">
            <!-- TODO: Try to get this working: http://stackoverflow.com/questions/10099422/flushing-footer-to-bottom-of-the-page-twitter-bootstrap -->
            <div class="main">

                <!-- Logo and site name -->
                <div class="page-header row">
                    <div class="col-md-3">
                        <a href="/">
                            <img src="{{ URL::asset('images/websitelogo.png') }}">  
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h1><span class="sr-only">The Circle School </span>Meadow Campus Fundraising</h1>
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
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        {{ HTML::nav_link('/', 'Home') }}
                        {{ HTML::nav_link('pledge', 'Pledge Now') }}
                        {{ HTML::nav_link('scenarios', 'Scenarios &amp; Calculators') }}
                        {{ HTML::nav_link('donors', 'Donors') }}
                        {{ HTML::nav_link('updates', 'Building Updates') }}
                        {{ HTML::nav_link('faqs', 'FAQs') }}                      
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>

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
            <div class="footer">
                <hr>
                <!-- Footer -->
                <address class="text-center small">
                    The Circle School &nbsp;|&nbsp; 210 Oakleigh Avenue, Harrisburg, PA 17111<br>
                    717-564-6700 &nbsp;|&nbsp; <a href="mailto:hello@circleschool.org">hello@circleschool.org</a> &nbsp;|&nbsp; <a href="http://circleschool.org/">http://circleschool.org</a>
                </address>
                <p class="small">

                    @if(Auth::check())
                        <a href="logout">Logout</a>
                    @else
                        <a href="login">Admin login</a>
                    @endif
                </p>
            </div>
            
        <!-- Bootstrap's Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        @yield('body')

    </body>
</html>