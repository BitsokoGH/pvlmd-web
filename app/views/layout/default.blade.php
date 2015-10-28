<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')  | Land Commission</title>

        {{ HTML::style('assets/css/bootstrap.min.css'); }} 
        <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- Stylesheets -->
        {{ HTML::style('assets/css/bootstrap.min'); }}
        {{ HTML::style('assets/css/bootstrap-extend.min'); }}
        {{ HTML::style('assets/css/site.min'); }}

        {{ HTML::style('assets/vendor/animsition/animsition'); }}
        {{ HTML::style('assets/vendor/asscrollable/asScrollable'); }}
        {{ HTML::style('assets/vendor/switchery/switchery'); }}
        {{ HTML::style('assets/vendor/intro-js/introjs'); }}
        {{ HTML::style('assets/vendor/slidepanel/slidePanel'); }}
        {{ HTML::style('assets/vendor/flag-icon-css/flag-icon'); }}


        <!-- Fonts -->
        {{ HTML::style('assets/fonts/web-icons/web-icons.min'); }}
        {{ HTML::style('assets/fonts/brand-icons/brand-icons.min'); }}
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


        <!--[if lt IE 9]>
          {{ HTML::script('assets/vendor/html5shiv/html5shiv.min.js'); }}
          <![endif]-->

        <!--[if lt IE 10]>
          {{ HTML::script('assets/vendor/media-match/media.match.min.js'); }}
          {{ HTML::script('assets/vendor/respond/respond.min.js'); }}
          <![endif]-->

        <!-- Scripts -->
        {{ HTML::script('assets/vendor/modernizr/modernizr.js'); }}
        {{ HTML::script('assets/vendor/breakpoints/breakpoints.js'); }}
        <script>
            Breakpoints();
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                        data-toggle="menubar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                        data-toggle="collapse">
                    <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>

                <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                    <img class="navbar-brand-logo" src="../../assets/images/logo.png" title="Remark">
                    <span class="navbar-brand-text"> Lands Commission</span>
                </div>
            </div>

            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
                        <li class="hidden-float" id="toggleMenubar">
                            <a data-toggle="menubar" href="#" role="button">
                                <i class="icon hamburger hamburger-arrow-left">
                                    <span class="sr-only">Toggle menubar</span>
                                    <span class="hamburger-bar"></span>
                                </i>
                            </a>
                        </li>



                    </ul>
                    <!-- End Navbar Toolbar -->

                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

                        <li class="dropdown">
                            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                               data-animation="slide-bottom" role="button">
                                <span class="avatar avatar-online">
                                    <img src="../../assets/portraits/5.jpg" alt="...">
                                    <i></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation">
                                    <a href="{{URL::to('profile')}}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i>{{$user->firstname}} {{$user->lastname}}  Profile</a>
                                </li>
                                <li role="presentation">
                                    <a href="{{URL::to('profile/payment')}}" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Payments</a>
                                </li>

                                <li class="divider" role="presentation"></li>
                                <li role="presentation">
                                    <a href="{{URL::to('logout')}}" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"
                               data-animation="slide-bottom" role="button">
                                <i class="icon wb-bell" aria-hidden="true"></i>
                                <span class="badge badge-danger up">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                                <li class="dropdown-menu-header" role="presentation">
                                    <h5>NOTIFICATIONS</h5>
                                    <span class="label label-round label-danger">New 5</span>
                                </li>

                                <li class="list-group" role="presentation">
                                    <div data-role="container">
                                        <div data-role="content">
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon wb-order bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">A new order has been placed</h6>
                                                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">5 hours ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon wb-user bg-green-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Completed the task</h6>
                                                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon wb-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Settings updated</h6>
                                                        <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon wb-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Event started</h6>
                                                        <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                                <div class="media">
                                                    <div class="media-left padding-right-10">
                                                        <i class="icon wb-chat bg-orange-600 white icon-circle" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Message received</h6>
                                                        <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-menu-footer" role="presentation">
                                    <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                        <i class="icon wb-settings" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" role="menuitem">
                                        All notifications
                                    </a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->

                <!-- Site Navbar Seach -->
                <div class="collapse navbar-search-overlap" id="site-navbar-search">
                    <form role="search">
                        <div class="form-group">
                            <div class="input-search">
                                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                        data-toggle="collapse" aria-label="Close"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Site Navbar Seach -->
            </div>
        </nav>
        <div class="site-menubar">
            <div class="site-menubar-body">
                <div>
                    <div>
                        <ul class="site-menu">
                            <!-- Navigation Starts Here-->
                            <li class="site-menu-item has-sub">
                                <a href="../../html/dashboard/dashboard.html" data-slug="dashbaord">
                                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                    <span class="site-menu-title">Dashboard</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="../../html/billpayment/billpay.html" data-slug="billpayment">
                                    <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                                    <span class="site-menu-title">Bill Payment</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="../../html/property-search/search.html" data-slug="propertysearch">
                                    <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                                    <span class="site-menu-title">Property Search</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>

                        </ul>


                    </div>
                </div>
            </div>


        </div>



        <!-- Page -->
        <div class="page">
            <div class="page-content">
                @yield('content') 
            </div>
        </div>
        <!-- End Page -->



        <!-- Footer -->
        <footer class="site-footer">
            <span class="site-footer-legal">© {{date('Y') }} Bitsoko</span>
            <div class="site-footer-right">

            </div>
        </footer>

        <!-- Core  -->
        {{ HTML::script('assets/vendor/jquery/jquery.js'); }}
        {{ HTML::script('assets/vendor/bootstrap/bootstrap.js'); }}
        {{ HTML::script('assets/vendor/animsition/jquery.animsition.js'); }}
        {{ HTML::script('assets/vendor/asscroll/jquery-asScroll.js'); }}
        {{ HTML::script('assets/vendor/mousewheel/jquery.mousewheel.js'); }}
        {{ HTML::script('assets/vendor/asscrollable/jquery.asScrollable.all.js'); }}
        {{ HTML::script('assets/vendor/ashoverscroll/jquery-asHoverScroll.js'); }}


        <!-- Plugins -->
        {{ HTML::script('assets/vendor/switchery/switchery.min.js'); }}
        {{ HTML::script('assets/vendor/intro-js/intro.js'); }}
        {{ HTML::script('assets/vendor/screenfull/screenfull.js'); }}
        {{ HTML::script('assets/vendor/slidepanel/jquery-slidePanel.js'); }}



        <!-- Scripts -->
        {{ HTML::script('assets/js/core.js'); }}
        {{ HTML::script('assets/js/site.js'); }}

        {{ HTML::script('assets/js/sections/menu.js'); }}
        {{ HTML::script('assets/js/sections/menubar.js'); }}
        {{ HTML::script('assets/js/sections/sidebar.js'); }}

        {{ HTML::script('assets/js/configs/config-colors.js'); }}
        {{ HTML::script('assets/js/configs/config-tour.js'); }}

        {{ HTML::script('assets/js/components/asscrollable.js'); }}
        {{ HTML::script('assets/js/components/animsition.js'); }}
        {{ HTML::script('assets/js/components/slidepanel.js'); }}
        {{ HTML::script('assets/js/components/switchery.js'); }}




    </body>

</html>