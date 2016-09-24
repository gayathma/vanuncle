<header class="site-title color">
    <div class="wrap">
        <div class="container">
            <h1>Register</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
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
                            <input type="email" id="email" name="email" onfocusout="check_username()"/>
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
                            <input type="checkbox" id="agree_checkbox" name="agree_checkbox"/>
                            <label for="checkbox">I agree with <a href="<?php echo site_url(); ?>/terms" target="_blank">terms and conditions</a>.</label>
                        </div>
                    </div>
                    <div class="f-row">
                        <div class="full-width">
                            <input type="submit" id="submit_btn" value="Create an account" class="btn color medium full" />
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
        $.validator.addMethod("NIC_Validation", function (value, element) {
            return nicValidate(value);
        }, "Invalid NIC Number");

        $("#form_register").validate({
            rules: {
                name: {
                    required: true
                },
                nic: {
                    required: true,
                    NIC_Validation: true
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
                password: {
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
                nic: {
                    required: "Please enter your nic number"
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
                    if($('#agree_checkbox').is(":checked")){
                        if (msg == 1) {
                            swal("VanUncle.lk", "Registration Successfull!!", "success");
                            setTimeout("location.href = site_url+'/home';", 1000);
                        } else {
                            swal("VanUncle.lk", "Error occured in registration", "error");
                        }
                    }else{
                        swal("VanUncle.lk", "You must agree to the terms and conditions before registering!", "error");
                    }
                });
            }

        });
    });

    function nicValidate(nicno) {

        if (nicno != '') {
            var last_nino_carector = nicno.charAt(9);

            var numbers = nicno.substring(0, 9);
            switch (last_nino_carector)
            {
                case 'V':
                    return true;
                case 'v':
                    return true;
                case 'x':
                    return true;
                case 'X':
                    return true;
                default:
                    return false;
            }
        } else {
            return true;
        }

    }

    function check_username() {
        $(".user_nameError").remove();
        username = $('#email').val();
        if (username.length != '') {
            $.post(site_url + '/sign_up/check_username', {username: username}, function (msg) {
                if (msg == "-1") {
                    $('#submit_btn').attr('disabled',true);
                    $('#email').parent().append('<label for="email" class="error user_nameError">Email already exsists.</label>');
                } else {
                    $('#submit_btn').attr('disabled',false);
                }
                //alert(msg);
            });
        }
    }

</script>