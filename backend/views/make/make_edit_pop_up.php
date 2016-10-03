<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Make Quick edit</h4>
</div>

<form id="edit_manufacture_form" name="edit_manufacture_form" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Make Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $make->name; ?>">
            <input id="make_id"  name="make_id" type="hidden" value="<?php echo $make->id; ?>">

        </div>

    </div>
    <span id="rtn_msg_edit"></span>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>


<script type="text/javascript">

    $("#edit_manufacture_form").validate({
        rules: {
            name: "required"
        },
        message: {
            name: "Please enter a Make Name"
        }, submitHandler: function (form) {
            $.post('<?php echo site_url(); ?>/make/edit_make', $('#edit_manufacture_form').serialize(), function (msg) {
                if (msg == 1) {
                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                    window.location = site_url + '/make/manage_makes';
                } else {
                    $('#rtn_msg').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                }
            });
        }
    });

</script>

