<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Armates">
        <meta name="keyword" content="VanUncle.lk">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>backend_resources/img/fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>backend_resources/img/fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>backend_resources/img/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>backend_resources/img/fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>backend_resources/img/fav/favicon-16x16.png">
        <link rel="manifest" href="<?php echo base_url(); ?>backend_resources/img/fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>backend_resources/img/fav/ms-icon-144x144.png">

        <title>VanUncle.lk</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>backend_resources/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>backend_resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend_resources/css/owl.carousel.css" type="text/css">

        <!--dynamic table-->
        <link href="<?php echo base_url(); ?>backend_resources/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>backend_resources/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend_resources/assets/data-tables/DT_bootstrap.css" />

        <!--right slidebar-->
        <link href="<?php echo base_url(); ?>backend_resources/css/slidebars.css" rel="stylesheet">

        <!--toastr-->
        <link href="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

        <!-- Custom styles for this template -->

        <link href="<?php echo base_url(); ?>backend_resources/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>backend_resources/assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery.validate.min.js"></script>




        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>backend_resources/js/html5shiv.js"></script>
          <script src="<?php echo base_url(); ?>backend_resources/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="<?php echo site_url(); ?>/dashboard" class="logo"></a>
                <!--logo end-->
                <!--                <div class="nav notify-row" id="top_menu">
                                      notification start 
                                    <ul class="nav top-menu">
                                         settings start 
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="fa fa-tasks"></i>
                                                <span class="badge bg-success">6</span>
                                            </a>
                                            <ul class="dropdown-menu extended tasks-bar">
                                                <div class="notify-arrow notify-arrow-green"></div>
                                                <li>
                                                    <p class="green">You have 6 pending tasks</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-info">
                                                            <div class="desc">Dashboard v1.3</div>
                                                            <div class="percent">40%</div>
                                                        </div>
                                                        <div class="progress progress-striped">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                <span class="sr-only">40% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-info">
                                                            <div class="desc">Database Update</div>
                                                            <div class="percent">60%</div>
                                                        </div>
                                                        <div class="progress progress-striped">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                <span class="sr-only">60% Complete (warning)</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-info">
                                                            <div class="desc">Iphone Development</div>
                                                            <div class="percent">87%</div>
                                                        </div>
                                                        <div class="progress progress-striped">
                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                                                <span class="sr-only">87% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-info">
                                                            <div class="desc">Mobile App</div>
                                                            <div class="percent">33%</div>
                                                        </div>
                                                        <div class="progress progress-striped">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                                                <span class="sr-only">33% Complete (danger)</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-info">
                                                            <div class="desc">Dashboard v1.3</div>
                                                            <div class="percent">45%</div>
                                                        </div>
                                                        <div class="progress progress-striped active">
                                                            <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                                <span class="sr-only">45% Complete</span>
                                                            </div>
                                                        </div>
                
                                                    </a>
                                                </li>
                                                <li class="external">
                                                    <a href="#">See All Tasks</a>
                                                </li>
                                            </ul>
                                        </li>
                                         settings end 
                                         inbox dropdown start
                                        <li id="header_inbox_bar" class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <i class="fa fa-envelope-o"></i>
                                                <span class="badge bg-important">5</span>
                                            </a>
                                            <ul class="dropdown-menu extended inbox">
                                                <div class="notify-arrow notify-arrow-red"></div>
                                                <li>
                                                    <p class="red">You have 5 new messages</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo"><img alt="avatar" src="<?php echo base_url(); ?>backend_resources/img/heshani.jpg"></span>
                                                        <span class="subject">
                                                            <span class="from">Jonathan Smith</span>
                                                            <span class="time">Just now</span>
                                                        </span>
                                                        <span class="message">
                                                            Hello, this is an example msg.
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo"><img alt="avatar" src="<?php echo base_url(); ?>backend_resources/img/avatar-mini2.jpg"></span>
                                                        <span class="subject">
                                                            <span class="from">Jhon Doe</span>
                                                            <span class="time">10 mins</span>
                                                        </span>
                                                        <span class="message">
                                                            Hi, Jhon Doe Bhai how are you ?
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo"><img alt="avatar" src="<?php echo base_url(); ?>backend_resources/img/avatar-mini3.jpg"></span>
                                                        <span class="subject">
                                                            <span class="from">Jason Stathum</span>
                                                            <span class="time">3 hrs</span>
                                                        </span>
                                                        <span class="message">
                                                            This is awesome dashboard.
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo"><img alt="avatar" src="<?php echo base_url(); ?>backend_resources/img/avatar-mini4.jpg"></span>
                                                        <span class="subject">
                                                            <span class="from">Jondi Rose</span>
                                                            <span class="time">Just now</span>
                                                        </span>
                                                        <span class="message">
                                                            Hello, this is metrolab
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">See all messages</a>
                                                </li>
                                            </ul>
                                        </li>
                                         inbox dropdown end 
                                         notification dropdown start
                                        <li id="header_notification_bar" class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                
                                                <i class="fa fa-bell-o"></i>
                                                <span class="badge bg-warning">7</span>
                                            </a>
                                            <ul class="dropdown-menu extended notification">
                                                <div class="notify-arrow notify-arrow-yellow"></div>
                                                <li>
                                                    <p class="yellow">You have 7 new notifications</p>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                        Server #3 overloaded.
                                                        <span class="small italic">34 mins</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                                        Server #10 not respoding.
                                                        <span class="small italic">1 Hours</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                                        Database overloaded 24%.
                                                        <span class="small italic">4 hrs</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="label label-success"><i class="fa fa-plus"></i></span>
                                                        New user registered.
                                                        <span class="small italic">Just now</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                                        Application error.
                                                        <span class="small italic">10 mins</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">See all notifications</a>
                                                </li>
                                            </ul>
                                        </li>
                                         notification dropdown end 
                                    </ul>
                                      notification end 
                                </div>-->
                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                   <img height="30" width="30" src="<?php echo base_url(); ?>/uploads/users/avatar.jpg" >
                                <span class="username"><?php echo ucfirst($this->session->userdata('USER_FULLNAME')); ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a href="<?php echo site_url(); ?>/users/load_profile_of_user"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                                <li><a href="<?php echo site_url(); ?>/login/logout"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <li class="sb-toggle-right">
                            <i class="fa  fa-align-right"></i>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <?php echo $this->load->view('template/menu'); ?>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <?php echo $content; ?>
                </section>
            </section>
            <!--main content end-->

            <!-- Right Slidebar start -->
<!--            <div class="sb-slidebar sb-right sb-style-overlay">
                <h5 class="side-title">Online Customers</h5>
                <ul class="quick-chat-list">
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?php echo base_url(); ?>backend_resources/img/chat-avatar2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>John Doe</strong>
                                <small>Dream Land, AU</small>
                            </div>
                        </div> media 
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?php echo base_url(); ?>backend_resources/img/chat-avatar.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge bg-important">3</span>
                                </div>
                                <strong>Jonathan Smith</strong>
                                <small>United States</small>
                            </div>
                        </div> media 
                    </li>

                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?php echo base_url(); ?>backend_resources/img/pro-ac-1.png" class="media-object">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge bg-success">5</span>
                                </div>
                                <strong>Jane Doe</strong>
                                <small>ABC, USA</small>
                            </div>
                        </div> media 
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?php echo base_url(); ?>backend_resources/img/avatar1.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <strong>Anjelina Joli</strong>
                                <small>Fockland, UK</small>
                            </div>
                        </div> media 
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="pull-left media-thumb">
                                <img alt="" src="<?php echo base_url(); ?>backend_resources/img/mail-avatar.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge bg-warning">7</span>
                                </div>
                                <strong>Mr Tasi</strong>
                                <small>Dream Land, USA</small>
                            </div>
                        </div> media 
                    </li>
                </ul>
                <h5 class="side-title"> pending Task</h5>
                <ul class="p-task tasks-bar">
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Database Update</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Iphone Development</div>
                                <div class="percent">87%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Mobile App</div>
                                <div class="percent">33%</div>
                            </div>
                            <div class="progress progress-striped">
                                <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">45%</div>
                            </div>
                            <div class="progress progress-striped active">
                                <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </div>-->
            <!-- Right Slidebar end -->

            <!--footer start-->
            <!--            <footer class="site-footer">
                            <div class="text-center">
                                2015 &copy; AutoVille by Armates.
                                <a href="#" class="go-top">
                                    <i class="fa fa-angle-up"></i>
                                </a>
                            </div>
                        </footer>-->
            <!--footer end-->
        </section>
        <script>
            var base_url = "<?php echo base_url(); ?>";
            var site_url = "<?php echo site_url(); ?>";

        </script>
        <!-- js placed at the end of the document so the pages load faster -->



        <script src="<?php echo base_url(); ?>backend_resources/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.nicescroll.js" type="text/javascript"></script>

        <!--custom checkbox & radio-->
        <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/ga.js"></script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>backend_resources/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/data-tables/DT_bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>backend_resources/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/owl.carousel.js" ></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.customSelect.min.js" ></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/respond.min.js" ></script>

        <!--right slidebar-->
        <script src="<?php echo base_url(); ?>backend_resources/js/slidebars.min.js"></script>

        <!--dynamic table initialization -->
        <script src="<?php echo base_url(); ?>backend_resources/js/dynamic_table_init.js"></script>



        <!--common script for all pages-->
        <script src="<?php echo base_url(); ?>backend_resources/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="<?php echo base_url(); ?>backend_resources/js/form-validation-script.js"></script>


        <!--script for this page-->
        <script src="<?php echo base_url(); ?>backend_resources/js/sparkline-chart.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/count.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/form-component.js"></script>


        <script>

            //owl carousel

            $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true,
                    autoPlay: true

                });
            });

            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });

        </script>

    </body>

</html>
