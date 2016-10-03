<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                MANAGE FAQ'S
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <!--                        <div class="btn-group">
                                                    <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#comments_add_modal" data-toggle="modal">
                                                        Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>-->
                    </div>
                    <table  class="display table table-bordered table-striped" id="faq_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th> 
                                <th>Email </th>
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="faq_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->question; ?></td>
                                    <td><?php echo $result->answer; ?></td>
                                    <td><?php echo $result->email; ?></td>
                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate Question"><i class="fa fa-check"></i></a> 
                                        <?php } else { ?> 
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate Question"><i class="fa fa-exclamation-circle"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <td align="center">
    <!--                                        <a href="<?php echo site_url(); ?>/comments/manage_comments" class="btn btn-success btn-xs"><i class="fa fa-pencil"  data-original-title="Update"></i></a>-->
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_faq_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil" title="Update"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_question(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>
                                        <a class="btn btn-primary btn-xs" onclick="send_answer_email(<?php echo $result->id; ?>)"><i class="fa  fa-envelope" title="Send Email"></i></a>


                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<!--FAQ'S Edit Modal -->
<div class="modal fade "  id="faq_edit_div" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="faq_edit_content">

        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                            $('#FAQ_menu').addClass('active open');

                                            $(document).ready(function () {
                                                $('#faq_table').dataTable();
                                            });
                                            //delete comment
                                            function delete_question(id) {
                                                if (confirm('Are you sure want ot delete this Question?')) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/faq/delete_faqs',
                                                        data: "id=" + id,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                $('#faq_' + id).hide();
                                                                toastr.success("Successfully deleted !!", "AutoVille");
                                                            }
                                                            else if (msg == 2) {
                                                                alert('Cannot be deleted as it is already assigned to others. !!');
                                                            }

                                                        }
                                                    });
                                                }
                                            }

                                            //change publish status of comment
                                            function change_publish_status(faq_id, value, element) {
                                                var condition = 'Do you want to activate this Question?';
                                                if (value == 0) {
                                                    condition = 'Do you want to deactivate this Question?';
                                                }

                                                if (confirm(condition)) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/faq/change_publish_status',
                                                        data: "id=" + faq_id + "&value=" + value,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                if (value == 1) {
                                                                    $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + faq_id + ', 0, this)" title="click to deactivate Question"><i class="fa fa-check"></i></a> ');
                                                                } else {
                                                                    $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + faq_id + ', 1, this)" title="click to activate Question"><i class="fa fa-exclamation-circle"></i></a> ');
                                                                }
                                                            } else if (msg == 2) {

                                                            }
                                                        }
                                                    });
                                                }

                                            }

                                            function display_edit_faq_pop_up(faq_id) {

                                                $.post(site_url + '/faq/load_update_faq_popup', {faq_id: faq_id}, function (msg) {

                                                    $('#faq_edit_content').html('');
                                                    $('#faq_edit_content').html(msg);
                                                    $('#faq_edit_div').modal('show');

                                                });

                                            }

                                            function send_answer_email(id) {

                                                $.ajax({
                                                    type: "POST",
                                                    url: '<?php echo site_url(); ?>/faq/send_faq_answer_email',
                                                    data: 'id=' + id,
                                                    success: function (msg) {
                                                        toastr.success("Email successfully sent !!", "AutoVille");
                                                    }
                                                });
                                            }
</script>
