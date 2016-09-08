/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
$(document).ready(function(){

//var base_url = "localhost/opa/";
//var site_url = "localhost/opa/index.php";

//var site_url = 'http://localhost/opa/backend.php/';

jQuery.ajaxSetup({async: false});
// add_related_disicipline = $("#add_related_disicipline").validate({

var DansArray = [];
$('.attribute_id').click(function(){
    var bol = $("input[type=checkbox][name=attribute_id]:checked").length >= 3;     
    $("input[type=checkbox][name=attribute_id]").not(":checked").attr("disabled",bol);
//    if(bol==true){
//      $("#discipline_id").attr('disabled',false); 
//    }else{
//        $("#discipline_id").attr('disabled',true);
//    }
     if($(this).is(':checked'))
  { 
      DansArray.push($(this).val());
  }  
  
  if($(this).is(':unchecked'))
  { removeItem=$(this).val();
    DansArray.splice($.inArray(removeItem, DansArray),1);

  }  
 
});

$('#add_related_disicipline').submit(function(){
    var discipline_id = $("#discipline_id").val();
    if(DansArray.length==3 && discipline_id!=""){
  $.post(site_url+'/combinations_logic/addDisciplineMap','id1='+DansArray[0]+'&id2='+DansArray[1]+'&id3='+DansArray[2]+'&discipline_id='+discipline_id,function(msg){
      alert(msg);
  }); }else if(DansArray.length<3){
        alert("Please select 3 attributes");return false;
    }else if(discipline_id==""){
      alert("Please select a Major Discipline");return false;
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
        var discipline_id = $("#discipline_id").val();
        var mapArray =$("input[type=checkbox][name=attribute_id]:checked").val();
            var length =$("input[type=checkbox][name=attribute_id]:checked").length;
             if($(this).is(':checked'))
  { 
      DansArray.push($(this).val());
  }  
           alert(DansArray);
                if(length==3 && discipline_id!=""){
                $.post(site_url+'/combinations_logic/editDisciplineMap','id1='+DansArray[0]+'&id2='+DansArray[1]+'&id3='+DansArray[2]+'&discipline_id='+discipline_id+'$map_id='+mapArray,function(msg){
                    alert(msg);
                  //  $("#discipline_id").attr('disabled',true);
                    
                    //alert(msg);
                    
                    if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url + "/combinations_logic/allDisciplineMap";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }

                else
                {
                            //alert(2);
                  //  $('input[type=checkbox][name=attribute_id]').attr('disabled', false);
                  //  $('input[type=checkbox][name=attribute_id]').attr('checked', false);
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
                });
                }
                else if(DansArray.length<3){
                    alert("Please select 3 attributes");return false;
                    }
        }
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
        var discipline_id = $("#discipline_id").val();
                if(DansArray.length==3 && discipline_id!=""){
                $.post(site_url+'/combinations_logic/addDisciplineMap','id1='+DansArray[0]+'&id2='+DansArray[1]+'&id3='+DansArray[2]+'&discipline_id='+discipline_id,function(msg){
                    
                  //  $("#discipline_id").attr('disabled',true);
                    
                    //alert(msg);
                    
                    if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url + "/combinations_logic/allDisciplineMap";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }

                else
                {
                            //alert(2);
                  //  $('input[type=checkbox][name=attribute_id]').attr('disabled', false);
                  //  $('input[type=checkbox][name=attribute_id]').attr('checked', false);
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
                });
                }
                else if(DansArray.length<3){
                    alert("Please select 3 attributes");return false;
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
        