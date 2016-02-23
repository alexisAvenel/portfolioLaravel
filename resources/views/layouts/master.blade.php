<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>App Name - @yield('title')</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/materialize.css'); ?>" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" media="screen,projection"/>
</head>
<body>
    <nav class="amber" role="navigation">
        <div class="nav-wrapper container">
            <a href="#" id="logo-container" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo url('news'); ?>">News</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="<?php echo url('news'); ?>">News</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    @yield('home-banner')

    <main class="container">
        <div class="section">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="page-footer teal">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </footer>

    <!--    Scripts-->
    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/materialize.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>

    </body>
</html>