

<!-- page corner -->
<div class="corner"></div>

<h1><?php //echo $title_menu_main;  ?></h1>




<div class="divider"></div>

<div class="kubrick">
    <div class="top">
        <h3>Disciplines</h3>

        <!-- tabs menu -->
        <ul class="tabs"> 

            <?php
            $user_privilege_model_service = new User_privilege_model_service();

            if ($user_privilege_model_service->getUserPrivilege('MANAGE_DISCIPLINES')) {
                ?> <li><a class="selected" href="#manage_discip">Manage Disciplines</a></li><?php } ?>

<?php if ($user_privilege_model_service->getUserPrivilege('ADD_DISCIPLINES')) { ?> <li><a href="#add_discip">Add Discipline</a></li> <?php } ?>


        </ul>
        <div class="clear"></div>
    </div>

    <div class="wrap">

        <div id="manage_discip">

            <!-- tables -->
            <div id="tables">

                <div class="space"></div>
                <!-- table -->
                <table id="dt2" class="display dataTable ">
                    <thead>
                    <tr >
                        <th ><h5>English Name</h5></th>
                    <th ><h5>Sinhala Name</h5></th>
                    <th ><h5>Tamil Name</h5></th>
                    <th colspan="4"><h5>Publish Status</h5></th>


                    <th ><h5>Action</h5></th>
                    </tr>

                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th align="left"><h6>E</h6></th>
                    <th align="left"><h6>S</h6></th>
                    <th align="left"><h6>T</h6></th>
                    <th align="left"><h6>Overall</h6></th>
                    <th >&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($disciplines as $discipline) {
                        ?>

                        <tr id="row_<?php echo $discipline->discipline_id; ?>">

                            <td><?php echo $discipline->discipline_eng; ?></td>
                            <td><?php echo $discipline->discipline_sin; ?></td>
                            <td><?php echo $discipline->discipline_tam; ?></td>

                            <td>
                                <?php if ($discipline->english_status == '1') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                                <?php } else if ($discipline->english_status == '0') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
    <?php } ?>
                            </td>

                            <td>
                                <?php if ($discipline->sinhala_status == '1') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                                <?php } else if ($discipline->sinhala_status == '0') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
    <?php } ?>
                            </td>

                            <td>
                                <?php if ($discipline->tamil_status == '1') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                                <?php } else if ($discipline->tamil_status == '0') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
    <?php } ?>
                            </td>

                            <td  class="positive">
                                <?php if ($discipline->published_status == '1') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                                <?php } else if ($discipline->published_status == '0') { ?>
                                    <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
    <?php } ?>
                            </td>

                            <td class="controls">
                               <?php if ($user_privilege_model_service->getUserPrivilege('EDIT_DISCIPLINES')) { ?>  <a href="<?php echo base_url(); ?>backend.php/disciplines/edit_discipline/<?php echo $discipline->discipline_id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/pencil_gray.png" height="16px" width="16px" title="Edit" style=" cursor: pointer;" /></a><?php } ?>
                                &nbsp;
                                <?php if ($user_privilege_model_service->getUserPrivilege('DELETE_DISCIPLINES')) { ?><img src="<?php echo base_url(); ?>backend_resources/images/trash_bin.png" height="18px" width="18px" id="<?php echo $discipline->discipline_id; ?>" class="delete_discipline" title="Delete Discipline" style=" cursor: pointer;" /><?php } ?>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>

                </tbody>

                </table>


            </div>


        </div>

<?php if ($user_privilege_model_service->getUserPrivilege('ADD_DISCIPLINES')) { ?>
        <div id="add_discip">


            <form name="discipline_add_form" id="discipline_add_form" method="post">

                <label>Discipline Name - English</label>
                <input name="dis_eng" id="dis_eng" class="text medium" type="text" />


                <label>Discipline Name - Sinhala</label>
                <input name="dis_sin" id="dis_sin" class="text medium" type="text" />


                <label>Discipline Name - Tamil</label>
                <input name="dis_tam" id="dis_tam" class="text medium" type="text" />


                
                <input type="hidden" id="eng_status" name="eng_status" value="1"/>
                <!--<label>English Status</label>
                <input type="radio" name="eng_status" id="eng_status" value="1" checked="checked" />Published
                <input type="radio" name="eng_status" id="eng_status" value="0" />Unpublished-->

                
                 <input type="hidden" id="sin_status" name="sin_status" value="1"/>
               <!-- <label>Sinhala Status</label>
               <input type="radio" name="sin_status" id="sin_status" value="1" checked="checked" />Published
                <input type="radio" name="sin_status" id="sin_status" value="0" />Unpublished-->

                
                <input type="hidden" id="tam_status" name="tam_status" value="1"/>
                <!--<label>Tamil Status</label>
                <input type="radio" name="tam_status" id="tam_status" value="1" checked="checked" />Published
                <input type="radio" name="tam_status" id="tam_status" value="0" />Unpublished-->

                
                <input type="hidden" id="pub_status" name="pub_status" value="1"/>
                <!--<label>Overall Publish Status</label>
                <input type="radio" name="pub_status" id="pub_status" value="1" checked="checked" />Published
                <input type="radio" name="pub_status" id="pub_status" value="0" />Unpublished-->

                <div class=" clear">
                    <br/>
                </div>

                <p>
                    <input class="button def" type="submit" value="Add Discipline" />
                    <input class="button alt" type="reset" value="Reset" />
                </p>

            </form>

        </div>

<?php } ?>
    </div>
</div>
<div id="custom_alert">

</div>

    <script type="text/javascript">
        $('#mastr').addClass('selected');
// $('#setting_sub_menu').removeClass('closed'); 

    </script> 