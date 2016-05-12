<!DOCTYPE html>
<html>

    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <meta name="description" content="">
            <meta name="author" content="">

            <title>@yield('title')</title>

            <!-- Bootstrap core CSS -->
            <link href="/css/app.css" rel="stylesheet">

            <!-- Website CSS -->
            <link href="/css/style.css" rel="stylesheet">

            <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
            <script src="/js/bootstrap.min.js"></script>

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
            @section('header')
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Mr. Men Book Shop</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                                <li><a href="/books"><span class="glyphicon glyphicon-book"></span> Books</a></li>
                            </ul>
                        </div>
                </div>
            </nav>
            @show

            @yield('content')
    </body>
</html>
