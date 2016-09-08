


$(document).ready(function() {


    jQuery.ajaxSetup({async: false});


    add_train_form_validate = $('#add_train_form').validate({
        rules: {
            training_path_eng: 'required'

        },
        messages: {
            training_path_eng: 'Please enter Training Path in English'
        },
        submitHandler: function(form) {


            $.post(site_url + '/trainingpath/saveTrainingpath', $('#add_train_form').serialize(), function(msg) {


                { if(msg==1){
                    
                    window.location = site_url + "/trainingpath/manage_trainningpaths";
                    $('#custom_alert').html('<div class="success canhide">Training Path Successfully Saved</div>');
                }else{
                    $('#custom_alert').html('<div class="warning">Saving Training Path. Try again!</div>');
                }
                    // $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }


            });


        }


    });




    edit_train_form_validate = $('#edit_train_form').validate({
        rules: {
            training_path_eng: 'required'

        },
        messages: {
            training_path_eng: 'Please enter Training Path in English'
        },
        submitHandler: function(form) {

            $.post(site_url + '/trainingpath/updateTrainingpath', $('#edit_train_form').serialize(), function(msg) {
                //alert(msg);

                if (msg == 1)
                {
                    $('#user_msg').html('<div class="success canhide">Updated Succuessfully !</div>');
                    window.location = site_url + "/trainingpath/manage_trainningpaths";
                }

                else
                {
                    $('#user_msg').html('<div class="warning">Error Updating Training path. Try again!</div>');
                }

            });

        }


    });


    $('#edit_edu_form').validate({
        rules: {
            subject_name_eng: 'required'
        },
        messages: {
            subject_name_eng: 'Enter English Subject Name'
        },
        submitHandler: function(form) {

            $('#custom_alert').html('<div class="info canhide">Please Wait... Updating Subject Details.</div>');

            $.post(site_url + '/subject/subject_edit', $("#edit_edu_form").serialize(), function(msg) {

                if (msg ==1)
                {
                    window.location = site_url + "/subject/manage_subject";
                    $('#custom_alert').html('<div class="success canhide">Sccuessfully Updated Subject Details</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Updating Subject Details. Try gain!</div>');
                }

            });
        }
    });


});

$(document).on('click', '.delete_training_path', function() {

    var training_path_id = $(this).attr('id');
    if (confirm('Are you sure you want to delete this Training path ?')) {
        $.post(site_url + '/trainingpath/deleteTrainingpath', 'training_path_id=' + training_path_id, function(msg) {

            if (msg==1)
            {

                $('#custom_alert').html('<div class="success canhide">Training path Successfully Deleted.</div>');
                $('#attr_id_' + training_path_id).hide();
            }

            else
            {
                $('#custom_alert').html('<div class="warning">Deleting training path. Try again!</div>');
            }



        });
    }

});

function test() {

    alert(1);


}

function deleteTrainingpath(id) {

    if (confirm('Are you sure you want to delete this Training Path ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/trainingpath/deleteTrainingpath',
            data: "id=" + id,
            success: function(msg) {
                //  alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#attr_id_' + id).hide();
                    $('#custom_alert').html('<div class="success canhide">Training path successfully Deleted.</div>');
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Item Types');
                    $('#custom_alert').html('<div class="warning">Cannot be deleted as it is already assigned to Item Types</div>');
                }else{
                    $('#custom_alert').html('<div class="warning">Deleting training path. Try again !</div>');
                }
            }

        });

    }



}