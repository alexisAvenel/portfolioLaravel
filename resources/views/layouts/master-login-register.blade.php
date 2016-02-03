<!DOCTYPE html>
<html>
    <head>
        <title>Identifiez-vous !</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/materialize.css'); ?>"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/app.css'); ?>"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body class="amber lighten-1">

        <div class="container">
            <div id="container">
                <div class="row">
                    <div id="admin-bloc-connection" class="col l3 m6 s9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo asset('js/materialize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>
    </body>
</html>