<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Vehicle News
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a id="editable-sample_new" class="btn btn-shadow btn-primary" href="#vehicle_news_add_modal" data-toggle="modal">
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <table  class="display table table-bordered table-striped" id="vehicle_news_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Active Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($results as $result) {
                                ?>
                                <tr id="vehicle_news_<?php echo $result->id; ?>">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo $result->content ?></td>

                                    <td align="center">
                                        <?php if ($result->is_published) { ?>
                                            <a class="btn btn-success btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 0, this)" title="click to deactivate this vehicle news"><i class="fa fa-check"></i></a> 
                                        <?php } else { ?> 
                                            <a class="btn btn-warning btn-xs" onclick="change_publish_status(<?php echo $result->id; ?>, 1, this)" title="click to activate this vehicle news"><i class="fa fa-exclamation-circle"></i></a> 
                                        <?php } ?>
                                    </td>
                                    <td align="center">
    <!--                                        <a href="<?php echo site_url(); ?>/manufacture/manage_manufactures" class="btn btn-success btn-xs"><i class="fa fa-pencil"  data-original-title="Update"></i></a>-->
                                        <a class="btn btn-primary btn-xs" onclick="display_edit_vehicle_news_pop_up(<?php echo $result->id; ?>)"><i class="fa fa-pencil" data-original-title="Update"></i> </a>
                                        <a class="btn btn-danger btn-xs" onclick="delete_vehicle_news(<?php echo $result->id; ?>)" ><i class="fa fa-trash-o " title="" data-original-title="Remove"></i></a>

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

<!--add new vehicle news-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<div class="modal fade " id="vehicle_news_add_modal" tabindex="-1" role="dialog" aria-labelledby="vehicle_news_add_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Vehicle News</h4>
            </div>
            <form id="add_vehicle_news_form" name="add_vehicle_news_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Vehicle News<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text" placeholder="Enter Vehicle News">
                    </div>

                    <div class="form-group">
                        <label for="name">Content</label>
                        <textarea class="wysihtml5 form-control" id="content_text" name="content_text" rows="20">                       
                        </textarea>
                    </div>
                    <span id="rtn_msg_edit"></span>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--vehicle news edit modal-->
<div class="modal fade "  id="vehicle_news_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="vehicle_news_edit_content">

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript">
                                            $('#comments_menu').addClass('active open');

                                            $('.wysihtml5').wysihtml5({
                                                "font-styles": true, //Font styling, e.g. h1, h2, etc
                                                "color": true, //Button to change color of font
                                                "emphasis": true, //Italics, bold, etc
                                                "textAlign": true, //Text align (left, right, center, justify)
                                                "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers
                                                "blockquote": true, //Button to insert quote
                                                "link": true, //Button to insert a link
                                                "table": true, //Button to insert a table
                                                "image": true, //Button to insert an image
                                                "video": true, //Button to insert video
                                                "html": true //Button which allows you to edit the generated HTML
                                            });

                                            $(document).ready(function () {
                                                $('#vehicle_news_table').dataTable();

                                                $("#add_vehicle_news_form").validate({
                                                    rules: {
                                                        name: "required"
                                                    },
                                                    message: {
                                                        name: "Please enter a title"
                                                    }, submitHandler: function (form) {
                                                        $.post(site_url + '/vehicle_news/add_vehicle_news', $('#add_vehicle_news_form').serialize(), function (msg) {
                                                            if (msg == 1) {
                                                                $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                                                                add_vehicle_news_form.reset
                                                                window.location = site_url + '/vehicle_news/manage_vehicle_news';
                                                            } else {
                                                                $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                                                            }
                                                        });
                                                    }
                                                });
                                            });

                                            //change published status of the vehicle news

                                            function change_publish_status(vehicle_news_id, value, element) {
                                                var condition = 'Do you want to activate this vehicle news?';
                                                if (value == 0) {
                                                    condition = 'Do you want to deactivate this vehicle news?';
                                                }

                                                if (confirm(condition)) {
                                                    $.ajax({type: "POST",
                                                        url: site_url + '/vehicle_news/change_publish_status',
                                                        data: "id=" + vehicle_news_id + "&value=" + value,
                                                        success: function (msg) {

                                                            if (msg == 1) {

                                                                if (value == 1) {
                                                                    $(element).parent().html('<a class="btn btn-success btn-xs" onclick="change_publish_status(' + vehicle_news_id + ', 0, this)" title="click to deactivate vehicle news"><i class="fa fa-check"></i></a> ');
                                                                } else {
                                                                    $(element).parent().html('<a class="btn btn-warning btn-xs" onclick="change_publish_status(' + vehicle_news_id + ', 1, this)" title="click to activate vehicle news"><i class="fa fa-exclamation-circle"></i></a> ');
                                                                }
                                                            } else if (msg == 2) {

                                                            }

                                                        }
                                                    });
                                                }
                                            }

                                            //delete the vehicle news
                                            function delete_vehicle_news(id) {
                                                if (confirm('Are you sure want ot delete this comment ?')) {
                                                    $.ajax({
                                                        type: "POST",
                                                        url: site_url + '/vehicle_news/delete_vehicle_news',
                                                        data: "id=" + id,
                                                        success: function (msg) {
                                                            if (msg == 1) {
                                                                $('#vehicle_news_' + id).hide();
                                                                toastr.success("Successfully deleted !!", "AutoVille");
                                                            }
                                                            else if (msg == 2) {
                                                                alert('Cannot be deleted as it is already assigned to others. !!');
                                                            }

                                                        }
                                                    });
                                                }
                                            }


                                            //edit vehicle news
                                            function display_edit_vehicle_news_pop_up(vehicle_news_id) {
                                                $.post(site_url + '/vehicle_news/load_edit_vehicle_news_content', {vehicle_news_id: vehicle_news_id}, function (msg) {
                                                    $('#vehicle_news_edit_content').html('');
                                                    $('#vehicle_news_edit_content').html(msg);
                                                    $('#vehicle_news_edit_div').modal('show');
                                                });
                                            }

</script>

