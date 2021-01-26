<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>TaskManager App</title>
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery-3.0.0.js')}}"></script>
        
        <!-- <link rel="shortcut icon" href="{{asset('images/ico/favicon.ico')}}"> -->
        
    </head><!--/head-->
    <body>
        @section('menu')

        <div class="mainmenu1 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-pills nav-justified">  

                <li role="presentation"
                    {{$page == 'User list' ? 'class=active' : 'class=mx-3'}}>
                    <a href="{{url('user')}}">
                    User list</a>
                </li>
                
                <li role="presentation"                     
                    {{$page == 'Task list' ? 'class=active' : 'class=mx-3'}}>
                            <a href="{{url('task')}}">
                            Task list</a>
                </li>
                
             </ul>
        </div>

        @show

        <div class="container col-sm-12 col-md-12 col-lg-12">
            @yield('content')
        </div>

        <script src="{{asset('js/app.js')}}"></script>
    </body>
