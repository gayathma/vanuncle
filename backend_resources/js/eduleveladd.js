$(document).ready(function(){
    
   jQuery.ajaxSetup({async: false});
   
   
    // add new subjects and grades
   
   $("#edu_sub_add_btn").click(function(){
       alert('thats it'); return;
             //var newRow = '<div id="sub_grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'"><label for="edu_year" class="col-lg-3 control-label"></label><div class="col-lg-3">Subject:<input type="text" class="form-control" name="edu_subjects[]" id="edu_subjects" placeholder="Subject"></div><div class="col-lg-3">Grade:<input type="text" class="form-control" name="edu_grades[]" id="edu_grades" placeholder="Grade"></div><div class="col-lg-1"><br/><input id="grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'" type="button" class="btn btn-primary button_sub_remove" name="edu_sub_rmv_btn" value="-" /></div></div>';
             var newRow2 = '<div id="sub_grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'"><table border="0"><tr><td>Subject</td><td>Grade</td><td>&nbsp;</td></tr><tr><td><input type="text" id="edu_subjects" name="edu_subjects[]" class="text medium"><div class="elVal"></div></td><td><input type="text" id="edu_grades" name="edu_grades[]" class="text medium"><div class="elVal"></div></td><td><input id="grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'" type="button" class="button def button_sub_remove" name="edu_sub_rmv_btn" value="-" /></td></tr></table></div>';
             $('#form_div').append(newRow2);
             $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) + 1);
             //$('#edit').wrap('<div class="theDiv" />');
               });
               
    
    
    
});