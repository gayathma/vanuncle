

<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
    <div id="custom_alert">
        
    </div>
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			Change Password for <strong><?php echo $stu_user_details['first_name'].' '.$stu_user_details['last_name'].' ('.$stu_user_details['user_name'].')'; ?></strong>
			
        	<!-- tabs menu -->
<!--            <ul class="tabs"> 
                <li><a class="selected" href="#manage_reg_users">Registered Users</a></li> 
                <li><a href="#add_reg_users">Add Student User</a></li>
                <li><a href="#text">Text</a></li>
                <li><a href="#cols">Columns</a></li>
            </ul>-->
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
            
				
                <div class=" clearfix">
                
                    <form name="reg_usr_pw_chng_form" id="reg_usr_pw_chng_form" method="post" >
                        
                      <input type="hidden" id="stud_id" name="stud_id" value="<?php echo $stu_user_details['student_id']; ?>" />  
                     
                   <label for="usr_pw">Enter New Password :</label>
                <input type="password" id="usr_pw" class="text medium" name="usr_pw" value="">
                <div class="elVal"></div>
                
                <p></p>
                
                <label for="cnfrm_usr_pw">Confirm New Password :</label>
                <input type="password" id="cnfrm_usr_pw" class="text medium" name="cnfrm_usr_pw" value="">
                <div class="elVal"></div>
                 
                      
                     <br/><br/> 
                
                   <div id="user_msg">
                    
                </div>
                      
                      <input id="reg_usr_pw_chng_form_btn" type="submit" class="button def" name="reg_usr_pw_chng_form_btn" value="Save" />
                    &nbsp;
                    <input type="button" class="button alt" value="Cancel" onclick="history.go(-1);" />
                      
                      
                        
                    </form>
                
            
            </div>
                
           
			
		</div>
	</div>
    
    <script type="text/javascript">        
 $('#students').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 