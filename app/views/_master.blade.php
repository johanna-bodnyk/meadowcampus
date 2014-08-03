<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Circle School Meadow Campus Fund | @yield('title','Welcome!')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="css/styles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <div class="container">
        <!-- TODO: Try to get this working: http://stackoverflow.com/questions/10099422/flushing-footer-to-bottom-of-the-page-twitter-bootstrap -->
        <div class="main">

            <!-- Logo and site name -->
            <div class="page-header row">
                <div class="col-md-3">
                    <img src="images/websitelogo.png">
                </div>
                <div class="col-md-9">
                    <h1><span class="sr-only">The Circle School </span>Meadow Campus Development Fund</h1>
                </div>
            </div>

            <!-- Admin nav bar -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Admin</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="progress/edit">Progress</a></li>
                    <li><a href="donors/add ">Donors</a></li>
                    <li><a href="updates/add">Updates</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

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
                    <li class="active"><a href="pledge">Pledge Now</a></li>
                    <li><a href="plans">Plans &amp; Calculators</a></li>
                    <li><a href="donors">Donor List</a></li>
                    <li><a href="updates">Updates from the Meadow</a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>

            <div class-"content">
                @yield('content') 
            </div>

        </div>
        <div class="footer">
            <hr>
            <!-- Footer -->
            <address class="text-center small">
                The Circle School &nbsp;|&nbsp; 210 Oakleigh Avenue, Harrisburg, PA 17111<br>
                717-564-6700 &nbsp;|&nbsp; <a href="mailto:hello@circleschool.org">hello@circleschool.org</a> &nbsp;|&nbsp; <a href="http://circleschool.org/">http://circleschool.org</a>
            </address>
            <p class="small">
                <a href="login">Admin login</a>
            </p>
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    @yield('body')
  </body>
</html>