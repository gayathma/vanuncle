$(document).ready(function() {


    jQuery.ajaxSetup({async: false});


    add_subject_form_validate = $('#add_subject_form').validate({
        
        rules: {
            subject_name_eng: 'required'
            
        },
        messages: {
            subject_name_eng: 'Enter English Subject Name'
        },
        submitHandler: function(form) {

            $.post(site_url + '/subject/subject_input', $('#add_subject_form').serialize(), function(msg) {
                
                {
                  if(msg==1){ 
                      window.location = site_url + '/subject/manage_subject';
                 
                   
                    $('#custom_alert').html('<div class="success canhide">Subject Details Successfully Saved !</div>');
                  }else{
                      $('#custom_alert').html('<div class="warning">Error adding Subject. Try again !</div>');
                  }}

            });

        }


    });


    $('#edit_subject_form').validate({
        rules: {
            subject_name_eng: 'required'
        },
        messages: {
            subject_name_eng: 'Enter English Subject Name'
        },
        submitHandler: function(form) {
 
            $('#custom_alert').html('<div class="info canhide">Please Wait... Updating Subject Details.</div>');

            $.post(site_url + '/subject/subject_edit', $("#edit_subject_form").serialize(), function(msg) {

                if (msg== 1)
                {
                    window.location = site_url + "/subject/manage_subject";
                    $('#custom_alert').html('<div class="success canhide">Subject successfully Updated.</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error updating Major Subject. Try again !</div>');
                }

            });
        }
    });


});


function deleteSubject(id) {

    if (confirm('Are you sure you want to delete this Subject ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/subject/deleteSubject',
            data: "id=" + id,
            success: function(msg) {
                //  alert(msg);
                if (msg == 1) {
                   
                    $('#subject_id_' + id).hide();
                    $('#custom_alert').html('<div class="success canhide">Subject successfully Deleted.</div>');
                    
                }
                else if (msg == 2) {
                    
                     $('#custom_alert').html('<div class="warning">Cannot be deleted as it is already assigned to Item Types</div>');
                }else{
                    $('#custom_alert').html('<div class="warning">Error Deleting Major Subject. Try again !</div>');
                }
            }

        });

    }



}