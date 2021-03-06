<!DOCTYPE html>
<?php $user = Auth::user(); ?>
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
        {{ HTML::style('assets/css/bootstrap.min.css'); }}
        {{ HTML::style('assets/css/bootstrap-extend.min.css'); }}
        {{ HTML::style('assets/css/site.min.css'); }}

        {{ HTML::style('assets/vendor/animsition/animsition.css'); }}
        {{ HTML::style('assets/vendor/asscrollable/asScrollable.css'); }}
        {{ HTML::style('assets/vendor/switchery/switchery.css'); }}
        {{ HTML::style('assets/vendor/intro-js/introjs.css'); }}
        {{ HTML::style('assets/vendor/slidepanel/slidePanel.css'); }}
        {{ HTML::style('assets/vendor/flag-icon-css/flag-icon.css'); }}


        <!-- Fonts -->
        {{ HTML::style('assets/fonts/web-icons/web-icons.min.css'); }}
        {{ HTML::style('assets/fonts/brand-icons/brand-icons.min.css'); }}
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
                    <img class="navbar-brand-logo" src="{{asset('assets/images/logo.png')}}" title="Remark">
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
                                    <img src="{{asset('assets/portraits/5.jpg')}}" alt="...">
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
                        @if(Auth::user()->role =='public')
                        <ul class="site-menu">
                            <!-- Navigation Starts Here-->
                            <li class="site-menu-item ">
                                <a href="{{URL::to('')}}" data-slug="dashbaord">
                                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                    <span class="site-menu-title">Dashboard</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item ">
                                <a href="{{URL::to('billpayment')}}" data-slug="billpayment">
                                    <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                                    <span class="site-menu-title">Bill Payment</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item ">
                                <a href="{{URL::to('propertysearch')}}" data-slug="propertysearch">
                                    <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                                    <span class="site-menu-title">Property Search</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>

                        </ul>
                        @endif

                         @if(Auth::user()->role =='admin')
                        <ul class="site-menu">
                            <!-- Navigation Starts Here-->
                            <li class="site-menu-item ">
                                <a href="{{URL::to('dashboard')}}" data-slug="dashbaord">
                                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                    <span class="site-menu-title">Dashboard</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item ">
                                <a href="{{URL::to('bill')}}" data-slug="billpayment">
                                    <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                                    <span class="site-menu-title">Bills</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>
                            <li class="site-menu-item ">
                                <a href="{{URL::to('property')}}" data-slug="properties">
                                    <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                                    <span class="site-menu-title">Properties</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li
                            li class="site-menu-item ">
                                <a href="{{URL::to('admin')}}" data-slug="properties">
                                    <i class="site-menu-icon wb-search" aria-hidden="true"></i>
                                    <span class="site-menu-title">Users</span>
                                    <span class="site-menu-arrow"></span>
                                </a>

                            </li>

                        </ul>
                        @endif

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
            <span class="site-footer-legal">© {{date('Y') }} Bitsoko GH</span>
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



        <script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;

                $(document).ready(function ($) {
                    Site.run();
                });


            })(document, window, jQuery);
        </script>

        @yield('script')
    </body>

</html>