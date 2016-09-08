$(document).ready(function(){
   
   jQuery.ajaxSetup({async: false});
   
   
   $('#discipline_add_form').validate({
       rules: {
            dis_eng: 'required'
        },
        messages: {
            dis_eng: 'Enter English Discipline name'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Please Wait... Adding Major Discipline.</div>');

            $.post(site_url + '/disciplines/saveDiscipline', $("#discipline_add_form").serialize(), function(msg) {
                if(msg==1){
                    window.location = site_url+"/disciplines/major_disciplines"; 
                $('#custom_alert').html('<div class="success canhide">Major Discipline successfully saved.</div>');
                 }else{
                     $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                 }
            });
        }
    });
    
    
    
    $(document).on('click','.delete_discipline',function(){
            
            var discipline_id = $(this).attr('id');
            if (confirm('Are you sure you want to delete this discipline ?')) {
           // $('#custom_alert').html('<div class="info canhide">Please Wait... Deleting Discipline.</div>');
            $.post(site_url + '/disciplines/deleteDiscipline','discipline_id='+discipline_id,function(msg){
                
                
                if(msg== 1)
                    {
                        
                        $('#custom_alert').html('<div class="success canhide">Major Discipline successfully deleted.</div>');
                        $('#row_'+discipline_id).hide();
                    }
                    
                    else if(msg==2)
                        {
                         
                    $('#custom_alert').html('<div class="warning">Already assigned to item types. Cannot be deleted.</div>');
                        }else{
                            $('#custom_alert').html('<div class="warning">Error deleting Major Discipline. Try again !</div>');
                        }
                
                
                    
            });
            }
        });
        
        
        
        
        $('#discipline_edit_form').validate({
       rules: {
            dis_eng: 'required'
        },
        messages: {
            dis_eng: 'Enter English Discipline name'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Please Wait... Updating Discipline Details.</div>');

            $.post(site_url + '/disciplines/updateDiscipline', $("#discipline_edit_form").serialize(), function(msg) {
                
                if(msg==1)
                    {
                        window.location = site_url+"/disciplines/major_disciplines";
                        $('#custom_alert').html('<div class="success canhide">Major Discipline successfully updated.</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="warning">Error updating Major Discipline. Try again !</div>');
                        }
                
                });
        }
    });
        
//        
//        $(document).on('change','#map_add_form #major_dis',function(){
//            $.post(site_url + "/mapping/loadSubDisciplines","dis_id="+ this.value,function(msg){
//                
//                    //alert(msg);
//                    $('#sub_dis').html(msg);
//                    
//             });
//        });
    
    
//    
//    $(document).on('change','#sub_dis',function(){
//            $.post(site_url + "/mapping/loadOccupations","sub_dis_id="+ this.value,function(msg){
//                
//                    //alert(msg);
//                    $('#occupatn').html(msg);
//                    
//             });
//        });
//        
        
//        
//        $('#map_add_form').validate({
//        rules: {
//            major_dis: 'required',
//            sub_dis: 'required',
//            occupatn: 'required'
//        },
//        messages: {
//            major_dis: 'Please select',
//            sub_dis: 'Please select',
//            occupatn: 'Please select'
//        },
//        submitHandler: function(form) {
//            $('#custom_alert').html('<div class="info canhide">Adding ...</div>');
//            
//            $.post(site_url + '/mapping/saveMap', $("#map_add_form").serialize(), function(msg) {
//                $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//             location.reload();
//                
//                
//            });
//        }
//    });
//    
//    $('#map_edit_form').validate({
//        rules: {
//            major_dis: 'required',
//            sub_dis: 'required',
//            occupatn: 'required'
//        },
//        messages: {
//            major_dis: 'Please select',
//            sub_dis: 'Please select',
//            occupatn: 'Please select'
//        },
//        submitHandler: function(form) {
//            $('#custom_alert').html('<div class="info canhide">Updating ...</div>');
//            
//            $.post(site_url + '/mapping/updateMap', $("#map_edit_form").serialize(), function(msg) {
//                
//                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
//                    {
//                        window.location = site_url+"/mapping/mapped_dis_institutes";
//                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                    }
//                    
//                    else
//                        {
//                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                        }
//                
//            });
//        }
//    });
//    
//    
//    $(document).on('click','.delete_mapping',function(){
//            
//            var map_id = $(this).attr('id');
//            
//            $('#custom_alert').html('<div class="info canhide">Please Wait. Deleting...</div>');
//            $.post(site_url + '/mapping/deleteMap','map_id='+map_id,function(msg){
//                
//                
//                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
//                    {
//                        //location.reload(); 
//                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                        $('#row_'+map_id).hide();
//                    }
//                    
//                    else
//                        {
//                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                        }
//                
//                
//                    
//            });
//            
//        });
        
        
    
    
});