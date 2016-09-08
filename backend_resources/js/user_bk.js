$(document).ready(function(){
   
   jQuery.ajaxSetup({async: false});
   
   $.validator.addMethod(

        "NIC_Validation",

        function (value, element) {

            return getvalue_nicNO(value);

        },

        "Incorrect NIC"

    );
        
        
        $.validator.addMethod(

        "NIC_Validation_Numbers",

        function (value, element) {

            return checkNumeric(value);

        },

        "Incorrect NIC"

    ); 
        
        
        user_register_form_validate = $('#user_register_form').validate({

            highlight: function(element) {
                $(element).closest('div.elVal').addClass("form-field error");
            },
            unhighlight: function(element) {
                $(element).closest('div.elVal').removeClass("form-field error");
            },
            rules: {
                first_name: 'required',
                last_name: 'required',
                user_name: 'required',
                password:{
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: '#password'
                },
//                dob: {
//                    required: true
//                },
                nic: {
                    NIC_Validation_Numbers: true
                    //NIC_Validation: true
                },
//                school:'required',
                contact:{
                    digits: 'true'
                },
                email:{
                    email: true
                },
                district:{required: true},
                city:{required: true},
                siblings_no: {digits: 'true'}
            },
            messages: {
                first_name: 'Please enter a first name',
                last_name: 'Please enter a last name',
                user_name: 'Please enter your desired username',
                password: {
                    required: 'Please type password',
                    minlength: 'Password should be minimum 6 characters'
                },
                confirm_password: {
                    required: 'Please confirm password',
                    equalTo: 'Passwords not match !!'
                },
//                dob: {required: 'Please type dob'},
                nic: {
                    NIC_Validation_Numbers: 'Type correct NIC Number'
                    //NIC_Validation: 'Incorrect NIC Number'
                },
//                school:'Please enter school',
                contact:{
                    digits: 'Please type numbers only'
                },
                email:{
                    email: 'Please enter a valid email address'
                },
                district:{required: 'Please select a District'},
                city:{required: 'Please type a city'},
                siblings_no: {digits: 'Please type numbers only'}
            },

            submitHandler: function(form) {
//if adding the organization
if($('#form_add').val() == 'add'){
    $.post(site_url + "/user/checkUserName","username="+$('#user_name').val(),function(msg){
        if(msg == 'available'){
                    $('#username_alert').hide("fast");
        $.post(site_url + "/user/checkUserEmail","email="+$('#email').val(),function(msg){
            
                if(msg == 'available'){
                    $('#email_alert').hide("fast");
                
        $('#custom_alert').html('Adding User. Please Wait...');
                $.post(site_url+'/user/saveUser',$('#user_register_form').serialize(),function(msg){
                   
                   if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        window.location = site_url+"/user/registeredUsers";
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                   
                });
        }
        else if(msg == 'notavailable'){
                    $('#email_alert').html("<b style=' color: red;'>This Email is already registered.</b>");
                    return false;
                }
        });
                } 
                else if(msg == 'notavailable'){
                    $('#username_alert').html("<b style=' color: red;'>Username not available. Try again !</b>");
                    return false;
                }
        
    });
                
}

else if($('#form_add').val() == 'edit'){
    if($('#email_new').val() == $('#email_chk').val()){
        $('#custom_alert').html('<div class="info canhide">Updating User. Please Wait...</div>');
                $.post(site_url+'/user/updateUser',$('#user_register_form').serialize(),function(msg){
                    //alert(msg); return;
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        window.location = site_url+"/user/registeredUsers";
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                });
    }
    
    else if($('#email_new').val() != $('#email_chk').val())
        {
            $.post(site_url + "/user/checkUserEmail","email="+$('#email_new').val(),function(msg){
                
                if(msg == 'available'){
                    $('#email_alert').hide("fast");
                    
                    $.post(site_url+'/user/updateUser',$('#user_register_form').serialize(),function(msg){
                    //alert(msg); return;
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        window.location = site_url+"/user/registeredUsers";
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                });
                    
                }
                else if(msg == 'notavailable'){
                    $('#email_alert').html("<b style=' color: red;'>This Email is already registered.</b>");
                    return false;
                }
                
                
            });
        }
    
//    $('#custom_alert').html('<div class="info canhide">Updating User. Please Wait...</div>');
//                $.post(site_url+'/user/updateUser',$('#user_register_form').serialize(),function(msg){
//                    //alert(msg); return;
//                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
//                    {
//                        window.location = site_url+"/user/registeredUsers";
//                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                    }
//                    
//                    else
//                        {
//                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
//                        }
//                });
    
}
                }
            

        });
        
        
        
        $(document).on('change','#user_register_form #user_name',function(){
            $.post(site_url + "/user/checkUserName","username="+ this.value,function(msg){
                //alert(msg); return;
                if(msg == 'available'){
                    $('#username_alert').html("");
                } else if(msg == 'notavailable'){
                    $('#username_alert').html("<b style=' color: red;'>Username not available. Try again !</b>");
                    return false;
                }
                    
                 });
        });
        
        $(document).on('change','#user_register_form #email',function(){
            $.post(site_url + "/user/checkUserEmail","email="+ this.value,function(msg){
                //alert(msg); return;
                if(msg == 'available'){
                    $('#email_alert').html("");
                } else if(msg == 'notavailable'){
                    $('#email_alert').html("<b style=' color: red;'>This Email is already registered.</b>");
                    return false;
                }
                    
                 });
        });
        
        $(document).on('change','#user_register_form #email_new',function(){
            $.post(site_url + "/user/checkUserEmail","email="+ this.value,function(msg){
                //alert(msg); return;
                if(msg == 'available'){
                    $('#email_alert').html("");
                } else if(msg == 'notavailable'){
                    $('#email_alert').html("<b style=' color: red;'>This Email is already registered.</b>");
                    return false;
                }
                    
                 });
        });
        
        
   
   
   $(document).on('click','.change_reg_user_status',function(){
            
            var user_id_status = $(this).attr('id');
            var n = user_id_status.split("***");
            
            var user_id = n[0];
            var status = n[1];
            
            $('#custom_alert').html('<div class="info canhide">Please Wait... Changing User Status.</div>');
            $.post(site_url + '/user/changeUserStatus','user_id='+user_id+'&status='+status,function(msg){
                
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        location.reload(); 
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        //$('#custom_alert').hide(8000);
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
                
                    
            });
            
        });
        
        
        
        $(document).on('click','.delete_reg_user',function(){
            
            var user_id = $(this).attr('id');
            
            $('#custom_alert').html('<div class="info canhide">Please Wait... Deleting user.</div>');
            $.post(site_url + '/user/deleteUser','user_id='+user_id,function(msg){
                
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        //location.reload(); 
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        $('#row_'+user_id).hide();
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
                
                    
            });
            
        });
        
        
        
        
        $('#admin_usr_add_form').validate({
        rules: {
            usr_act_name: 'required',
            usr_name: 'required',
            paswrd: {
                required: true,
                minlength: 6
            },
            cnfrm_paswrd: {
                required: true,
                equalTo: $('#paswrd')
            }
        },
        messages: {
            usr_act_name: 'Name required',
            usr_name: 'Username required',
            paswrd: {
                required: 'Password required',
                minlength: 'Password should be minimum 6 characters.'
            },
            cnfrm_paswrd: {
                required: 'Confirm Password',
                equalTo: 'Passwords dont match !'
            }
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Adding User...</div>');
            
            $.post(site_url + '/admin_users/saveUser', $("#admin_usr_add_form").serialize(), function(msg) {
                $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                
            });
        }
    });
    
    
    
    $('#admin_usr_edit_form').validate({
        rules: {
            usr_act_name: 'required',
            usr_name: 'required'
        },
        messages: {
            usr_act_name: 'Name required',
            usr_name: 'Username required'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Updating User...</div>');
            
            $.post(site_url + '/admin_users/updateUser', $("#admin_usr_edit_form").serialize(), function(msg) {
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        window.location = site_url+"/admin_users/manage_users";
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
            });
        }
    });
    
    
    
    $(document).on('click','.delete_admn_usr',function(){
            
            var user_id = $(this).attr('id');
            
            $('#custom_alert').html('<div class="info canhide">Please Wait... Deleting user.</div>');
            $.post(site_url + '/admin_users/deleteUser','user_id='+user_id,function(msg){
                
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                    {
                        //location.reload(); 
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        $('#row_'+user_id).hide();
                    }
                    
                    else
                        {
                            $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                        }
                
                
                    
            });
            
        });
        
        
        
        $(document).on('change', '#admn_usr_slct', function(){
        if($(this).val() == '')
        {
            $('#grant_revoke_privilege').html('');
        }
        else
        {
            $('#custom_alert').html('<div class="info canhide">Please Wait...</div>');

            $.post(site_url + '/admin_users/get_available_privilege', {user_id: $(this).val()}, function(msg) {
                $('#grant_revoke_privilege').html(msg);

                $('#custom_alert').html('');
            });
        }
    });
       
       
       
       $(document).on('click', '#grant_revoke_privilege .change_user_privilege', function(){
        if($('#change_privilege_user_group').val() == '')
        {
            $('#custom_alert').html('<div class="warning">Please Select User Group</div>');
        }
        else
        {
            if($(this).is(':checked'))
            {
                $('#custom_alert').html('<div class="info canhide">Please Wait. Granting Privilege...</div>');
            }
            else
            {
                $('#custom_alert').html('<div class="info canhide">Please Wait. Revoking Privilege...</div>');
            }

            $.post(site_url + '/admin_users/change_privilege_save', {user_id: $('#admn_usr_slct').val(), privilege_id: $(this).val(), grant_privilege: $(this).is(':checked')}, function(msg) {
                $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
            });
        }
    });
        
    
    
});



function getvalue_nicNO(nicno)

{
    
    //alert(nicno);
    
    if(nicno != ''){
        
    

    var last_nino_carector=nicno.charAt(9);

    switch(last_nino_carector)

    {

        case 'V':

            return true;



        case 'v':

            return true;

        case 'x':

            return true;

        case 'X':

            return true;

        default:

            return false;

    }
    
    
    }
    
    
    else {
        return true;
    }

}




function checkNumeric(nicno){
    if(nicno != ''){
    var numbers = nicno.substring(0, 9);
    var last_nino_carector = nicno.charAt(9);
    if (($.isNumeric(numbers) && last_nino_carector == 'v') || ($.isNumeric(numbers) && last_nino_carector == 'V') || ($.isNumeric(numbers) && last_nino_carector == 'x') || ($.isNumeric(numbers) && last_nino_carector == 'X')) {
    return true;
    }
    
    else{
        return false;
    }
    }
    else {
        return true;
    }
}








function admin_change_password(){
	
	
var old_password = $('#old_password').val();
var new_password = $('#new_password').val();
var c_new_password = $('#c_new_password').val();


if(old_password!='' && new_password!='' &&  c_new_password!=''){
	
	
	if(new_password==c_new_password){
		
		
		//start : old apssword code check goes here.
		
		$
		.ajax({
			type : "POST",
			url : site_url + '/admin_users/check_old_password',
			data : "old_password=" + old_password,
			success : function(old_pw_chk_rtn_msg) {
			
				
			if(old_pw_chk_rtn_msg==0){
				
				$('#cstm_msg').html('<div class="warning canhide">Entered old password is wrong.</div>');	
					
			}else{
				
			//Start : update new password
				
				$
				.ajax({
					type : "POST",
					url : site_url + '/admin_users/change_admin_pw',
					data : "new_password=" + new_password,
					success : function(changd_pw_rtn_msg) {
					
						
					if(changd_pw_rtn_msg==0){
						
						$('#cstm_msg').html('<div class="warning canhide">An error occured.</div>');	
							
					}else{
						change_password_validate.reset();
						$('#cstm_msg').html('<div class="success canhide">Password successfully chaged.</div>');
					
					
					}	
				
					}

				});
				
				
			//End : update new password	
				
			}	

				

			}

		});
		
		
		
		//end : old apssword code check goes here.
		
		
		
		
		
		
		
	}else{
		
		
		$('#cstm_msg').html('<div class="warning canhide">Both new password and confirm new password should be same.</div>');	
		
	}
	
	
	
	
	
	
	
	
	
	
}else{
	
	//alert(222);
	$('#cstm_msg').html('<div class="warning canhide">All Field are mandatory.</div>');

}	




	
	
}




$('#change_password_validate').validate({
    rules: {
    	old_password: 'required',
    	new_password: 'required',
    	c_new_password: 'required'
    },
    messages: {
    	old_password: 'Old password required',
    	new_password: 'New password required',
    	c_new_password: 'Confirm new password required'
    },
    submitHandler: function(form) {
        $('#custom_alert').html('<div class="info canhide">Updating User...</div>');
        
        $.post(site_url + '/admin_users/updateUser', $("#admin_usr_edit_form").serialize(), function(msg) {
            
            if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url+"/admin_users/manage_users";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
                
                else
                    {
                        $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                    }
            
        });
    }
});






