<header class="site-title color">
    <div class="wrap">
        <div class="container">
            <h1>My account</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                    <li>My account</li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- //Page info -->


<div class="wrap">
    <div class="row">

        <!--- Sidebar -->
        <aside class="one-fourth sidebar left">
            <!-- Widget -->
            <div class="widget">
                <ul class="categories">
                    <li class="active"><a href="#tab1">Settings</a></li>
                    <li><a href="#tab2">My vehicles</a></li>
                </ul>
            </div>
            <!-- //Widget -->
        </aside>
        <!--- //Sidebar -->

        <!--- Content -->
        <div class="three-fourth content">
            <!-- Tab -->
            <article class="single" id="tab1">
                <div class="box">
                    <h2>General settings</h2>
                    <script src="<?php echo base_url(); ?>fe_resources/js/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script>
                        //upload manufacture logo
                        $(function () {
                            var btnUpload = $('#upload');
                            var status = $('#sta');
                            new AjaxUpload(btnUpload, {
                                action: '<?php echo site_url(); ?>/account/upload_driver_profile_pic',
                                name: 'uploadfile',
                                onSubmit: function (file, ext) {
                                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                        // extension is not allowed
                                        status.text('Only JPG, PNG or GIF files are allowed');
                                        return false;
                                    }
                                    //status.text('Uploading...Please wait');
                                    //                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");
                                },
                                onComplete: function (file, response) {
                                    //On completion clear the status
                                    //status.text('');
                                    $("#files").html("");
                                    $("#sta").html("");
                                    //Add uploaded file to list
                                    if (response != "error") {
                                        $('#files').html("");
                                        $('<div></div>').appendTo('#files').html('<img src="<?php echo base_url(); ?>uploads/drivers/' + response + '"   width="100px" height="100px" /><br />');
                                        picFileName = response;
                                        document.getElementById('logo').value = response;
                                        //                    document.getElementById('cover_image').value = response;
                                    } else {
                                        $('<div></div>').appendTo('#files').text(file).addClass('error');
                                    }
                                }
                            });
                        });
                    </script>
                    <fieldset>
                        <form role="form" id="detail_form" name="detail_form" method="post">
                            <div class="f-row">
                                <div class="full-width">

                                    <label class="form-label">Upload Profile Picture</label>

                                    <div id="files"><img src="<?php echo base_url(); ?>uploads/drivers/<?php echo $driver->profile_pic; ?>"  /></div>
                                    </br>
                                    <div id="upload">

                                        <button type="button" class="btn btn-info" id="browse">Browse</button>
                                        <input type="text" id="logo" name="logo" style="visibility: hidden" value=""/>
                                    </div>
                                    <div id="sta" class="error"><span id="status" ></span></div>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="one-half">
                                    <label for="name">Name and surname</label>
                                    <input type="text" id="name" name="name" value="<?php echo $driver->name; ?>"/>
                                </div>
                                <div class="one-half">
                                    <label for="nic">NIC number</label>
                                    <input type="text" id="nic" name="nic" value="<?php echo $driver->nic; ?>"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <div class="one-half">
                                    <label for="email">Email address</label>
                                    <input type="email" disabled="true" id="email" name="email" value="<?php echo $driver->email; ?>"/>
                                </div>
                                <div class="one-half">
                                    <label for="mobile">Mobile number</label>
                                    <input type="number" id="mobile" name="mobile" value="<?php echo $driver->mobile; ?>"/>
                                </div>
                            </div>
                            <div class="f-row">
                                <input type="submit" value="Save Changes" id="submit1" name="submit" class="btn color medium" />
                            </div>
                        </form>
                    </fieldset>
                </div>

                <div class="box">
                    <h2>Security settings</h2>
                    <fieldset>
                        <form role="form" id="security_form" name="security_form" method="post">
                            <div class="f-row">
                                <div class="one-half">
                                    <label for="password">New password</label>
                                    <input type="password" id="password" name="password"/>
                                </div>
                                <div class="one-half">
                                    <label for="conf_password">Confirm new password</label>
                                    <input type="password" id="conf_password" name="conf_password"/>
                                </div>
                            </div>

                            <div class="f-row">
                                <input type="submit" value="Save Changes" id="submit2" name="submit" class="btn color medium" />
                            </div>
                        </form>
                    </fieldset>
                </div>
            </article>
            <!-- //Tab -->

            <!-- Tab -->
            <article class="single" id="tab2">
                <a href="<?php echo site_url(); ?>/vehicles" class="btn medium back right " style="margin-bottom: 10px;">Add New Vehicle</a>
                <?php
                if (count($my_vehicles) > 0) {
                    foreach ($my_vehicles as $my_vehicle) {
                        ?>
                        <!-- Item -->
                        <div class="box history" id="veh_<?php echo $my_vehicle->id; ?>">
                            <h6><small><?php echo date('Y-m-d', strtotime($my_vehicle->added_date)); ?></small></h6>
                            <div class="row">
                                <div class="image">
                                    <?php if ($my_vehicle->image_path != ''): ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicles/<?php echo $my_vehicle->image_path; ?>" width="20%" class="image-responsive" />
                                    <?php else: ?>
                                        <img src="<?php echo base_url(); ?>uploads/vehicles/default.png" width="20%" class="image-responsive"/>
                                    <?php endif; ?>
                                    <a href="javascript:;" onclick="deleteVehicle(<?php echo $my_vehicle->id; ?>)" title="Delete" >Delete</a> &nbsp;|&nbsp; <a href="<?php echo site_url(); ?>/vehicles/edit_vehicle/<?php echo $my_vehicle->id; ?>"  title="Modify">Modify</a>
                                </div>
                                <div class="one-third">
                                    <p><span>Vehicle:</span> <?php echo $my_vehicle->make_name . ' ' . $my_vehicle->model_name . ' ' . $my_vehicle->year; ?></p>
                                </div>
                                <div class="two-third">
                                    <p><span>Extras:</span> <?php echo $my_vehicle->seats . ' Seats, Vehicle reg No - ' . $my_vehicle->vehicle_no; ?></p>
                                </div>
                            </div>


                        </div>
                        <!-- //Item -->
                        <?php
                    }
                } else {
                    ?>
                    <!-- Item -->
                    <div class="box history">
                        <div class="row">
                            <div class="three-third">
                                <p>No Vehicles Found.</p>
                            </div>
                        </div>
                    </div>
                    <!-- //Item -->
                <?php } ?>

            </article>
            <!-- //Tab -->
        </div>
        <!--- //Content -->
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>

<script>
                                        $(document).ready(function () {
                                            $('.single').hide().first().show();
                                            $('.categories li:first').addClass('active');

                                            $('.categories a').on('click', function (e) {
                                                e.preventDefault();
                                                $(this).closest('li').addClass('active').siblings().removeClass('active');
                                                $($(this).attr('href')).show().siblings('.single').hide();
                                            });

                                            var hash = $.trim(window.location.hash);
                                            if (hash)
                                                $('.categories a[href$="' + hash + '"]').trigger('click');


                                            $.validator.addMethod("NIC_Validation", function (value, element) {
                                                return nicValidate(value);
                                            }, "Invalid NIC Number");

                                            $("#detail_form").validate({
                                                rules: {
                                                    name: {
                                                        required: true
                                                    },
                                                    nic: {
                                                        required: true,
                                                        NIC_Validation: true
                                                    },
                                                    mobile: {
                                                        required: true,
                                                        digits: true,
                                                        minlength: 10,
                                                        maxlength: 10
                                                    }
                                                },
                                                messages: {
                                                    name: {
                                                        required: "Please enter your name and surname"
                                                    },
                                                    nic: {
                                                        required: "Please enter your nic number"
                                                    },
                                                    mobile: "Please enter your mobile number"

                                                }, submitHandler: function (form)
                                                {
                                                    $.post(site_url + '/sign_up/update_driver_details', $('#detail_form').serialize(), function (msg)
                                                    {
                                                        if (msg == 1) {
                                                            swal("VanUncle.lk", "Deatils Saved Successfully!!", "success");
                                                        } else {
                                                            swal("VanUncle.lk", "Error occured in saving details", "error");

                                                        }
                                                    });
                                                }

                                            });

                                            $("#security_form").validate({
                                                rules: {
                                                    password: {
                                                        required: true,
                                                        minlength: 6
                                                    },
                                                    conf_password: {
                                                        required: true,
                                                        equalTo: "#password"
                                                    }
                                                },
                                                messages: {
                                                    password: "Please enter a password",
                                                    conf_password: {
                                                        required: "Confirm the password",
                                                        equalTo: "Passwords do not match"
                                                    }

                                                }, submitHandler: function (form)
                                                {
                                                    $.post(site_url + '/sign_up/update_security_details', $('#security_form').serialize(), function (msg)
                                                    {
                                                        if (msg == 1) {
                                                            swal("VanUncle.lk", "Password Updated Successfully!!", "success");
                                                        } else {
                                                            swal("VanUncle.lk", "Error occured in saving details", "error");

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

                                        function deleteVehicle(vehicle_id) {
                                            swal({
                                                title: "Are you sure?",
                                                text: "You will not be able to recover this vehicle!",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "Yes, delete it!",
                                                closeOnConfirm: false
                                            },
                                                    function () {

                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo site_url(); ?>/vehicles/delete_vehicle',
                                                            data: "id=" + vehicle_id,
                                                            success: function (msg) {
                                                                if (msg == 1) {
                                                                    $('#veh_' + vehicle_id).hide();
                                                                    swal("Deleted!", "Your vehicle has been deleted.", "success");
                                                                } else {
                                                                    swal("Cancelled!", "Error occured while deleting the vehicle.", "error");
                                                                }
                                                            }
                                                        });

                                                    });
                                        }
</script>
