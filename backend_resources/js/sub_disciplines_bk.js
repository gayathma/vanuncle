$(document).ready(function() {


       add_sub_discipline_validate = $('#add_sub_discipline').validate({
    
    highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                category_eng: 'required',
                //attribute_id:'required'
               
            },
            messages: {
                category_eng: 'Please enter the sub discipline in English',
               // attribute_id: 'Please select a attribute'
                
            },

            submitHandler: function(form) {
                
                $.post(site_url+'/sub_discipline/addSubDiscipline',$('#add_sub_discipline').serialize(),function(msg){
              
                    if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url + "/Sub_discipline/manageSubDisciplines";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
                });
                
        }
    });


  edit_subdiscp_form_validate = $('#edit_subdiscp_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                category_eng:'required'
                
            },
            messages: {
                category_eng: 'Please enter a Category name',
               // attribute_eng: 'Please enter an attribute name',
               // added_by: 'Logged in user',
                
            },

            submitHandler: function(form) {

                $.post(site_url+'/sub_disciplines/updateSubDisciplines',$('#edit_subdiscp_form').serialize(),function(msg){ 
                     alert(msg);   if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url + "/sub_disciplines/manage_sub_disciplines";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
                });      
                }
            

        });
    


});


function test(){
    
    alert(1);
   
    
}

function deleteSubDiscipline(id){
   
		
    if (confirm('Are you sure want to delete this Discipline Sub Category ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/sub_disciplines/deleteSubDiscipline',
            data: "id=" + id,
            success: function (msg) {
              //  alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#attr_id_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Item Types');
                }
            }

        });

    }

		
		
}



