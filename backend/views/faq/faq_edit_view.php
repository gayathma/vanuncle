<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">FAQ Edit Answer</h4>
</div>
<form id="edit_FAQ_type_form" name="edit_FAQ_type_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Question</label>
            <br>
            <input id="answer" class="form-control" name="answer" type="text" value="<?php echo $faq->question ?>" readonly="true">
            <br>
            <label for="name">Answer for this Question</label>
            <input id="answer" class="form-control" name="answer" type="text" value="<?php echo $faq->answer; ?>">
            <input id="faq_id"  name="faq_id" type="hidden" value="<?php echo $faq->id; ?>">
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript">

    //edit body type form validation
    $("#edit_FAQ_type_form").validate({
        rules: {
            name: "required"
        },
        messages: {
            name: "Please enter the Answer"
        }, submitHandler: function (form)
        {
            $.post(site_url + '/faq/update_faq_answer', $('#edit_FAQ_type_form').serialize(), function (msg)
            {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully Updated!!.</strong></div>');

                    window.location = site_url + '/faq/manage_faq';
                } else {
                    $('#rtn_msg_edit').html('<div class="alert alert-block alert-danger fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>An error occured.</strong></div>');

                }
            });
        }
    });

</script>