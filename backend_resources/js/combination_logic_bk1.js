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
                $.post(site_url + '/combinations_logic/addDisciplineMap', $('#add_combination_logic').serialize()+'&'+$.param({ 'attribute_id': attribute_id }),function(msg){
                  alert(msg);
                  $('#custom_alert').html(msg);
                  
                  if(msg==1){
                        window.location = site_url + "/combinations_logic/allDisciplineMap";
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
    
    
    
});
function getDisciplineMap(discipline_id){
    
    var request = $.ajax({
                url: site_url+'/combinations_logic/showManageDisicplineMap',
                type: "POST",
                data: {discipline_id:discipline_id},
                dataType: "html"
                });   
              request.done(function(msg) {
                  $("#show_tabl").html(msg);
                    });
        }