
<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
    
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Admin Users</h3>
			
        	<!-- tabs menu -->
            <ul class="tabs"> 
                <?php
            $user_privilege_model_service = new User_privilege_model_service();
            if ($user_privilege_model_service->getUserPrivilege('MANAGE_ADMIN_USERS')) {
            ?>
                <li><a class="selected" href="#manage_admn_usr">Manage Users</a></li>
                <?php } ?>
                <?php if ($user_privilege_model_service->getUserPrivilege('ADD_ADMIN_USERS')) { ?>
                <li><a href="#add_admn_usr">Add User</a></li>
                <?php } ?>
                <?php if ($user_privilege_model_service->getUserPrivilege('MANAGE_PRIVILEGES')) { ?>
                <li><a href="#add_admn_usr_prvldge">Manage User Privileges</a></li>
                <?php } ?>
                
                
            </ul>
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
            
            <div id="manage_admn_usr">
                
                <!-- tables -->
			<div id="tables">
				
				<!-- table -->
				<table id="dt2" class="display dataTable ">
                    <thead>
				    <tr >
				      <th ><h5>Name</h5></th>
				      <th ><h5>Username</h5></th>
				      <th ><h5>Email</h5></th>
                      <th ><h5>Created By</h5></th>
                      <th ><h5>Created Date</h5></th>
                      <th ><h5>Updated Date</h5></th>
                <th><h5 >Actions</h5></th>
                
				    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $users_model_service = new Users_model_service();
                    
                    ?>
                    
                    <?php
                    foreach ($admin_users as $user){
                        $created_by = $users_model_service->getNameOnId($user->created_by);
                        ?>
                    
                    <tr id="row_<?php echo $user->id; ?>">
				       
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $created_by; ?></td>
                        <td><?php echo $user->created_date; ?></td>
                        <td><?php echo $user->updated_date; ?></td>
                        
                        <td class="controls">
                            <?php if ($user_privilege_model_service->getUserPrivilege('EDIT_ADMIN_USERS')) { ?>
                            <a href="<?php echo base_url(); ?>backend.php/admin_users/edit_admin_user/<?php echo $user->id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/pencil_gray.png" height="16px" width="16px" title="Edit" style=" cursor: pointer;" /></a>
                            <?php } ?>
                            
                            <?php if ($user_privilege_model_service->getUserPrivilege('CHANGE_ADMIN_USER_PASSWORD')) { ?>
                            <?php if($user->id != $this->session->userdata('User_Id')) { ?>
                            &nbsp;
                            <a href="<?php echo base_url(); ?>backend.php/admin_users/change_admn_user_password/<?php echo $user->id; ?>" ><img src="<?php echo base_url(); ?>backend_resources/images/key.png" height="16px" width="16px" title="Change User Password" style=" cursor: pointer;" /></a>
                            <?php } ?>
                            <?php } ?>
                            
                            <?php if ($user_privilege_model_service->getUserPrivilege('DELETE_ADMIN_USERS')) { ?>
                            &nbsp;
                            <img src="<?php echo base_url(); ?>backend_resources/images/trash_bin.png" height="18px" width="18px" id="<?php echo $user->id; ?>" class="delete_admn_usr" title="Delete User" style=" cursor: pointer;" />
                            <?php } ?>
				        </td>
                        
				    </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>
				    
				    
				</table>
                
                
            </div>
			
			
		</div>
            
            
            <?php if ($user_privilege_model_service->getUserPrivilege('ADD_ADMIN_USERS')) { ?>
            
            <div id="add_admn_usr">
					
			
            <form name="admin_usr_add_form" id="admin_usr_add_form" method="post">
                
                <label>Name</label>
					<input name="usr_act_name" id="usr_act_name" class="text medium" type="text" />
                    
                    <label>Username</label>
					<input name="usr_name" id="usr_name" class="text medium" type="text" />
                    
                    <label>Password</label>
					<input name="paswrd" id="paswrd" class="text medium" type="password" />
                    
                    <label>Confirm Password</label>
					<input name="cnfrm_paswrd" id="cnfrm_paswrd" class="text medium" type="password" />
                    
                    <label>Email</label>
					<input name="usr_email" id="usr_email" class="text medium" type="text" />
					
                    
                    
                    <p>
						<input class="button def" type="submit" value="Add User" />
						<input class="button alt" type="reset" value="Reset" />
					</p>
                
            </form>
               
			</div>
            
            <?php } ?>
            
            <?php if ($user_privilege_model_service->getUserPrivilege('MANAGE_PRIVILEGES')) { ?>
            
            <div id="add_admn_usr_prvldge">
                
                <label for="admn_usr">Select Admin User</label>
                <select id="admn_usr_slct" name="admn_usr_slct" class=" select text medium">
                    <option value="">-- Please select --</option>
                    <?php foreach($admin_users as $user) { ?>
                    <option value="<?php echo $user->id; ?>" <?php if($user->id == $this->session->userdata('User_Id')) { echo "disabled='disabled'"; } ?> ><?php echo $user->name; ?></option>
                    <?php } ?>
                </select>
                
                <br/><br/>
                
                <div id="grant_revoke_privilege">
                        </div>
                
                
            </div>
            
            <?php } ?>
            
            
	</div>
        </div>
        <div id="custom_alert">
        
    </div>
        
        
        <script type="text/javascript">        
 $('#admnstrnts').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 