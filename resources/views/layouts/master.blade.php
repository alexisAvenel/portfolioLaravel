<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>App Name - @yield('title')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900|Fira+Sans:400,400italic" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/materialize.css'); ?>" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/progress-bar/component.css'); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/progress-bar/custom-bars.css'); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/timeline.css'); ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/app.css'); ?>"/>

    <script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('https://www.google.com/recaptcha/api.js'); ?>"></script>
</head>
<body>
    <nav id="navigation" class="z-depth-0" role="navigation">
        <div class="nav-wrapper container">
            <a href="/" id="logo-container" class="brand-logo" title="Alexis Avenel"><img src="<?php echo asset('images/logo-dark.png'); ?>" class="responsive-img"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo url('news'); ?>">News</a></li>
                <li><a href="<?php echo url('contact'); ?>">Contact</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="<?php echo url('news'); ?>">News</a></li>
                <li><a href="<?php echo url('contact'); ?>">Contact</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <main>
        @yield('home-banner')

        @yield('content')

        <footer class="page-footer grey darken-4">
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
                            <li><a href="#!" class="twitter icons" title="Twitter Alexis Avenel" target="_blank"></a></li>
                            <li><a href="#!" class="linkedin icons" title="Linkedin Alexis Avenel" target="_blank"></a></li>
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
    </main>
    <!--Scripts-->
    <script type="text/javascript" src="<?php echo asset('js/jquery.mobile.custom.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/materialize.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/timeline.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('js/public.custom.js'); ?>"></script>
    </body>
</html>