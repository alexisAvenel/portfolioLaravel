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
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="<?php echo asset('images/avatars/'.$user['avatar']); ?>" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">
                                <?php echo $user['name']; ?><i class="mdi-navigation-arrow-drop-down right"></i>
                            </a>
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li>
                                    <a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                </li>
                                <li>
                                    <a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            <p class="user-roal">Administrator</p>
                        </div>
                    </div>
                </li>
                <li class="search">
                    <div class="search-wrapper card">
                        <input id="search"><i class="material-icons">search</i>
                        <div class="search-results"></div>
                    </div>
                </li>
                <li class="bold"><a href="about.html" class="waves-effect waves-orange">À propos</a></li>
                <li class="bold"><a href="getting-started.html" class="waves-effect waves-orange">Commencer</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-orange">CSS</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="color.html">Couleur</a></li>
                                    <li><a href="grid.html">Grid</a></li>
                                    <li><a href="helpers.html">Helpers</a></li>
                                    <li><a href="media-css.html">Media</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-orange">Components</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="badges.html">Badges</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                                    <li><a href="cards.html">Cards</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-orange">JavaScript</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="collapsible.html">Collapsible</a></li>
                                    <li><a href="dialogs.html">Dialogs</a></li>
                                    <li><a href="dropdown.html">Dropdown</a></li>
                                    <li><a href="media.html">Media</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-orange">Mobile</a></li>
                <li class="bold"><a href="showcase.html" class="waves-effect waves-orange">Showcase</a></li>
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