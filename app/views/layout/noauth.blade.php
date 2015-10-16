<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title>@yield('title')  | Lands</title>


        <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="../../assets/images/favicon.ico">

        <!-- Stylesheets -->
        {{ HTML::style('assets/css/bootstrap.min.css'); }} 

        {{ HTML::style('assets/css/bootstrap-extend.min.css'); }} 

        {{ HTML::style('assets/css/site.min.css'); }} 

        {{ HTML::style('assets/css/assets/vendor/animsition/animsition.css'); }} 

        {{ HTML::style('assets/vendor/asscrollable/asScrollable.css'); }} 

        {{ HTML::style('assets/vendor/switchery/switchery.css'); }} 

        {{ HTML::style('assets/vendor/intro-js/introjs.css'); }} 

        {{ HTML::style('assets/vendor/slidepanel/slidePanel.css'); }} 

        {{ HTML::style('assets/vendor/flag-icon-css/flag-icon.css'); }} 






        {{ HTML::style('assets/css/pages/login.css'); }} 

        {{ HTML::style('assets/fonts/web-icons/web-icons.min.css'); }} 

        {{ HTML::style('assets/fonts/brand-icons/brand-icons.min.css'); }}
        <!-- Page -->

        <!-- Fonts -->
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
    <body class="page-login layout-full">
        <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->


        <!-- Page -->
      @yield('content')
        <!-- End Page -->


        <!-- Core  -->
        {{ HTML::script('assets/vendor/jquery/jquery.js'); }}  
        {{ HTML::script('assets/vendor/bootstrap/bootstrap.js'); }}  
        {{ HTML::script('assets/vendor/animsition/jquery.animsition.js'); }}  
        {{ HTML::script('assets/vendor/asscroll/jquery-asScroll.js'); }}  

        {{ HTML::script('assets/vendor/mousewheel/jquery.mousewheel.js'); }}  
        {{ HTML::script('assets/vendor/asscrollable/jquery.asScrollable.all.js'); }}  

        {{ HTML::script('assets/vendor/ashoverscroll/jquery-asHoverScroll.js'); }}  


        <!-- Plugins -->
        {{ HTML::script('assets/vendor/jquery/jquery.js'); }}  
        {{ HTML::script('assets/vendor/bootstrap/bootstrap.js'); }}  
        {{ HTML::script('assets/vendor/animsition/jquery.animsition.js'); }}  
        {{ HTML::script('assets/vendor/asscroll/jquery-asScroll.js'); }}  

        {{ HTML::script('assets/vendor/mousewheel/jquery.mousewheel.js'); }}  
        {{ HTML::script('assets/vendor/asscrollable/jquery.asScrollable.all.js'); }}  

        {{ HTML::script('assets/vendor/ashoverscroll/jquery-asHoverScroll.js'); }}  


        {{ HTML::script('assets/vendor/switchery/switchery.min.js'); }}
        {{ HTML::script('assets/vendor/intro-js/intro.js'); }}
        {{ HTML::script('assets/vendor/screenfull/screenfull.js'); }}
        {{ HTML::script('assets/vendor/slidepanel/jquery-slidePanel.js'); }}

        {{ HTML::script('assets/vendor/jquery-placeholder/jquery.placeholder.js'); }}

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
        {{ HTML::script('assets/js/components/jquery-placeholder.js'); }}

        <script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;
                $(document).ready(function () {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>

    </body>

</html>