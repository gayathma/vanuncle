
<!-- Page info -->
<header class="site-title color">
    <div class="wrap">
        <div class="container">
            <h1>Login</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="index-2.html" title="Home">Home</a></li>
                    <li>Login</li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- //Page info -->

<div class="wrap">
    <div class="row">
        <!--- Content -->
        <div class="content one-half modal">
            <!--Login-->
            <div class="box">
                <form role="form" id="login_form" name="login_form" method="post">
                    <div class="f-row">
                        <div class="full-width">
                            <label for="username">Your username</label>
                            <input type="text" id="username" name="username"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="password">Your password</label>
                            <input type="password" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width check">
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">Remember me next time</label>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <input type="submit" onclick="login()" value="Login" class="btn color medium full" />
                        </div>
                    </div>

                    <p><a href="#">Forgotten password?</a><br />Dont have an account yet? <a href="<?php echo site_url(); ?>/sign_up">Sign up</a>.</p>
                </form>
            </div>
            <!--//Login-->
        </div>
        <!--- //Content -->
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#login_form").validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            username: "required",
            password: "required"
        }, submitHandler: function(form) {
        }
    });
});

function login() {
    var login_username = $('#username').val();
    var login_password = $('#password').val();
    if ($('#login_form').valid()) {
        $.ajax({
            type: "POST",
            url: site_url + '/login/authenticate_driver',
            data: "username=" + login_username + "&password=" + login_password,
            success: function(msg) {
                if (msg == 1) {
                    $('#login_msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i>Login Successfull!!</div>');
                    $('#login_msg').fadeIn();
                    $('#login_msg').fadeOut(4000);
                    setTimeout("location.href = site_url+'/login/index';", 100);
                } else {
                    login_form.reset();
                    $('#login_msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>Invalid Login Details!!</div>');
                    $('#login_msg').fadeIn();
                    $('#login_msg').fadeOut(4000);
                }
            }
        });
    }
}
</script>