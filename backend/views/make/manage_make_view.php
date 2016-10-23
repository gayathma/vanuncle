<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Makes
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#make_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="make_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="make_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->name; ?></td>
                                    <td align="center"><?php if(!empty($result->logo)){ ?><img src="<?php echo base_url(); ?>uploads/make_logo/<?php echo $result->logo; ?>" width="60px" /><?php } ?></td>
    <!--                                        <td><?php echo $result->added_by_user; ?></td>-->
    <!--                                        <td><?php echo $result->added_date; ?></td>-->
                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate make"><i class="fa fa-check"></i></a> 
                                        <?php } else { ?> 
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate make"><i class="fa fa-exclamation-circle"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <td align="center">
    <!--                                        <a href="<?php echo site_url(); ?>/make/manage_makes" class="btn btn-success btn-xs"><i class="fa fa-pencil"  data-original-title="Update"></i></a>-->
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_make_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil" data-original-title="Update"></i> </a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_make(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>

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

<!--Manufacture add model-->
<div class="modal fade " id="make_add_modal" tabindex="-1" role="dialog" aria-labelledby="make_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Make</h4>
            </div>
            <form id="add_make_form" name="add_make_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Make<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Make">
                    </div>
                </div>
                <span id="rtn_msg_edit"></span>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!--Manufacture edit modal-->
<div class="modal fade "  id="make_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="make_edit_content">

        </div>
    </div>
</div>

<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                            $('#vehicle_spec_menu').addClass('active open');

                                            $(document).ready(function () {
                                                $('#make_table').dataTable();

                                                $("#add_make_form").validate({
                                                    rules: {
                                                        name: "required"
                                                    },
                                                    messages: {
                                                        name: "Please enter a Make"
                                                    }, submitHandler: function (form)
                                                    {
                                                        $.post(site_url + '/make/add_make', $('#add_make_form').serialize(), function (msg)
                                                        {
                                                            if (msg == 1) {
                                                                $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                                                                add_make_form.reset();
                                                                window.location = site_url + '/make/manage_makes';
                                                            } else {
                                                                $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                                                            }
                                                        });


                                                    }
                                                });

                                            });

                                            //delete make
                                            function delete_make(id) {
                                                if (confirm('Are you sure want to delete this Make ?')) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/make/delete_makes',
                                                        data: "id=" + id,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                $('#make_' + id).hide();
                                                                toastr.success("Successfully deleted !!", "VanUncle.lk");

                                                            }
                                                            else if (msg == 2) {
                                                                alert('Cannot be deleted as it is already assigned to others. !!');
                                                            }

                                                        }
                                                    });
                                                }
                                            }

                                            //change publish status of make
                                            function change_publish_status(make_id, value, element) {
                                                var condition = 'Do you want to activate this make?';
                                                if (value == 0) {
                                                    condition = 'Do you want to deactivate this make?';
                                                }

                                                if (confirm(condition)) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/make/change_publish_status',
                                                        data: "id=" + make_id + "&value=" + value,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                if (value == 1) {
                                                                    $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + make_id + ', 0, this)" title="click to deactivate make"><i class="fa fa-check"></i></a> ');
                                                                } else {
                                                                    $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + make_id + ', 1, this)" title="click to activate make"><i class="fa fa-exclamation-circle"></i></a> ');
                                                                }
                                                            } else if (msg == 2) {

                                                            }
                                                        }
                                                    });
                                                }
                                            }

                                            //edit Manufacure
                                            function display_edit_make_pop_up(make_id) {

                                                $.post(site_url + '/make/load_edit_make_content', {make_id: make_id}, function (msg) {

                                                    $('#make_edit_content').html('');
                                                    $('#make_edit_content').html(msg);
                                                    $('#make_edit_div').modal('show');
                                                });

                                            }




</script>

