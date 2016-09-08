

<!-- page corner -->
<div class="corner"></div>

<h1><?php //echo $title_menu_main;   ?></h1>




<div class="divider"></div>

<div class="kubrick">
    <div class="top">
        <h3>Manage Registered Users</h3>

        <!-- tabs menu -->
        <ul class="tabs">
            
            <?php
            $user_privilege_model_service = new User_privilege_model_service();
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_REG_STUDENTS')) {
            ?>
            <li><a class="selected" href="#manage_reg_users">Registered Users</a></li>
            <?php } ?>
            <?php if ($user_privilege_model_service->getUserPrivilege('ADD_REG_STUDENTS')) { ?>
            <li><a href="#add_reg_users">Add Student User</a></li>
            <?php } ?>
            <!--                <li><a href="#text">Text</a></li>
                            <li><a href="#cols">Columns</a></li>-->
        </ul>
        <div class="clear"></div>
    </div>

    <div class="wrap">

        <div id="manage_reg_users">

            <!-- tables -->
            <div id="tables">
                <div class="space"></div>
                <!-- table -->
                <table id="dt2" class="display dataTable ">
                    <thead>
                    <tr >
                        <th ><h5>Name</h5></th>
                    <th ><h5>Username</h5></th>
                    <th ><h5>D.O.B</h5></th>
                    <th ><h5>NIC</h5></th>
                    <th ><h5>Contact No</h5></th>
                    <th ><h5>Email</h5></th>
                    <th ><h5>Status</h5></th>
                <th ><h5>Actions</h5></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registeredusers as $user) {
                        ?>

                        <tr id="row_<?php echo $user->student_id; ?>">

                            <td><?php echo $user->first_name . ' ' . $user->last_name; ?></td>
                            <td><?php echo $user->user_name; ?></td>
                            <td><?php echo $user->dob; ?></td>
                            <td><?php echo $user->nic; ?></td>
                            <td><?php echo $user->contact_tp; ?></td>
                            <td><?php echo $user->email; ?></td>

                            <td class="<?php
                            if ($user->published_status == '1') {
                                echo "positive";
                            } else {
                                echo"negative";
                            }
                            ?>">
                                    <?php
                                    if ($user->published_status == '1') {
                                        echo "Published";
                                    } else if ($user->published_status == '0') {
                                        echo "Unpublished";
                                    }
                                    ?>
                            </td>



                            <td class="controls">
                                
                                <?php if ($user_privilege_model_service->getUserPrivilege('CHANGE_USER_STATUS')) { ?>
                                <?php if ($user->published_status == '1') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" id="<?php echo $user->student_id . '***0'; ?>" class="change_reg_user_status" title="Click to unpublish this user" style=" cursor: pointer;" />
                                <?php } else if ($user->published_status == '0') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" id="<?php echo $user->student_id . '***1'; ?>" class="change_reg_user_status" title="Click to publish this user" style=" cursor: pointer;" />
                                <?php } } ?>
                                <?php if ($user_privilege_model_service->getUserPrivilege('EDIT_REG_STUDENTS')) { ?>    
                                &nbsp;
                                <a href="<?php echo base_url(); ?>backend.php/user/edit_user/<?php echo $user->student_id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/pencil_gray.png" height="16px" width="16px" title="Edit Profile" style=" cursor: pointer;" /></a>
                                &nbsp;
                                <a href="<?php echo base_url(); ?>backend.php/user/manage_edu_profile/<?php echo $user->student_id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/addressbook.png" height="16px" width="16px" title="Manage Education Qualifications" style=" cursor: pointer;" /></a>
                                <?php } ?>
                                <?php if ($user_privilege_model_service->getUserPrivilege('CHANGE_USER_PASSWORD')) { ?>
                                &nbsp;
                                <a href="<?php echo base_url(); ?>backend.php/user/change_user_password/<?php echo $user->student_id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/key.png" height="16px" width="16px" title="Change User Password" style=" cursor: pointer;" /></a>
                                <?php } ?>
                                <?php if ($user_privilege_model_service->getUserPrivilege('DELETE_REG_STUDENTS')) { ?>
                                &nbsp;
                                <img src="<?php echo base_url(); ?>backend_resources/images/trash_bin.png" height="18px" width="18px" id="<?php echo $user->student_id; ?>" class="delete_reg_user" title="Delete this user" style=" cursor: pointer;" />
                                <?php } ?>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>

                </tbody>

                </table>
            </div>

        </div>

<?php if ($user_privilege_model_service->getUserPrivilege('ADD_REG_STUDENTS')) { ?>
        <div id="add_reg_users">


            <form name="user_register_form" id="user_register_form" method="post">

                <label for="first_name">First Name :</label>
                <input type="text" id="first_name" class="text medium" name="first_name" value="">
                <div class="elVal"></div>
                <p>
                    <label for="last_name">Last Name :</label>
                    <input type="text" id="last_name" class="text medium" name="last_name" value="">
                <div class="elVal"></div>
                <p>
                    <label for="user_name">Username :</label>
                    <input type="text" id="user_name" class="text medium" name="user_name">
                <div class="elVal"></div>
                <div id="username_alert"></div>
                <p>
                    <label for="password">Password :</label>
                    <input type="password" id="password" class="text medium" name="password">
                <div class="elVal"></div>
                <p>
                    <label for="confirm_password">Confirm Password :</label>
                    <input type="password" id="confirm_password" class="text medium" name="confirm_password">
                <div class="elVal"></div>
                <p>
                    <label for="dob">Date of Birth :</label>
                    <input type="text" id="dob" name="dob" class="text medium datepick" value="">
                <p>
                    <label for="nic">NIC :</label>
                    <input type="text" id="nic" name="nic" class="text medium" value="">
                <div class="elVal"></div>
                <p>
                    <label for="school">School :</label>
                    <input type="text" id="school" class="text medium" name="school" value="">
                <p>
                    <label for="contact">Contact Telephone :</label>
                    <input type="text" id="contact" name="contact" class="text medium" value="">
                <div class="elVal"></div>
                <p>
                    <label for="email">Email :</label>
                    <input type="text" id="email" name="email" class="text medium" value="">
                <div class="elVal"></div>
                <div id="email_alert"></div>
                <p>
                    <label for="district">District :</label>

                    <select id="district" name="district">
                        <option value=""> -- Please select --</option>
                        <?php
                        foreach ($districts as $district) {
                            ?>
                            <option value="<?php echo $district->did; ?>"><?php echo $district->dname_eng; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                <div class="elVal"></div>
                <p>
                    <label for="city">City :</label>
                    <input type="text" id="city" name="city" class="text medium" value="">
                <div class="elVal"></div>
                <p>
                    <label for="address">Address :</label>
                    <textarea id="address" class=" medium" name="address" ></textarea>
                <p>
                    <label for="address">Father's Name :</label>
                    <input type="text" id="father_name" class="text medium" name="father_name" value="">
                <p>
                    <label for="address">Father's Occupation :</label>
                    <input type="text" id="father_occ" class="text medium" name="father_occ" value="">
                <p>
                    <label for="address">Mother's Name :</label>
                    <input type="text" id="mother_name" class="text medium" name="mother_name" value="">
                <p>
                    <label for="address">Mother's Occupation :</label>
                    <input type="text" id="mother_occ" class="text medium" name="mother_occ" value="">
                <p>
                    <label for="address">No of Siblings :</label>
                    <input type="text" id="siblings_no" class="text medium" name="siblings_no" value="">
                <p>
                    <input type="hidden" id="form_add" name="form_add" value="add" />


                <div id="user_msg"></div>
                <p>
                    <input id="reg_user" type="submit" class="button def" name="reg_user" value="Add User" />
                    &nbsp;
                    <input type="button" class="button alt" value="Cancel" onclick="history.go(-1);" />



            </form>


        </div>
<?php } ?>


    </div>
</div>

<div id="custom_alert">

</div>
<script type="text/javascript">
                        $('#students').addClass('selected');
// $('#setting_sub_menu').removeClass('closed'); 

</script> 