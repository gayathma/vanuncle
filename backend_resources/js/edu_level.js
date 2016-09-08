$(document).ready(function(){
   
   jQuery.ajaxSetup({async: false});
   
   
   // add new subjects and grades
   
   $("#edu_sub_add_btn").click(function(){
       //alert('thats it'); return;
             //var newRow = '<div id="sub_grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'"><label for="edu_year" class="col-lg-3 control-label"></label><div class="col-lg-3">Subject:<input type="text" class="form-control" name="edu_subjects[]" id="edu_subjects" placeholder="Subject"></div><div class="col-lg-3">Grade:<input type="text" class="form-control" name="edu_grades[]" id="edu_grades" placeholder="Grade"></div><div class="col-lg-1"><br/><input id="grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'" type="button" class="btn btn-primary button_sub_remove" name="edu_sub_rmv_btn" value="-" /></div></div>';
             var newRow2 = '<div id="sub_grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'"><table border="0"><tr><td>Subject</td><td>Grade</td><td>&nbsp;</td></tr><tr><td><input type="text" id="edu_subjects" name="edu_subjects[]" class="text medium"><div class="elVal"></div></td><td><input type="text" id="edu_grades" name="edu_grades[]" class="text medium"><div class="elVal"></div></td><td><input id="grade_div_'+(parseInt($('.No_of_subjects').val()) + 1)+'" type="button" class="button def button_sub_remove" name="edu_sub_rmv_btn" value="-" /></td></tr></table></div>';
             $('#form_div').append(newRow2);
             $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) + 1);
             //$('#edit').wrap('<div class="theDiv" />');
               });
               
               
               // delete subjects
               
               $(document).on('click','.button_sub_remove',function(){
                   var div_id = 'sub_'+$(this).attr('id');
                   $('#'+div_id).remove();
                   $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) - 1);
               });
               
               
               
               
               edu_add_form_validate = $('#edu_add_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                edu_level: 'required',
                edu_class: {
                    required: true,
                    digits: true
                },
                edu_year: {
                    required: true,
                    digits: true,
                    minlength: 4
                },
                "edu_subjects[]": 'required',
                "edu_grades[]": 'required'
            },
            messages: {
                edu_level: 'Please select a education level',
                edu_class: {
                    required: 'Enter the class',
                    digits: 'Type numbers only'
                },
                edu_year: {
                    required: 'Enter the year',
                    digits: 'Type numbers only',
                    minlength: 'Type correct year'
                },
                "edu_subjects[]": 'Type Subject',
                "edu_grades[]": 'Type Grade'
            },

            submitHandler: function(form) {
                
             $('#user_msg').html('Adding. Please Wait...');
    $.post(site_url + "/user/saveUserEduLevel",$('#edu_add_form').serialize(),function(msg){
        //alert(msg); return;
        var stud_id = $('#stud_id').val();
        if(msg == "1"){
            $('#user_msg').html('<div class="success canhide">Successfully Added.</div>');
            window.location = site_url+"/user/manage_edu_profile/"+stud_id;
        }
        else if(msg == "0"){
            $('#user_msg').html('<div class="warning">Something is Wrong. Try again !</div>');
        }
        else if(msg == "2"){
            $('#user_msg').html('<div class="warning">Fill in all the subjects and grades.</div>');
        }
        
    });
                


                }
            

        });
        
        
        
        
        
        
        edu_edit_form_validate = $('#edu_edit_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                edu_level: 'required',
                edu_class: {
                    required: true,
                    digits: true
                },
                edu_year: {
                    required: true,
                    digits: true,
                    minlength: 4
                },
                "edu_subjects[]": 'required',
                "edu_grades[]": 'required'
            },
            messages: {
                edu_level: 'Please select a education level',
                edu_class: {
                    required: 'Enter the class',
                    digits: 'Type numbers only'
                },
                edu_year: {
                    required: 'Enter the year',
                    digits: 'Type numbers only',
                    minlength: 'Type correct year'
                },
                "edu_subjects[]": 'Type Subject',
                "edu_grades[]": 'Type Grade'
            },

            submitHandler: function(form) {
                
             $('#user_msg').html('Adding. Please Wait...');
    $.post(site_url + "/user/updateUserEduLevel",$('#edu_edit_form').serialize(),function(msg){
        //alert(msg); 
        var stud_id = $('#stud_id').val();
        if(msg == "1"){
            $('#user_msg').html('<div class="success canhide">Successfully Updated.</div>');
            window.location = site_url+"/user/manage_edu_profile/"+stud_id;
        }
        else if(msg == "0"){
            $('#user_msg').html('<div class="warning">Something is Wrong. Try again !</div>');
        }
        else if(msg == "2"){
            $('#user_msg').html('<div class="warning">Fill in all the subjects and grades.</div>');
        }
        
    });
                


                }
            

        });
        
        
        
        
        
        $(document).on('click','.delete_stu_edu_level',function(){
            
            var edu_quali_id = $(this).attr('id');
            if (confirm('Are you sure you want to delete this qualification ?')) {
            $('#custom_alert').html('<div class="info canhide">Please Wait... Deleting Discipline.</div>');
            $.post(site_url + '/user/deleteStudentEduQualification','qualification_id='+edu_quali_id,function(msg){
                
                
                if(msg == "1")
                    {
                        
                        $('#custom_alert').html('<div class="success canhide">Education qualification successfully deleted.</div>');
                        $('#row_'+edu_quali_id).hide();
                    }
                    
                    else
                    {
                            $('#custom_alert').html('<div class="warning">Error deleting this qualification. Try again !</div>');
                        }
                
                
                    
            });
            }
        });
        
        
        
        
               
               
               
               
               
               
//               $(".button_sub_remove").on('click', function(event){
//                   if(event.handled == true){
//                       alert($(this).attr('id')); return;
//                   }
//                   
//               
//             //var newRow = '<div class="form-group"><label for="edu_year" class="col-lg-3 control-label"></label><div class="col-lg-3">Subject:<input type="text" class="form-control" name="edu_subjects[]" id="edu_subjects" placeholder="Subject"></div><div class="col-lg-3">Grade:<input type="text" class="form-control" name="edu_grades[]" id="edu_grades" placeholder="Grade"></div><div class="col-lg-1"><br/><input id="edu_sub_rmv_btn" type="button" class="btn btn-primary button_remove" name="edu_sub_rmv_btn" value="-" /></div></div>';
//             $('#form_div').remove($(this));
//             $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) - 1);
//             //$('#edit').wrap('<div class="theDiv" />');
//               });
   
   
//   
//   $('#edu_sub_add_btn').click(function(){
//       
//        //$(this).parent().parent().append($('<tr><td><input class="text-input medium-input required ui-wizard-content ui-helper-reset ui-state-default" type="text" name="ug_subjects[]" /></td><td><input class="text-input medium-input required ui-wizard-content ui-helper-reset ui-state-default" type="text" name="ug_grade[]" /></td><td><input type="button" value="-" class="button remove"/></td></tr>'));
//$(this).parent().parent().parent().append($('<div class="form-group"><label for="edu_year" class="col-lg-3 control-label"></label><div class="col-lg-3">Subject:<input type="text" class="form-control" name="edu_subjects[]" id="edu_subjects" placeholder="Subject"></div><div class="col-lg-3">Grade:<input type="text" class="form-control" name="edu_grades[]" id="edu_grades" placeholder="Grade"></div><div class="col-lg-1"><br/><input id="edu_sub_rmv_btn" type="button" class="btn btn-primary button_remove" name="edu_sub_rmv_btn" value="-" /></div></div>'));
//
//
//        $(this).next().val(parseInt($(this).next().val()) + 1);
//
//
//
//        $('#edu_sub_rmv_btn').live('click', function(event){
//
//            if(event.handled !== true)
//
//            {
//
//
//
//                $(this).parent().parent().remove();
//
//
//
//                $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) - 1);
//
//
//
//                event.handled = true;
//
//            }
//
//
//
//            return false;
//
//        });
//
//    });
//    
//    
//    // remove subjects and grades
//    
//    
//    $('#edu_sub_rmv_btn').click(function(){
//       alert('jkljhjh'); return;
//        //$(this).parent().parent().append($('<tr><td><input class="text-input medium-input required ui-wizard-content ui-helper-reset ui-state-default" type="text" name="ug_subjects[]" /></td><td><input class="text-input medium-input required ui-wizard-content ui-helper-reset ui-state-default" type="text" name="ug_grade[]" /></td><td><input type="button" value="-" class="button remove"/></td></tr>'));
//$(this).parent().parent().romove();
//
//
//        //$(this).next().val(parseInt($(this).next().val()) + 1);
//        $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) - 1);
//
//
////        $('.remove').live('click', function(event){
////
////            if(event.handled !== true)
////
////            {
////
////
////
////                $(this).parent().parent().remove();
////
////
////
////                $('.No_of_subjects').val(parseInt($('.No_of_subjects').val()) - 1);
////
////
////
////                event.handled = true;
////
////            }
////
////
////
////            return false;
////
////        });
//
//    });
//   
   
});