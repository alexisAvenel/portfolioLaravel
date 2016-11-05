<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Portfolio Alexis Avenel</title>
    <link rel="icon" href="<?php echo asset('favicon.ico') ?>" />
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
    <div class="home fixed-action-btn">
        <a href="https://drive.google.com/open?id=0B2d3tNOgLN7tMUtOcWFNanh2c1U" class="btn-floating btn-large amber tooltipped" data-position="left" data-tooltip="Télécharger le CV" target="_blank">
            <i class="large material-icons hide-on-small-only">play_for_work</i>
            <i class="hide-on-med-and-up cv" title="Télécharger le CV" alt="CV"></i>
        </a>
    </div>
    <nav id="navigation" class="z-depth-0" role="navigation">
        <div class="nav-wrapper container">
            <a href="/" id="logo-container" class="brand-logo" title="Alexis Avenel"><img src="<?php echo asset('images/logo-dark.png'); ?>" class="responsive-img"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?php echo url('contact'); ?>">Me contacter</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="<?php echo url('contact'); ?>">Me contacter</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <main>

        @yield('content')

        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l7 s12">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="white-text">Ma Bio</h5>
                            </div>
                            <div class="col l3 s4">
                                <figure class="avatar">
                                    <img src="<?php echo asset('images/avatar1.jpg'); ?>" alt="Avatar Alexis Avenel">
                                </figure>
                            </div>
                            <div class="col l9 s8">
                                <p class="grey-text text-lighten-4">
                                    Salut ! Je suis Alexis Avenel, Développeur Front-end & Back-end.
                                    Je travaille actuellement chez <a href="http://www.webetsolutions.com/" target="_blank">Web & Solutions</a>,
                                    et mes missions sont définis par de l'intégration web, du développement PHP (Frameworks & CMS), du développement JavaScript (Frameworks & Natif), de la maintenance et de la veille techno hebdomadaire.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l2 s6">
                        <h5 class="white-text center">Liens</h5>
                        <ul class="friend-links center">
                            <li>
                                <a href="http://quivivraverhaeghe.fr/" class="tooltipped" data-position="top" data-tooltip="Développeur Web et Mobile (Front & Back)">Julien Verhaeghe</a>
                            </li>
                            <li>
                                <a href="https://www.neilappleton.com/" class="tooltipped" data-position="right" data-tooltip="Développeur/Intégrateur Front">Neil Appleton</a>
                            </li>
                            <li>
                                <a href="https://www.hopwork.fr/profile/romainrichard" class="tooltipped" data-position="bottom" data-tooltip="Développeur Back / CP Junior">Romain Richard</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col l3 s6">
                        <h5 class="white-text">Restons Connectés</h5>
                        <ul class="social-links">
                            <li>
                                <a href="https://twitter.com/chouk1991" class="twitter icons" title="Twitter Alexis Avenel" target="_blank"></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/in/alexisavenel" class="linkedin icons" title="Linkedin Alexis Avenel" target="_blank"></a>
                            </li>
                            <li>
                                <a href="https://github.com/alexisAvenel" class="github icons" title="GitHub Alexis Avenel" target="_blank"></a>
                            </li>
                            <li>
                                <a href="/contact" class="mail icons" title="Contacter Alexis Avenel"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">Créé et Développé par <a class="brown-text text-lighten-3" href="<?= url('/') ?>">Alexis Avenel</a></div>
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