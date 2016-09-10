<header class="site-title color">
    <div class="wrap">
        <div class="container">
            <h1>Register</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="index-2.html" title="Home">Home</a></li>
                    <li>Sign Up As A Driver</li>
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
                <form role="form" id="form_register" name="form_register" method="post" >
                    <div class="f-row">
                        <div class="full-width">
                            <label for="name">Your name and surname</label>
                            <input type="text" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="nic">Your NIC number</label>
                            <input type="text" id="nic" name="nic"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="email">Your email address</label>
                            <input type="email" id="email" name="email"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="mobile">Your mobile number</label>
                            <input type="text" id="mobile" name="mobile"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="land_phone">Other contact number</label>
                            <input type="text" id="land_phone" name="land_phone"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="password">Your password</label>
                            <input type="password" id="password" name="password"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <label for="password2">Repeat password</label>
                            <input type="password" id="password2" name="password2"/>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width check">
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">I agree with terms and conditions.</label>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <input type="submit" value="Create an account" class="btn color medium full" />
                        </div>
                    </div>

                    <p>Already have an account? <a href="<?php echo site_url(); ?>/login">Login</a>.</p>
                </form>
            </div>
            <!--//Login-->
        </div>
        <!--- //Content -->
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#form_register").validate({
            rules: {
                name: {
                    required: true
                },
                nic: {
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                land_phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                password:{
                    required: true,
                    minlength: 6
                },
                password2: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Please enter your name and surname"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Invalid email address"
                },
                mobile: "Please enter your mobile number",
                land_phone: "Please enter your other contact number",
                password: "Please enter a password",
                password2: {
                    required: "Confirm the password",
                    equalTo: "Passwords do not match"
                }
            }, submitHandler: function (form)
            {
                $.post(site_url + '/sign_up/add_new_driver', $('#form_register').serialize(), function (msg)
                {
                    if (msg == 1) {
                        toastr.success("Successfully Registered", "VanUncle.lk");
                        window.location = site_url + '/home';
                    } else {
                        toastr.error("Error in registration", "VanUncle.lk");

                    }
                });
            }

        });
    });



</script>