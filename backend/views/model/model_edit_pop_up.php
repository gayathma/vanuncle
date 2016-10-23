<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Model Quick Edit</h4>
</div>
<form id="edit_vehicle_model_form" name="edit_vehicle_model_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="make">Make<span class="mandatory">*</span></label>
            <select class="form-control" name="make" id="make" title="make" data-live-search="true">
                <?php foreach ($makes as $make) { ?>
                    <option value="<?php echo $make->id; ?>" <?php
                        if ($make->id == $model->make_id) { ?> selected="true" <?php } ?> >
                        <?php echo $make->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Model<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $model->name; ?>">
            <input id="model_id"  name="model_id" type="hidden" value="<?php echo $model->id; ?>">
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    $("#edit_vehicle_model_form").validate({
        rules: {
            name: "required"
        },
        messages: {
            name: "Please enter a Model"
        }, submitHandler: function (form) {

            $.post(site_url + '/vehicle_model/edit_model', $('#edit_vehicle_model_form').serialize(), function (msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                    window.location = site_url + '/vehicle_model/manage_models';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');
                }
            });
        }

    });

</script>