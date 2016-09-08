
$(document).ready(function(){
    
    
    
    
   // var base_url = "http://localhost/opa/";
    //var site_url = "http://localhost/opa/backend.php";
    
        jQuery.ajaxSetup({async: false});
    
    $(document).on('click','.delete_attributes',function(){
            
            var attribute_id = $(this).attr('id');
            if (confirm('Are you sure you want to delete this attribute ?')) {
            $.post(site_url + '/attributes/deleteAttribute','attribute_id='+attribute_id,function(msg){
                
               // alert(msg);
                if(msg== 1)
                    {
                       
                       // $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                         
                         $('#custom_alert').html('<div class="success canhide">Attribute successfully Deleted.</div>');
                         $('#attr_id_'+attribute_id).hide();
                    }
                    
                    else if(msg==2) {
                           
                            $('#custom_alert').html('<div class="warning">Cannot be deleted as it is already assigned to Item Types</div>');
                          //  $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }else{
                             $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                        }
                
                
                    
            });}
            
        });
    
    
    edit_attributes_form_validate = $('#edit_attributes_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                attribute_ref: 'required',
                attribute_eng: 'required',
                added_by:'required'
                
            },
            messages: {
                attribute_ref: 'Please enter a reference number',
                attribute_eng: 'Please enter an attribute name',
                added_by: 'Logged in user'
                
            },

            submitHandler: function(form) {

                $.post(site_url+'/attributes/update',$('#edit_attributes_form').serialize(),function(msg){ 
                     if (msg ==1)
                {
                    
                    
                    $('#custom_alert').html('<div class="success canhide">Attribute successfully Updated.</div>');
                    window.location = site_url + "/attributes/manage_attributes";
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
                });      
                }
            

        });
    
    
    
    
    add_attributes_form_validate = $('#add_attributes_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                attribute_ref: 'required',
                attribute_eng: 'required',
                added_by:'required'
                
            },
            messages: {
                attribute_ref: 'Please enter a reference number',
                attribute_eng: 'Please enter an attribute name',
                added_by: 'Logged in user'
                
            },

            submitHandler: function(form) {
//if adding the organization
               // $('#user_msg').html('Saving Data');
                $.post(site_url+'/attributes/attinput',$('#add_attributes_form').serialize(),function(msg){
                   
                     if (msg==1)
                {
                    $('#custom_alert').html('<div class="success canhide">Attribute successfully Saved.</div>');
                        window.location = site_url + "/attributes/manage_attributes";
                    
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
                });
               }
            

        });
    
    
});
