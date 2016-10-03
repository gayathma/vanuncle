<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Armates">
        <meta name="keyword" content="AutoVille">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>backend_resources/img/favicon.html">

        <title>AutoVille</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>backend_resources/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>backend_resources/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend_resources/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">
            <form class="form-signin" id="password_reset_form" name="password_reset_form" method="POST">
                <h2 class="form-signin-heading">reset password</h2>
                <div class="login-wrap">
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username" autofocus>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="Confirm Password">

                    <button onclick="reset_password()" class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>                   
                </div>
                <div id="reset_msg" style="display: none">
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle fa-fw fa-lg"></i>
                        Successfull!!!
                    </div>
                </div>
            </form>

        </div>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>backend_resources/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>backend_resources/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery.validate.min.js"></script>



    </body>
</html>

<script type="text/javascript">

                        var base_url = "<?php echo base_url(); ?>";
                        var site_url = "<?php echo site_url(); ?>";


                        $(document).ready(function() {

                            $("#password_reset_form").validate({
                                ignore: "",
                                rules: {
                                    username: {required: true},
                                    password: {required: true},
                                    confirm_password: {required: true, equalTo: "#password"}
                                },
                                submitHandler: function(form) {

                                }
                            });
                        });


                        function reset_password() {

                            if ($('#password_reset_form').valid()) {
                                var $form = $('#password_reset_form');

                                $.ajax({
                                    type: 'POST',
                                    url: site_url + '/login/update_password',
                                    data: $form.serialize(),
                                    success: function(msg) {

                                        if (msg == '1') {
                                            $('#reset_msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Successfull!!!</div>');
                                            $('#reset_msg').fadeIn();
                                            $('#reset_msg').fadeOut(4000);
                                            setTimeout("location.href = site_url+'/login/load_login';", 100);
                                        } else if (msg == '2') {
                                            $('#reset_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Error Occured!!</div>');
                                            $('#reset_msg').fadeIn();
                                            $('#reset_msg').fadeOut(4000);
                                            password_reset_form.reset();
                                        } else {
                                            $('#reset_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Invalid User!!!</div>');
                                            $('#reset_msg').fadeIn();
                                            $('#reset_msg').fadeOut(4000);
                                            password_reset_form.reset();
                                        }

                                    },
                                    error: function(msg) {
                                        alert("Error!");
                                    }
                                });
                            }
                        }

</script>

