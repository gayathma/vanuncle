
<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
   
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Change Password</h3>
			
        	
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
            
            <div id="add_admn_usr">
					
			
            <form name="change_password_validate" id="change_password_validate" method="post" onsubmit="return false">
    
                <label>Old Password</label>
					<input name="old_password" id="old_password" class="text medium" type="password"  />
                    
                    <label>New Password</label>
					<input name="new_password" id="new_password" class="text medium" type="password" />
                    
                    <label>Confirm New Password</label>
					<input name="c_new_password" id="c_new_password" class="text medium" type="password" />
					
                     <div id="cstm_msg">
        
    </div>
                    
                    <p>
						<input class="button def" type="submit" value="Save" onclick="admin_change_password()" />
						<input class="button alt" type="reset" value="Cancel" onclick="history.go(-1);" />
					</p>
                
            </form>
               
			</div>
            
            
	</div>
        
        
        <script type="text/javascript">        
 $('#admnstrnts').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 