<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="keywords" content="" />
        <meta name="description" content="">
        <meta name="author" content="">

        <title>VanUncle.lk</title>

        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/styler.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/theme-pink.css" id="template-color" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/icons.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/animate.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>fe_resources/css/sweetalert.css" />
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>fe_resources/images/favicon.ico" />


        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.datetimepicker.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/sweetalert-dev.js"></script>
        
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
                            <li><a href="<?php echo site_url(); ?>/sign_up">Sign Up</a></li>
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
                    </article>
                    <!-- //Column -->
                </div>

                <div class="copy">
                    <p>Copyright 2016, VanUncle.lk. All rights reserved. </p>

                    <nav role="navigation" class="foot-nav">
                        <ul>
                            <li><a href="#" title="Home">Home</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="About us">About Us</a></li>
                            <li><a href="#" title="Contact us">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
        <!-- //Footer -->


        <script src="<?php echo base_url(); ?>fe_resources/js/jquery.slicknav.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/infobox.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/search.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>fe_resources/js/styler.js"></script>

    </body>

</html>