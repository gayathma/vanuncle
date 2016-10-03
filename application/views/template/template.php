<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="keywords" content="" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>fe_resources/images/fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>fe_resources/images/fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>fe_resources/images/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>fe_resources/images/fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>fe_resources/images/fav/favicon-16x16.png">
        <link rel="manifest" href="<?php echo base_url(); ?>fe_resources/images/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>fe_resources/images/fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>VanUncle.lk</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/styler.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/theme-pink.css" id="template-color" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/icons.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/animate.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/sweetalert.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/dropzone.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/select2.min.css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>fe_resources/images/favicon.ico" />


        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.datetimepicker.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/sweetalert-dev.js"></script>

        <script src="<?php echo base_url(); ?>fe_resources/js/dropzone.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyBTopYuLNQfMccXBucNQVoLQmND-StZpYM&sensor=false&libraries=places"></script>

        <script>
            var base_url = "<?php echo base_url(); ?>";
            var site_url = "<?php echo site_url(); ?>";

        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="home" >
        <!-- Preloader -->
        <div class="preloader">
            <div id="followingBallsG">
                <div id="followingBallsG_1" class="followingBallsG"></div>
                <div id="followingBallsG_2" class="followingBallsG"></div>
                <div id="followingBallsG_3" class="followingBallsG"></div>
                <div id="followingBallsG_4" class="followingBallsG"></div>
            </div>
        </div>
        <!-- //Preloader -->

        <!-- Header -->
        <header class="header" role="banner">
            <div class="wrap">
                <!-- Logo -->
                <div class="logo">
                    <a href="<?php echo site_url(); ?>" title="Vanuncle"><img src="<?php echo base_url(); ?>fe_resources/images/logo.png" alt="Vanuncle" /></a>
                </div>
                <!-- //Logo -->

                <!-- Main Nav -->
                <nav role="navigation" class="main-nav">
                    <ul>
                        <li class="active"><a href="<?php echo site_url(); ?>" title="">Home</a></li>
                        <li><a href="<?php echo site_url(); ?>/about_us" title="About Us">About Us</a></li>
                        <li><a href="<?php echo site_url(); ?>/contact" title="Contact">Contact</a></li>
                        <?php if (!$this->session->userdata('USER_LOGGED_IN')) { ?>
                            <li><a href="<?php echo site_url(); ?>/sign_up">Driver Registration</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo site_url(); ?>/account" ><?php echo ucfirst($this->session->userdata('USER_FULLNAME')); ?>'S Account</a></li>
                            <li><a href="<?php echo site_url(); ?>/login/logout" >Sign Out</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- //Main Nav -->

            </div>
        </header>
        <!-- //Header -->

        <!-- Main -->
        <main class="main" role="main">
            <?php echo $content; ?>
        </main>
        <!-- //Main -->

        <!-- Footer -->
        <footer class="footer black" role="contentinfo">
            <div class="wrap">
                <div class="row">
                    <!-- Column -->
                    <article class="one-half">
                        <h6>About us</h6>
                        <p><strong>VanUncle.lk</strong> facilitate you by actively providing information that matches all your transport related queries. We are equipped with a wide database of school and office transport service providers, etc. Our site provides the platform to connect transport service seekers with transport service providers and vice versa. All transport providers can submit their details in our website and you can select the best transporter according to your requirement.</p>
                    </article>
                    <!-- //Column -->

                    <!-- Column -->
                    <article class="one-fourth">
                        <h6>Need help?</h6>
                        <p>Contact us via phone or email:</p>
                        <p class="contact-data"><span class="ico phone"></span> +94 714 550 979</p>
                        <p class="contact-data"><span class="ico phone"></span> +94 773 050 979</p>
                        <p class="contact-data"><span class="ico phone"></span> +94 765 450 979</p>


                        <p class="contact-data"><span class="ico email"></span> <a href="mailto:info@vanuncle.lk">info@vanuncle.lk</a></p>
                    </article>
                    <!-- //Column -->

                    <!-- Column -->
                    <article class="one-fourth">
                        <h6>Follow us</h6>
                        <ul class="social">
                            <li class="facebook"><a target="_blank" href="https://www.facebook.com/VanUnclelk-224285404607649/?ref=page_internal" title="facebook">facebook</a></li>
                            <li class="twitter"><a href="#" title="twitter">twitter</a></li>
                            <li class="gplus"><a href="#" title="gplus">google plus</a></li>
                        </ul>
                        <ul class="app-stores">
                            <li ><a href="#" title="gplus"><img src="<?php echo base_url(); ?>fe_resources/images/uploads/store1.png" alt="app store" /></li>
                            <li ><a href="#" title="gplus"><img src="<?php echo base_url(); ?>fe_resources/images/uploads/store2.png" alt="play store" /></li>
                            <li><iframe src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2FVanUnclelk-224285404607649&width=450&height=80&layout=standard&size=small&show_faces=true&appId" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></li>
                        </ul>
                    </article>
                    <!-- //Column -->
                </div>

                <div class="copy">
                    <p>Copyright 2016, VanUncle.lk. All rights reserved. </p>

                    <nav role="navigation" class="foot-nav">
                        <ul>
                            <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                            <li><a href="<?php echo site_url(); ?>/about_us" title="About us">About Us</a></li>
                            <li><a href="<?php echo site_url(); ?>/contact" title="Contact us">Contact Us</a></li>
                            <li><a href="<?php echo site_url(); ?>/terms" title="Terms of use">Terms of use</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
        <!-- //Footer -->


        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.slicknav.min.js"></script>

        <script src="<?php echo base_url(); ?>fe_resources/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/search.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/styler.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/select2.js"></script>

        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.vide.js"></script>


        <script type="text/javascript">
            function initialize() {
                var input = document.getElementById('pick_up_loc');
                var options = {componentRestrictions: {country: 'sl'}};

                new google.maps.places.Autocomplete(input, options);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>

    </body>

</html>
