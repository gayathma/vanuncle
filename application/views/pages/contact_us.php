<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>
<script type="text/javascript">
   
    $(document).ready(function () {
    
        $("#contact_form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email:true
                },
                comments: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Email is invalid.Please enter correct email address",
                },
                comments: {
                    required: "Please enter comments"
                }
            }, submitHandler: function (form)
            {
                $.post(site_url + '/contact/send_mail', $('#contact_form').serialize(), function (msg)
                {
                        if (msg == 1) {
                            $("#contact_form").reset();
                            swal("VanUncle.lk", "Thank you - We have now received your mail and will get back to you as soon as possible.", "success");
                        } else {
                            swal("VanUncle.lk", "Error occured in sending your message", "error");
                        }

                });
            }

        });
    });
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
                        <input type="text" id="name" name="name"/>
                    </div>
                    <div class="one-half">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email"/>
                    </div>
                </div>
                <div class="f-row">
                    <div class="f-row">
                        <label for="comments">Message</label>
                        <textarea id="comments" name="comments"></textarea>
                    </div>
                </div>
                <div class="f-row">
                    <input type="submit" value="Submit" id="submit" name="submit" class="btn color medium right" />
                </div>
                <div class="f-row" id="msg">
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
            <div class="widget">
                <div class="fb-page" data-href="https://www.facebook.com/VanUnclelk-224285404607649/" data-width="340"  data-show-facepile="true" data-show-posts="false"></div>
            </div>

        </aside>
        <!--- //Sidebar -->
    </div>
</div>
