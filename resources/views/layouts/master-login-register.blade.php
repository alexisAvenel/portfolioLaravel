<!DOCTYPE html>
<html>
    <head>
        <title>Identifiez-vous !</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/materialize.css'); ?>"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/app.css'); ?>"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="amber lighten-1">

        <div class="container">
            <div id="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/materialize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>
    </body>
</html>