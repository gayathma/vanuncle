<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Models
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#model_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>                
                    </div>                        
                    <table  class="display table table-bordered table-striped" id="model_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Make</th>
                                <th>Model Name</th>                                
                                <!--<th>Added Date</th>-->
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="model_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->manufacturer; ?></td>
                                    <td><?php echo $result->name; ?></td>
                                    <!--<td><?php echo $result->added_by_user; ?></td>
                                    <td><?php echo $result->added_date; ?></td>-->

                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate model"><i class="fa fa-check"></i></a>
                                        <?php } else { ?>
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate model"><i class="fa fa-exclamation-circle"></i></a>
                                        <?php } ?>
                                    </td>

                                    <td align="center">
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_model_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil"  data-original-title="Update"></i></a>                                        
                                        <a class="btn btn-danger btn-xs" onclick="delete_model(<?php echo $result->id; ?>)"><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>
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

<!--Model Add Modal -->
<div class="modal fade " id="model_add_modal" tabindex="-1" role="dialog" aria-labelledby="model_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Model</h4>
            </div>

            <form id="model_add_form" name="model_add_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="make">Make<span class="mandatory">*</span></label>
                        <select class="form-control" name="make" id="make" title="make" data-live-search="true">
                            <option value="">Select Make</option>
                            <?php foreach ($makes as $make) { ?>
                                <option value="<?php echo $make->id; ?>"><?php echo $make->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">                        
                        <label for="name">Model<span class="mandatory">*</span></label>
                        <input id="name" name="name" class="form-control" type="text" placeholder="Enter Model">
                    </div>

                    <span id="rtn_msg"></span>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->

<!--Model Edit Modal -->
<div  class="modal fade " id="model_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="model_edit_content">

        </div>
    </div>
</div>

<!--toastr-->
<script src="<?php echo base_url(); ?>backend_resources/assets/toastr-master/toastr.js"></script>
<script type="text/javascript">

                                        $('#vehicle_spec_menu').addClass('active open');

                                        $(document).ready(function () {

                                            //var manufacturer = $('#manufacturer').val();

                                            $('#model_table').dataTable();

                                            $("#model_add_form").validate({
                                                rules: {
                                                    name: "required"
                                                },
                                                messages: {
                                                    name: "Please enter a Model"
                                                }, submitHandler: function (form)
                                                {
                                                    $.post(site_url + '/vehicle_model/add_new_model', $('#model_add_form').serialize(), function (msg)
                                                    {
                                                        if (msg == 1) {
                                                            $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                            model_add_form.reset();
                                                            window.location = site_url + '/vehicle_model/manage_models';
                                                        } else {
                                                            $('#rtn_msg').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                                                        }
                                                    });


                                                }
                                            });
                                        });


                                        //model delete function
                                        function delete_model(id) {

                                            if (confirm('Are you sure want to delete this Model ?')) {

                                                $.ajax({
                                                    type: "POST",
                                                    url: site_url + '/vehicle_model/delete_model',
                                                    data: "id=" + id,
                                                    success: function (msg) {
                                                        if (msg == 1) {
                                                            $("#model_" + id).hide();
                                                            toastr.success("Successfully deleted !!", "VanUncle.lk");

                                                        } else if (msg == 2) {
                                                            alert('Cannot be deleted!');
                                                        }
                                                    }
                                                });
                                            }

                                        }


                                        //model public status changing function
                                        function change_publish_status(model_id, value, element) {

                                            var condition = 'Do you want to activate this model ?';
                                            if (value == 0) {
                                                condition = 'Do you want to deactivate this model ?';
                                            }

                                            if (confirm(condition)) {
                                                $.ajax({
                                                    type: "POST",
                                                    url: site_url + '/vehicle_model/change_publish_status',
                                                    data: "id=" + model_id + "&value=" + value,
                                                    success: function (msg) {
                                                        if (msg == 1) {
                                                            if (value == 1) {
                                                                $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + model_id + ',0,this)" title="click to deactivate model"><i class="fa fa-check"></i></a>');
                                                            } else {
                                                                $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + model_id + ',1,this)" title="click to activate model"><i class="fa fa-exclamation-circle"></i></a>');
                                                            }

                                                        } else if (msg == 2) {
                                                            alert('Error !!');
                                                        }
                                                    }
                                                });
                                            }
                                        }

                                        function display_edit_model_pop_up(model_id) {

                                            $.post(site_url + '/vehicle_model/load_edit_model_content', {model_id: model_id}, function (msg) {

                                                $('#model_edit_content').html('');
                                                $('#model_edit_content').html(msg);
                                                $('#model_edit_div').modal('show');
                                            });


                                        }
</script>














