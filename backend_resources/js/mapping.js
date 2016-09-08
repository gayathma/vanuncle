$(document).ready(function(){
   
   jQuery.ajaxSetup({async: false});
   
   $(document).on('change','#map_add_form #major_dis',function(){
            $.post(site_url + "/mapping/loadSubDisciplines","dis_id="+ this.value,function(msg){
                
                    //alert(msg);
                    $('#sub_dis').html(msg);
                    
             });
        });
        
        $(document).on('change','#sub_dis',function(){
            $.post(site_url + "/mapping/loadOccupations","sub_dis_id="+ this.value,function(msg){
                
                    //alert(msg);
                    $('#occupatn').html(msg);
                    
             });
        });
        
        $('#map_add_form').validate({
        rules: {
            major_dis: 'required',
            sub_dis: 'required',
            occupatn: 'required',
            'institute_check[]': 'required'
        },
        messages: {
            major_dis: 'Please select',
            sub_dis: 'Please select',
            occupatn: 'Please select',
            'institute_check[]': 'Please select atleast one institution.'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Adding ...</div>');
            
            $.post(site_url + '/mapping/saveMap', $("#map_add_form").serialize(), function(msg) {
                $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
             location.reload();
                
                
            });
        }
    });
    
    $('#map_edit_form').validate({
        rules: {
            major_dis: 'required',
            sub_dis: 'required',
            occupatn: 'required'
        },
        messages: {
            major_dis: 'Please select',
            sub_dis: 'Please select',
            occupatn: 'Please select'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Updating ...</div>');
            
            $.post(site_url + '/mapping/updateMap', $("#map_edit_form").serialize(), function(msg) {
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        window.location = site_url+"/mapping/mapped_dis_institutes";
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
            });
        }
    });
    
    
    $(document).on('click','.delete_mapping',function(){
            
            var map_id = $(this).attr('id');
            if (confirm('Are you sure you want to delete this attribute ?')) {
            $('#custom_alert').html('<div class="info canhide">Please Wait. Deleting...</div>');
            $.post(site_url + '/mapping/deleteMap','map_id='+map_id,function(msg){
                
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        //location.reload(); 
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        $('#row_'+map_id).hide();
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
                
                    
            });
    }
        });
    
    
});