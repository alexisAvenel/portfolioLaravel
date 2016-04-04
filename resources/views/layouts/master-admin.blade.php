<?php if(Auth::check()): $user = Auth::user()['attributes']; endif; ?>
<!DOCTYPE html>
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
                                    <a href="/auth/logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            <p class="user-roal chip white black-text">Administrator</p>
                        </div>
                    </div>
                </li>
                <li class="search">
                    <div class="search-wrapper card">
                        <input id="search"><i class="material-icons">search</i>
                        <div class="search-results"></div>
                    </div>
                </li>
                <li class="bold {!! classActiveSegment(2, '') !!}"><a href="/admin" class="waves-effect waves-orange">Dashboard</a></li>
                <li class="bold {!! classActiveSegment(2, 'news') !!}"><a href="/admin/news" class="waves-effect waves-orange">News</a></li>
                <li class="bold {!! classActiveSegment(2, 'contacts') !!}"><a href="/admin/contacts" class="waves-effect waves-orange">Messages</a></li>
                <li class="bold {!! classActiveSegment(2, 'settings') !!}"><a href="/admin/settings" class="waves-effect waves-orange">Paramètres</a></li>
            </ul>
        </header>
        <main>
            @yield('content')
        </main>

        <!--  Scripts-->
        <script type="text/javascript" src="<?php echo asset('js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/materialize.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/init.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/admin.custom.js'); ?>"></script>
    </body>
</html>