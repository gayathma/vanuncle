$(document).ready(function() {


    jQuery.ajaxSetup({async: false});


    add_institute_form_validate = $('#add_institute_form').validate({
        rules: {
            training_path_id:'required',
            institute_name_eng: 'required',
            institute_address_eng: 'required'
        },
        messages: {
            training_path_id:'Please select a Training path',
            institute_name_eng: 'Please enter Institute name in English',
            institute_address_eng:'Please specify the address'
        },
         submitHandler: function(form) {

            $.post(site_url + '/institutes/saveInstitutes', $('#add_institute_form').serialize(), function(msg) { 
                //alert(msg);
                if (msg == 1)
                {
                    window.location = site_url + "/institutes/manage_institutes";
                    $('#custom_alert').html('<div class="success canhide">Institute Details Successfully Saved !</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error adding Institute. Try again !</div>');
                }
            });

       
        }


    });
    
    $(document).on('click','.delete_institute',function(){
            
            var institute_id = $(this).attr('id');
            if (confirm('Are you sure you want to delete this institute ?')) {
            $.post(site_url + '/institutes/deleteInstitute','attribute_id='+institute_id,function(msg){
                
                
                if(msg==1)
                    {
                       
                        $('#custom_alert').html('<div class="success canhide">Institute information successfully Deleted.</div>');
                         $('#attr_id_'+institute_id).hide();
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                        }
                
                
                    
            }); }
            
        });
    

        
        edit_institute_form_validate = $('#edit_institute_form').validate({
        rules: {
            training_path_id:'required',
            institute_name_eng: 'required',
            institute_address_eng: 'required'
        },
        messages: {
            training_path_id:'Please select a Training path',
            institute_name_eng: 'Please enter Institute name in English',
            institute_address_eng:'Please specify the address'
        },
         submitHandler: function(form) {

            $.post(site_url + '/institutes/updateInstitutes', $('#edit_institute_form').serialize(), function(msg) {
                if (msg == 1)
                {
                    $('#user_msg').html('<div class="success canhide">Institute information successfully updated.</div>');
                    window.location = site_url + "/institutes/manage_institutes";
                }

                else
                {
                    $('#user_msg').html('<div class="warning">Error updating institute information. Try again !</div>');
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

                if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
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


function test() {

    alert(1);


}

function deleteInstitute(id) {

    if (confirm('Are you sure you want to delete this Institute ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/institutes/deleteInstitute',
            data: "id=" + id,
            success: function(msg) {
                //  alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#attr_id_' + id).hide();
                    $('#custom_alert').html('<div class="success canhide">Institute successfully Deleted.</div>');
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Item Types');
                    $('#custom_alert').html('<div class="warning">Cannot be deleted as it is already assigned to Item Types</div>');
                }else{
                    $('#custom_alert').html('<div class="warning">Error Deleting Institute. Try again !</div>');
                }
            }

        });

    }



}