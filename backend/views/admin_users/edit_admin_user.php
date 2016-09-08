
<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
    
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Edit Admin User</h3>
			
        	
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
            
            <div id="add_admn_usr">
					
			
            <form name="admin_usr_edit_form" id="admin_usr_edit_form" method="post">
                
                <input type="hidden" name="usr_id" id="usr_id" value="<?php echo $userDetails['id']; ?>" />
                
                <label>Name</label>
					<input name="usr_act_name" id="usr_act_name" class="text medium" type="text" value="<?php echo $userDetails['name']; ?>" />
                    
                    <label>Username</label>
					<input name="usr_name" id="usr_name" class="text medium" type="text" disabled="disabled" value="<?php echo $userDetails['username']; ?>" />
                    
                    <label>Email</label>
					<input name="usr_email" id="usr_email" class="text medium" type="text" value="<?php echo $userDetails['email']; ?>" />
					
                    
                    
                    <p>
						<input class="button def" type="submit" value="Save" />
						<input class="button alt" type="reset" value="Cancel" onclick="history.go(-1);" />
					</p>
                
            </form>
               
			</div>
            
            
	</div>
        <div id="custom_alert">
        
    </div>
        
        <script type="text/javascript">        
 $('#admnstrnts').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 