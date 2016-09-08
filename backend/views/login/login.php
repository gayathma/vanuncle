<!DOCTYPE html>
<html lang="en" class="login_page">

    <head>
        <meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Monaru Lanka Administrator Panel</title>

        <!-- Bootstrap framework -->
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>/backend_resources/login/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>/backend_resources/login/bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>/backend_resources/login/css/blue.css" />
        <!-- tooltip -->
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>/backend_resources/login/lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
        <link rel="stylesheet"
              href="<?php echo base_url(); ?>/backend_resources/login/css/style.css" />

        <!-- favicon -->
        <link rel="shortcut icon"
              href="<?php echo base_url(); ?>/backend_resources/login/favicon.ico" />

        <link href='http://fonts.googleapis.com/css?family=PT+Sans'
              rel='stylesheet' type='text/css'>

        <!--[if lt IE 9]>
                    <script src="<?php echo base_url(); ?>/backend_resources/login/js/ie/html5.js"></script>
                                <script src="<?php echo base_url(); ?>/backend_resources/login/js/ie/respond.min.js"></script>
                <![endif]-->
        <script type="text/javascript"
        src="<?php echo base_url(); ?>backend_resources/js/jquery-1.4.2.min.js"></script>








    </head>
    <body>

        <div class="login_box">

            <form onsubmit="return false" method="post" id="login_form">
                <div class="top_b">Sign in to Administrator Panel</div>
                <span id="msg_lg"></span>
                <div class="cnt_b">
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input
                                type="text" id="username" name="username" placeholder="Username"
                                value="" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input
                                type="password" id="password" name="password"
                                placeholder="Password" value="" />
                        </div>
                    </div>

                </div>
                <div class="btm_b clearfix">
                    <button class="btn btn-inverse pull-right" type="submit">Sign In</button>

                </div>
            </form>





        </div>

        <script
        src="<?php echo base_url(); ?>/backend_resources/login/js/jquery.min.js"></script>
        <script
        src="<?php echo base_url(); ?>/backend_resources/login/js/jquery.actual.min.js"></script>
        <script
        src="<?php echo base_url(); ?>/backend_resources/login/lib/validation/jquery.validate.js"></script>
        <script
        src="<?php echo base_url(); ?>/backend_resources/login/bootstrap/js/bootstrap.min.js"></script>
        <script>
                $(document).ready(function() {

                    //* boxes animation
                    form_wrapper = $('.login_box');
                    function boxHeight() {
                        form_wrapper.animate({marginTop: (-(form_wrapper.height() / 2) - 24)}, 400);
                    }
                    ;
                    form_wrapper.css({marginTop: (-(form_wrapper.height() / 2) - 24)});
                    $('.linkform a,.link_reg a').on('click', function(e) {
                        var target = $(this).attr('href'),
                                target_height = $(target).actual('height');
                        $(form_wrapper).css({
                            'height': form_wrapper.height()
                        });
                        $(form_wrapper.find('form:visible')).fadeOut(400, function() {
                            form_wrapper.stop().animate({
                                height: target_height,
                                marginTop: (-(target_height / 2) - 24)
                            }, 500, function() {
                                $(target).fadeIn(400);
                                $('.links_btm .linkform').toggle();
                                $(form_wrapper).css({
                                    'height': ''
                                });
                            });
                        });
                        e.preventDefault();
                    });

                    //* validation
                    $('#login_form').validate({
                        onkeyup: false,
                        errorClass: 'error',
                        validClass: 'valid',
                        rules: {
                            username: {required: true, minlength: 3},
                            password: {required: true, minlength: 3}
                        },
                        highlight: function(element) {
                            $(element).closest('div').addClass("f_error");
                            setTimeout(function() {
                                boxHeight()
                            }, 200)
                        },
                        unhighlight: function(element) {
                            $(element).closest('div').removeClass("f_error");
                            setTimeout(function() {
                                boxHeight()
                            }, 200)
                        },
                        errorPlacement: function(error, element) {
                            $(element).closest('div').append(error);
                        },
                        submitHandler: function(form)
                        {


                            $("#msg_lg").html('<div class="alert alert-info alert-login">Processing..!</div>');
                            $.post('<?php echo site_url(); ?>/login_controller/authenticateuser', $('#login_form').serialize(), function(msg)
                            {

                                //alert(msg);


                                if (msg == 1) {



                                    $('#msg_lg').html('<div class="alert alert-success alert-login">Authenticated..!</div>');

                                    setTimeout("location.href = '<?php echo site_url(); ?>/content_controller/loadStaticContentbyhcode/ABOUTUS';", 100);


                                } else {
                                    $('#msg_lg').html('<div class="alert alert-error alert-login">Invalid Login details..!</div>');



                                }

                            });

                        }


                    });
                });
        </script>



    </body>

</html>
