$(document).ready(function(){
    
   // var base_url = "http://localhost/opa/";
    //var site_url = "http://localhost/opa/backend.php";
    
    jQuery.ajaxSetup({async: false});
    
    
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
                added_by:'required',
                
            },
            messages: {
                attribute_ref: 'Please enter a refence number',
                attribute_eng: 'Please enter an attribute name',
                added_by: 'Logged in user',
                
            },

            submitHandler: function(form) {
//if adding the organization
               // $('#user_msg').html('Saving Data');
                $.post(site_url+'/attributes/update',$('#edit_attributes_form').serialize(),function(msg){
                    alert(msg); return;
                 $('#user_msg').html(msg);
                });
//                $.post(
//                    document.Organization_form.submit(),
//                    function(msg){
//                        //alert(msg);
//                        if(jQuery.trim(msg.split(' ########## ')[1]) == 'success')
//                            {
//                        $('#custom_alert').html('<div class="alert-box ' + jQuery.trim(msg.split(' ########## ')[2]) + '">' + jQuery.trim(msg.split(' ########## ')[1]) + '</div>');
//                        //window.location.replace= site_url +'/organization/viewOrganization';
//                            }
//                    });
                }
            

        });
    
    
});
