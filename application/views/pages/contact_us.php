<script type="text/javascript">

    function sendmail() {


        var name = $('#name').val();
        var email = $('#email').val();
        var number = $('#number').val();
        var message = $('#message').val();
        var captcha_code = $('#captcha_code').val();


        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>/contact/send_mail/",
            data: "name=" + name + "& email=" + email + "& number=" + number + "& message=" + message + "& captcha_code=" + captcha_code,
            success: function (msg) {

                document.getElementById("contact_form").reset();
                $('#msg').html(msg);       //   alert(msg);


// setTimeout( "location.href =  <?php //echo site_url();   ?>+'/contact/';", 100);



            }
        });


    }
</script>

<header class="site-title color" >
    <div class="wrap">
        <div class="container">
            <h1>Contact Us</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                    <li>Contact</li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- //Page info -->

<!--- Google map -->

<div class="wrap">
<img src="<?php  echo base_url()?>fe_resources/images/uploads/contact.jpg"/>
</div>

<!--- //Google map -->

<div class="wrap">
    <div class="row">

        <!--- Content -->
        <div class="full-width content textongrey">
            <h2>Send us a message</h2>
            <?php echo $contact_content->content; ?>
        </div>
        <!--- //Content -->

        <!-- Form -->
        <div class="three-fourth">
            <form method="post" name="contact_form" id="contact_form">
                <div id="message"></div>
                <div class="f-row">
                    <div class="one-half">
                        <label for="name">Name and surname</label>
                        <input type="text" id="name" />
                    </div>
                    <div class="one-half">
                        <label for="email">Email address</label>
                        <input type="email" id="email" />
                    </div>
                </div>
                <div class="f-row">
                    <div class="f-row">
                        <label for="comments">Message</label>
                        <textarea id="comments"></textarea>
                    </div>
                </div>
                <div class="f-row">
                    <input type="button" value="Submit" id="submit" name="submit" class="btn color medium right" onclick="sendmail()"/>
                </div>
            </form>
        </div>
        <!-- //Form -->

        <!--- Sidebar -->
        <aside class="one-fourth sidebar right">
            <!-- Widget -->
            <div class="widget">
                <h4>Need help booking?</h4>
                <div class="textwidget">
                    <p>Call our customer services team on the number below to speak to one of our advisors who will help you with all of your needs.</p>
                    <p class="contact-data"><span class="ico phone black"></span> +94 714 550 979</p>
                </div>
            </div>
            <!-- //Widget -->

        </aside>
        <!--- //Sidebar -->
    </div>
</div>
