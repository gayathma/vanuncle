<!-- page corner -->
<div class="corner"></div>


<!--	<div class="notice canhide">You have 7 new messages</div>
        <div class="info canhide">Welcome to Primo!</div>
        <div class="success canhide">Installation complete!</div>
        <div class="warning">Install folder is still there! Hurry up, delete it!</div>-->

<div class="divider"></div>

<div class="kubrick">
    <div class="top">
        <h3><?php echo $title; ?></h3>

        <!-- tabs menu -->
        <ul class="tabs"> 
            <?php
            $user_privilege_model_service = new User_privilege_model_service();

            if ($user_privilege_model_service->getUserPrivilege('MANAGE_ATTR_QUESTIONS')) {
                ?>
                <li><a class="selected" href="#tables">Manage Attribute Questions</a></li> <?php } ?>
            <?php
            if ($user_privilege_model_service->getUserPrivilege('ADD_ATTR_QUESTIONS')) {
                ?>
                <li><a href="#forms">Add New Attribute Question</a></li><?php } ?>

        </ul>
        <div class="clear"></div>
    </div>

    <div class="wrap">

        <!-- tables -->
        <div id="tables">
            <div class="space"></div>
            <!-- table -->
            <table id="dt2" class="display dataTable ">
                <thead>
                <tr>
                    <th ><h5>Attribute</h5></th>
                <th ><h5>Question(Eng)</h5></th>
                <th ><h5>Question(Sin)</h5></th>
                <th ><h5>Question(Tam)</h5></th>
                <th colspan="4"><h5>Publish Status</h5></th>
                <th>Action</th>
                </tr>
                <tr>
                    <th>&nbsp;</th>
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
                <?php foreach ($viewAllAttributeQuestions as $viewAQ) { ?>
                    <tr id="row_<?php echo $viewAQ->question_id; ?>">
                        <td><?php echo $viewAQ->attribute_eng; ?></td>
                        <td><?php echo $viewAQ->question_eng; ?></td>
                        <td><?php echo $viewAQ->question_sin; ?></td>
                        <td><?php echo $viewAQ->question_tam; ?></td>
                        <td>
                            <?php if ($viewAQ->english_status == '1') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                            <?php } else if ($viewAQ->english_status == '0') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($viewAQ->sinhala_status == '1') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                            <?php } else if ($viewAQ->sinhala_status == '0') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($viewAQ->tamil_status == '1') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/tick_circle.png" title="Published" />
                            <?php } else if ($viewAQ->tamil_status == '0') { ?>
                                <img src="<?php echo base_url(); ?>backend_resources/images/cross_circle.png" title="Unpublished" />
                            <?php }  ?>
                        </td>
                        <td class="positive"><?php
                            if ($viewAQ->published_status ==1) {
                                echo '<img src="' . base_url() . 'backend_resources/images/tick_circle.png" title="Published" />';
                            } else {
                                echo '<img src="' . base_url() . 'backend_resources/images/cross_circle.png" title="Unpublished" />';
                            }
                            ?></td><?php $id = $viewAQ->question_id; ?>
                        <td class="controls">
                            <a href="<?php echo base_url() . 'backend.php/attribute_questions/editAttributeQuestions/' . $id; ?>" title="Edit" >
                                <?php
                                $user_privilege_model_service = new User_privilege_model_service();

                                if ($user_privilege_model_service->getUserPrivilege('EDIT_ATTR_QUESTIONS')) {
                                    ?><img src="<?php echo base_url(); ?>backend_resources/images/pencil_gray.png" height="16px" width="16px" title="Edit" style=" cursor: pointer;" /></a><?php } ?>
                            <a href="#" title="Delete">
                                &nbsp;
                                <?php
                                $user_privilege_model_service = new User_privilege_model_service();

                                if ($user_privilege_model_service->getUserPrivilege('DELETE_ATTR_QUESTIONS')) {
                                    ?><img src="<?php echo base_url(); ?>backend_resources/images/trash_bin.png" height="18px" width="18px" id="<?php echo $viewAQ->question_id; ?>" class="delete_attribute_question" title="Delete Question" style=" cursor: pointer;" /><?php } ?>
                            </a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
            </table>
        </div>


        <?php
        if ($user_privilege_model_service->getUserPrivilege('ADD_ATTR_QUESTIONS')) {
            ?>
            <!-- forms tab -->
            <div id="forms">

                <form action="#" method="post" id="add_attribute_question" name="add_attribute_question">
                    <fieldset>

                        <label>Attribute</label>
                        <select name="attribute_id" id="attribute_id">
                            <option value="" selected >Choose</option>
                            <?php foreach ($getAllAttributes as $attributes) { ?>
                                <option value="<?php echo $attributes->attribute_id; ?>"><?php echo $attributes->attribute_eng; ?></option>
                            <?php } ?>
                        </select>


                        <label>Attribute Question in English</label>
                        <input name="question_eng" class="text medium" type="text" id="question_eng"/>


                        <label>Attribute Question in Sinhala</label>
                        <input name="question_sin" class="text medium" type="text" id="question_sin"/>


                        <label>Attribute Question in Tamil</label>
                        <input name="question_tam" class="text medium" type="text" id="question_tam"/>




                        <p>
                            <input class="button def" type="submit" value="Add Question" />
                            <input class="button alt" type="reset" value="Reset" />
                        </p>
                    </fieldset>	
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