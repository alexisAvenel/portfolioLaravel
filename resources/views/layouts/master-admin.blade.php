<html lang="fr">
    <head>
        <title>Administration</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="http://fonts.googleapis.com/icon?family=Roboto" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/materialize.css'); ?>"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/app.css'); ?>"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body cz-shortcut-listen="true">
        <header>
            <div class="container">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only">
                    <i class="mdi-navigation-menu"></i>
                </a>
            </div>
            <ul id="nav-mobile" class="side-nav fixed" style="width: 240px;">
                <li class="logo">
                    <a id="logo-container" href="http://materializecss.com/" class="brand-logo">
                        Alexis-A
                    </a>
                </li>
                <li class="search">
                    <div class="search-wrapper card">
                        <input id="search"><i class="material-icons">search</i>
                        <div class="search-results"></div>
                    </div>
                </li>
                <li class="bold"><a href="about.html" class="waves-effect waves-teal">À propos</a></li>
                <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Commencer</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header  waves-effect waves-teal">CSS</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="color.html">Couleur</a></li>
                                    <li><a href="grid.html">Grid</a></li>
                                    <li><a href="helpers.html">Helpers</a></li>
                                    <li><a href="media-css.html">Media</a></li>
                                    <li><a href="sass.html">Sass</a></li>
                                    <li><a href="shadow.html">Shadow</a></li>
                                    <li><a href="table.html">Table</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-teal">Components</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="badges.html">Badges</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                                    <li><a href="cards.html">Cards</a></li>
                                    <li><a href="chips.html">Chips</a></li>
                                    <li><a href="collections.html">Collections</a></li>
                                    <li><a href="footer.html">Footer</a></li>
                                    <li><a href="forms.html">Forms</a></li>
                                    <li><a href="icons.html">Icons</a></li>
                                    <li><a href="navbar.html">Navbar</a></li>
                                    <li><a href="pagination.html">Pagination</a></li>
                                    <li><a href="preloader.html">Preloader</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-teal">JavaScript</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="collapsible.html">Collapsible</a></li>
                                    <li><a href="dialogs.html">Dialogs</a></li>
                                    <li><a href="dropdown.html">Dropdown</a></li>
                                    <li><a href="media.html">Media</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="parallax.html">Parallax</a></li>
                                    <li><a href="pushpin.html">Pushpin</a></li>
                                    <li><a href="scrollfire.html">ScrollFire</a></li>
                                    <li><a href="scrollspy.html">Scrollspy</a></li>
                                    <li><a href="side-nav.html">SideNav</a></li>
                                    <li><a href="tabs.html">Tabs</a></li>
                                    <li><a href="transitions.html">Transitions</a></li>
                                    <li><a href="waves.html">Waves</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Mobile</a></li>
                <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
            </ul>
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="page-footer">

        </footer>
        <!--  Scripts-->
        <script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/materialize.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>
    </body>
</html>