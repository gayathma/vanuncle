/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
     jQuery.ajaxSetup({async: false});
     $('.attribute_id').click(function(){
       var bol = $("input[type=checkbox][name=attribute_id]:checked").length >= 3;     
    $("input[type=checkbox][name=attribute_id]").not(":checked").attr("disabled",bol);
    });
     
     add_combination_logic = $('#add_combination_logic').validate({

    highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                
                discipline_id:{required: true}
            },
            messages: {
                
                discipline_id: 'Please select a Discipline'
                
            },
       // alert(2);
            submitHandler: function(form) {
                
                var checkLength =$("input[type=checkbox][name=attribute_id]:checked").length;
                
                var attribute_id=[];
                if(checkLength==3){
                    $('input:checkbox[name=attribute_id]:checked').each(function() 
                        {
                            if($(this).is(':checked'))
                                attribute_id.push($(this).val());
                        }); 

                $.post(site_url + '/combination_and_logic/saveAttributeDisciplineMap', $('#add_combination_logic').serialize()+'&'+$.param({ 'attribute_id': attribute_id }),function(msg){
                   if(msg==1){
                        window.location = site_url + "/combination_and_logic/manage_combination_and_logic";
                    $('#custom_alert').html('<div class="success canhide">Combination Logic successfully saved.</div>');
                  
            }else if(msg==2){
                       $('#custom_alert').html('<div class="warning">Combination Logic already exist. Try again !</div>');
                    }else{
                        $('#custom_alert').html('<div class="warning">Error in Saving Combination Logic. Try again !</div>');
                    }
        });
    }else{
                $('#custom_alert').html('<div class="warning">Please select 3 attributes. Try again !</div>');
            }
            }
            
});
     
     
     
     edit_combination_logic = $('#edit_combination_logic').validate({

    highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                
                discipline_id:{required: true}
            },
            messages: {
                
                discipline_id: 'Please select a Discipline'
                
            },
       // alert(2);
            submitHandler: function(form) {
                
                var checkLength =$("input[type=checkbox][name=attribute_id]:checked").length;
                
                var attribute_id=[];
                if(checkLength==3){
                    $('input:checkbox[name=attribute_id]:checked').each(function() 
                        {
                            if($(this).is(':checked'))
                                attribute_id.push($(this).val());
                        }); 

                $.post(site_url + '/combination_and_logic/updateAttributeDisciplineMap', $('#edit_combination_logic').serialize()+'&'+$.param({ 'attribute_id': attribute_id }),function(msg){
                   //alert(msg);
                    if(msg==1){
                        window.location = site_url + "/combination_and_logic/manage_combination_and_logic";
//ok
                
                 $('#custom_alert').html('<div class="success canhide">Combination Logic successfully updated.</div>');
                  
                  
                       
                    }else if(msg==2){
                       $('#custom_alert').html('<div class="warning">Combination Logic already exist. Try again !</div>');
                    }else{
                        $('#custom_alert').html('<div class="warning">Error in Updating Combination Logic. Try again !</div>');
                    }
              
        });
        
        }else{
                $('#custom_alert').html('<div class="warning">Please select 3 attributes. Try again !</div>');
                }
            }
            
    });
    $(document).on('click', '.delete_combination', function() {
        
        var map_id = $(this).attr('id');
        if (confirm('Are you sure you want to delete this Combination and logic?')) {
            $.post(site_url + '/combination_and_logic/unpublishAttributeDisciplineMap', 'map_id=' + map_id, function(msg) {

                
                if (msg ==1)
                {

                    $('#custom_alert').html('<div class="success canhide">Combination and logic successfully Deleted.</div>');
                    $('#row_' + map_id).hide();
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }



            });
        }

    });
});