$(document).ready(function() {
    
    jQuery.ajaxSetup({async: false});
    
    
     $(document).on('click','#delete_occupation',function(){
            alert(delete_occupation);
            
        });
       
    
    add_occu_form_validate = $('#add_occu_form').validate({
        
        rules: {
            sub_category_id:'required',
            occupation_eng: 'required',
            edu_level_id:'required',
            job_dev_path_eng:'required',
            jd_pdf_eng:'required'
        },
        messages: {
            sub_category_id: 'Please select a sub discipline',
            occupation_eng: 'Please enter Occupation in English',
            edu_level_id: 'Please select a Education level',
            jd_pdf_eng: 'Please choose a PDF file',
            job_dev_path_eng:'Please type the Description'
            
        },
        submitHandler: function(form) {
        	
  
            
            $.post(site_url + '/occupations/saveOccupation', $('#add_occu_form').serialize(), function(msg) {
              	//alert(msg);  
                if (msg== 1)
                {
                  window.location = site_url + "/occupations/manage_occupations";
                    $('#custom_alert').html('<div class="success canhide">Occupation successfully Saved.</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
            });

        }


    });
    
    
    edit_occu_form_validate = $('#edit_occu_form').validate({
        
        rules: {
            sub_category_id:'required',
            occupation_eng: 'required',
            edu_level_id:'required',
            job_dev_path_eng:'required',
            jd_pdf_eng:'required'
        },
        messages: {
            sub_category_id: 'Please select a sub discipline',
            occupation_eng: 'Please enter Occupation in English',
            edu_level_id: 'Please select a Education level',
            jd_pdf_eng: 'Please choose a PDF file',
            job_dev_path_eng:'Please type the Description'
            
        },
        submitHandler: function(form) {
            
            $.post(site_url + '/occupations/updateOccupation', $('#edit_occu_form').serialize(), function(msg) {
                
                if (msg==1)
                {
                    window.location = site_url + "/occupations/manage_occupations";
                    $('#custom_alert').html('<div class="success canhide">Occupation successfully Updated.</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
            });

        }


    });
    
   
});
function delete_occupation(id){
    var occupation_id = id;
            if (confirm('Are you sure you want to delete this occupation ?')) {
            $.post(site_url + '/occupations/deleteOccupation','occupation_id='+occupation_id,function(msg){
                
                if(msg==1)
                    {
                       
                        $('#custom_alert').html('<div class="success canhide">Occupation successfully Deleted</div>');
                         $('#attr_id_'+occupation_id).hide();
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                        }
                
            });}
            
}