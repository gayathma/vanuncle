
<script type="text/javascript">

    $(function() {
        var slider_no = $('#slider_no').val();
        var btnUpload = $('#slider_upload');
        var status = $('#status');
        new AjaxUpload(
                btnUpload,
                {
                    action: site_url + '/slider_controller/uploadsliderimage/'
                            + slider_no,
                    name: 'uploadfile',
                    onSubmit: function(file, ext) {
                        if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                            // extension is not allowed
                            // status.text('Only JPG, PNG or GIF files are
                            // allowed');
                            $("#files").html(
                                    "Only JPG, PNG or GIF files are allowed");
                            return false;
                        }
                        // status.text('Uploading...Please wait');
                        // $("#sta").html("<img src='loader.gif' />");

                    },
                    onComplete: function(file, response) {

                        //	alert(response);
                        // On completion clear the status
                        // status.text('');
                        $("#files").html("Uploading....");
                        // Add uploaded file to list
                        if (response != "error") {
                            $('#files').html(
                                    '<img src="' + base_url + '/uploads/sliders/'
                                    + slider_no + '/' + response
                                    + '" width="250" /><br />');
                            picFileName = response;

                            document.getElementById('picFileName').value = response;

                        } else {
                            $('#files').html('Error');

                            // $('<li></li>').appendTo('#files').text(file).addClass('error');
                        }
                    }
                });

    });




</script>

<div class="kubrick">
    <div class="top">
        <h3><?php echo $inner_title; ?></h3>


        <!-- tabs menu -->
        <ul class="tabs"> 
            <li><a class="selected" href="#tables">Manage</a></li> 
            <li><a href="#forms">Add a Slider</a></li>

        </ul>
        <div class="clear"></div>


    </div>

    <div class="wrap">



        <div id="tables">




            <div class="space"></div>


            <!-- table -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="table-header">

                    <th width="18%"><h5>Slider ID</h5></th>
                <th width="18%"><h5>Title</h5></th>
                <th width="18%"><h5>Slider Image</h5></th>
                <th width="18%"><h5>Slider Order (DESC)</h5></th>
                <th width="5%">&nbsp;</th>
                </tr>
                <?php
                foreach ($sliders as $rowsliders) {
                    ?> 


                    <tr id="slider_<?php echo $rowsliders->slider_id; ?>">

                        <td><?php echo $rowsliders->slider_id; ?></td>
                        <td><?php echo $rowsliders->slider_title; ?></td>
                        <td><img width="250" src="<?php echo base_url(); ?>uploads/sliders/<?php echo $rowsliders->slider_no; ?>/<?php echo $rowsliders->slider_image; ?>"></td>
                        <td><input type="text" value="<?php echo $rowsliders->slider_order; ?>" size="1" maxlength="2" id="slider_ordr_<?php echo $rowsliders->slider_id; ?>">
                            <a style="cursor: pointer;" onclick="savesliderorder(<?php echo $rowsliders->slider_id; ?>)" >Save </a>

                        </td>
                        <td class="controls">
                            <a style="cursor: pointer;" onclick="deletetourpackage(<?php echo $rowsliders->slider_id; ?>)" class="delete" title="Delete">&nbsp;</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>




        <div id="forms">

            <form action="#" method="post">
                <fieldset>






                    <label>Slider</label>  <small>Image Size : 1920px X 720px</small>            
                    <div id="slider_upload" ><span>Upload<span></div><div id="sta"></div>
                                <input type="hidden" id="picFileName">
                                <input type="hidden" id="slider_no" value="<?php echo $slider_no; ?>">



                                <span id="files" ></span>


                                <label>Slider Order</label>
                                <input name="slider_order" id="slider_order" class="text small" type="text" value="1" />

                                <label>Title</label>
                                <input name="slider_title" id="slider_title" class="text large" type="text"  />

                                <p><span id="rtn_msg"></span></p>



                                <p>
                                    <input class="button def" type="button" value="Save" onclick="addsliderimage()"/>

                                </p>
                                </fieldset>	
                                </form>
                                </div>



                                </div>
                                </div>


                                <script type="text/javascript">
                                    $('#sliders').addClass('selected');
                                </script>




