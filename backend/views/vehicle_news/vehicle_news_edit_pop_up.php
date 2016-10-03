<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Vehicle News Quick edit</h4>
</div>
<form id="edit_vehicle_news_form" name="edit_vehicle_news_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Vehicle News<span class="mandatory">*</span></label>
            <input id="title" class="form-control" name="title" type="text" value="<?php echo $vehicle_news->title; ?>">
            <input id="vehicle_news_id"  name="vehicle_news_id" type="hidden" value="<?php echo $vehicle_news->id; ?>">
        </div>

        <div class="form-group">
            <label for="name">Content</label>
            <textarea class="wysihtml5 form-control" id="content_text" name="content_text" rows="20">
                <?php echo $vehicle_news->content; ?>
<!--             <input id="vehicle_news_content"  name="vehicle_news_content" type="hidden" value="<?php echo $vehicle_news->content; ?>              -->
            </textarea>
        </div>
        <span id="rtn_msg_edit"></span>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</form>

<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript">
    //edit vehicle news form validation

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

    $("#edit_vehicle_news_form").validate({
        rules: {
            name: "required"
        },
        message: {
            name: "Please enter a title"
        }, submitHandler: function(form) {
            $.post(site_url + '/vehicle_news/edit_vehicle_news', $('#edit_vehicle_news_form').serialize(), function(msg) {
                if (msg == 1) {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');
                    window.location = site_url + '/vehicle_news/manage_vehicle_news';
                }
                else {
                    $('#rtn_msg_edit').html('<div class="alert alert-success fade in"><button class="close close-sm" type="button" data-dismiss="alert"><i class="fa fa-times"></i></button><strong>Successfully saved!!.</strong></div>');

                }
            });
        }
    });
</script>
