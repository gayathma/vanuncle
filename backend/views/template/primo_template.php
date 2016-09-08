<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Vanuncle</title>

        <!-- favicon -->
        <link rel="shortcut icon" type="image/ico"
              href="<?php echo base_url(); ?>backend_resources/images/favicon.ico" />

        <!-- reset css -->
        <link href="<?php echo base_url(); ?>backend_resources/css/reset.css"
              rel="stylesheet" type="text/css" media="all" />

        <!-- main stylesheet -->
        <link
            href="<?php echo base_url(); ?>backend_resources/css/stylesheet.css"
            rel="stylesheet" type="text/css" media="all" />

        <!-- this stylesheet uses CSS3 properties (rounded corners). Remove it if you want a valid CSS -->
        <link href="<?php echo base_url(); ?>backend_resources/css/css3.css"
              rel="stylesheet" type="text/css" media="all" />

        <!-- internet explorer fixes css -->
        <!--[if lte IE 6]>
                <link href="<?php echo base_url(); ?>backend_resources/css/ie.css" rel="stylesheet" type="text/css" media="screen" />
            <![endif]-->

        <!-- jquery library -->
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/jquery-1.4.2.min.js"></script>

        <!-- jquery tabs plugin -->
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/jquery.idTabs.min.js"></script>

        <!-- jquery configuration -->
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/global.js"></script>



        <script src="<?php echo base_url(); ?>jquery-1.1.3.1.pack.js"
        type="text/javascript"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/editor/ckeditor/ckeditor.js"></script>
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/editor/ckfinder/ckfinder.js"></script>

        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/ajaxupload.3.5.js"></script>




        <script type="text/javascript">

            var site_url = '<?php echo site_url(); ?>';
            var base_url = '<?php echo base_url(); ?>';


        </script>

        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/custom_js/js-functions.js"></script>








    </head>

    <body>

        <div id="head">
            <!-- logo -->
            <h1 id="logo">
                <a href="main.html">Logo</a>
            </h1>

            <!-- top menu -->
            <ul id="navigation">

                <li><a  href="<?php echo site_url(); ?>/login_controller/logout/" style="float: right;cursor: pointer;" >Logout</a></li>
            </ul> 
        </div>

        <!-- start: side column -->
        <div id="side">
            <div id="welcome-block">
                <span>Welcome <a href="#"><?php echo $this->session->userdata('user_name'); ?></a>, <!-- <a href="#">Logout</a> --></span>
            </div>

            <!-- sub menus -->
            <div id="sub-menu">
                <h3 id="manage_pages">
                    <a href="#">Manage Pages</a>
                </h3>
                <ul>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'ABOUTUS') {
                        echo "class='current'";
                    }
                    ?> ><a	href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/ABOUTUS">About Us</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'DESTINATIONS') {
                        echo "class='current'";
                    }
                    ?>><a href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/DESTINATIONS">Destinations</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'RIGHTSIDESNIPPET') {
                        echo "class='current'";
                    }
                    ?>><a href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/RIGHTSIDESNIPPET">Rightside Snippet</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'WELCOMEHOMEPAGE') {
                        echo "class='current'";
                    }
                    ?>><a href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/WELCOMEHOMEPAGE">Welcomer Message Home Page</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'WELCOMEINNERPAGE') {
                        echo "class='current'";
                    }
                    ?>><a href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/WELCOMEINNERPAGE">Welcomer Message Read Mor</a></li>

                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'ABOUTUS') {
                        echo "class='current'";
                    }
                    ?> ><a	href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/CAREERS">Careers content</a></li>


                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'FOOTERROGHT') {
                        echo "class='current'";
                    }
                    ?>><a href="<?php echo site_url() ?>/content_controller/loadStaticContentbyhcode/FOOTERROGHT">Footer Right</a></li>

                </ul>

                <h3 id="sliders">
                    <a href="#">Sliders</a>
                </h3>
                <ul>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'manage_featured_attractions') {
                        echo "class='current'";
                    }
                    ?> ><a	href="<?php echo site_url() ?>/slider_controller/manage_featured_attractions">Manage Featured Attractions</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'manage_main_slider') {
                        echo "class='current'";
                    }
                    ?> ><a	href="<?php echo site_url() ?>/slider_controller/manage_main_slider">Manage Main Slider</a></li>
                    <li <?php
                    if (basename($_SERVER["PHP_SELF"]) == 'manage_main_slider') {
                        echo "class='current'";
                    }
                    ?> ><a	href="<?php echo site_url() ?>/slider_controller/manage_airways_slider">Manage Airways Slider</a></li>


                </ul>

                <!--			<h3>
                                                <a href="#">Administration</a>
                                        </h3>
                                        <ul>
                                                <li><a href="#">Manage Users</a></li>
                                                <li><a href="#">Change Password</a></li>
                        
                                        </ul>-->
            </div>



            <!-- end: side column -->
        </div>

        <!-- start: content -->
        <div id="content">
            <!-- page corner -->
            <div class="corner"></div>

            <h1><?php echo $main_menu_title; ?></h1>
            <!-- 	<p class="bigger">We have <strong>5</strong> Pages and <strong>24</strong> Articles with <strong>25</strong> Comments.</p> -->

            <!-- 	<div class="notice canhide">You have 7 new messages</div>
    <div class="info canhide">Welcome to Primo!</div>
    <div class="success canhide">Installation complete!</div>
    <div class="warning">Install folder is still there! Hurry up, delete it!</div> -->

            <div class="divider"></div>

            <!-- start : Dynemically loading the views -->			
            <?php echo $content; ?>
            <!-- end : Dynemically loading the views -->


            <div id="footer">
                <span>Vanuncle &copy; 2014 (Build 1.0) - <a href="#head">top</a></span>
            </div>

            <!-- end: content -->
        </div>

    </body>

</html>