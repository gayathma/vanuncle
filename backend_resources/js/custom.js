/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
$(document).ready(function(){
$("#discipline_id").attr('disabled',true); 
//var base_url = "localhost/opa/";
//var site_url = "localhost/opa/index.php";

var site_url = 'http://localhost/opa/backend.php/';

jQuery.ajaxSetup({async: false});
// add_related_disicipline = $("#add_related_disicipline").validate({
//     
//     
//      
// ;
var DansArray = [];
$('.attr_checks').click(function(){
    var bol = $("input[type=checkbox][name=attribute_eng]:checked").length >= 3;     
    $("input[type=checkbox][name=attribute_eng]").not(":checked").attr("disabled",bol);
    if(bol==true){
      $("#discipline_id").attr('disabled',false); 
    }else{
        $("#discipline_id").attr('disabled',true);
    }
     if($(this).is(':checked'))
  { 
      DansArray.push($(this).val());
  }  
  
  if($(this).is(':unchecked'))
  { removeItem=$(this).val();
    DansArray.splice($.inArray(removeItem, DansArray),1);

  }  
 
});

//$("#discipline_id").change(function(){
//    discipline_id = $("#discipline_id").val();
//    $.post(site_url+'combinations_logic/checkAvailableDiscipline','id1='+DansArray[0]+'&id2='+DansArray[1]+'&id3='+DansArray[2]+'&discipline_id='+discipline_id,function(msg){
//      alert(msg);
//  });
//});
$('#add_related_disicipline').submit(function(){
    var discipline_id = $("#discipline_id").val();
    if(DansArray.length==3 && discipline_id!=""){
  $.post(site_url+'combinations_logic/addDisciplineMap','id1='+DansArray[0]+'&id2='+DansArray[1]+'&id3='+DansArray[2]+'&discipline_id='+discipline_id,function(msg){
      alert(msg);
  }); }else if(DansArray.length<3){
        alert("Please select 3 attributes");return false;
    }else if(discipline_id==""){
      alert("Please select a Major Discipline");return false;
    }
});

});