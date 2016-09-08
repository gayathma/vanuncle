$(document).ready(function() {


    jQuery.ajaxSetup({async: false});


    add_edu_form_validate = $('#add_edu_form').validate({
        
        rules: {
            edu_level_eng: 'required'
            
        },
        messages: {
            edu_level_eng: 'Please enter Education level in English'
        },
        submitHandler: function(form) {

            
             $.post(site_url+'/edulevel/saveEdulevel',$('#add_edu_form').serialize(),function(msg){
              //alert(msg);
                    if (msg==1)
                {
                    window.location = site_url + '/edulevel/manage_edulevels';
                     $('#custom_alert').html('<div class="success canhide">Education Level Successfully Saved !</div>');
                }

                else
                {
                   $('#custom_alert').html('<div class="warning">Error adding Education Level. Try again !</div>');
                }
                });
            

        }


    });


    $('#edit_edu_level').validate({
        rules: {
            subject_name_eng: 'required'
        },
        messages: {
            subject_name_eng: 'Enter English Subject Name'
        },
        submitHandler: function(form) {
 
            $('#custom_alert').html('<div class="info canhide">Please Wait... Updating Subject Details.</div>');

            $.post(site_url + '/edulevel/updateEduLevel', $("#edit_edu_level").serialize(), function(msg) {

                if (msg == 1)
                {
                    window.location = site_url + "/edulevel/manage_edulevels";
                    $('#custom_alert').html('<div class="success canhide">Education Level successfully Updated.</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Updating Education Level. Try again !</div>');
                }

            });
        }
    });


});


function test(){
    
    alert(1);
   
    
}





function deleteEduLevel(id){
   
   // alert(id);
    if (confirm('Are you sure you want to delete this Education Level ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/edulevel/deleteEduLevel',
            data: "id=" + id,
            success: function (msg) {
              //  alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#edu_level_id_'+id).hide();
                    $('#custom_alert').html('<div class="success canhide">Education Level successfully deleted.</div>');
                }
                else if (msg == 2) {
                    
                    $('#custom_alert').html('<div class="warning">Cannot be deleted as it is already assigned to Item Types</div>');
                }else{
                    $('#custom_alert').html('<div class="warning">Error deleting Education Level. Try again !.</div>');
                }
            }

        });
       
         
        
        

    }

		
		
}
/////
 

