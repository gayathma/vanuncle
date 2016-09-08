

<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
    <div id="custom_alert">
        
    </div>
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Edit Registered User Details</h3>
			
        	<!-- tabs menu -->
            <ul class="tabs"> 
<!--                <li><a class="selected" href="">Registered Users</a></li> 
                <li><a href="#forms">Forms</a></li>
                <li><a href="#text">Text</a></li>
                <li><a href="#cols">Columns</a></li>-->
            </ul>
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
					
			
			<form name="user_register_form" id="user_register_form" method="post">
    
    <label for="first_name">First Name :</label>
    <input type="text" id="first_name" class="text medium" name="first_name" value="<?php echo $studentdetails['first_name']; ?>">
    <div class="elVal"></div>
    <p>
    <label for="last_name">Last Name :</label>
    <input type="text" id="last_name" class="text medium" name="last_name" value="<?php echo $studentdetails['last_name']; ?>">
    <div class="elVal"></div>
    <p>
    <label for="dob">Date of Birth :</label>
    <input type="text" id="dob" name="dob" class="text medium" value="<?php echo $studentdetails['dob']; ?>">
    <p>
    <label for="nic">NIC :</label>
    <input type="text" id="nic" name="nic" class="text medium" value="<?php echo $studentdetails['nic']; ?>">
    <div class="elVal"></div>
    <p>
    <label for="school">School :</label>
    <input type="text" id="school" class="text medium" name="school" value="<?php echo $studentdetails['school']; ?>">
    <p>
    <label for="contact">Contact Telephone :</label>
    <input type="text" id="contact" name="contact" class="text medium" value="<?php echo $studentdetails['contact_tp']; ?>">
    <div class="elVal"></div>
    <p>
    <label for="email">Email :</label>
    <input type="text" id="email_new" name="email_new" class="text medium" value="<?php echo $studentdetails['email']; ?>">
    <input type="hidden" name="email_chk" id="email_chk" value="<?php echo $studentdetails['email']; ?>">
    <div class="elVal"></div>
    <div id="email_alert"></div>
    <p>
    <label for="district">District :</label>
    
    <select id="district" name="district">
        <option value=""> -- Please select --</option>
        <?php
        foreach($districts as $district){
            if($district->did == $studentdetails['district']) {
            ?>
        <option value="<?php echo $district->did; ?>" selected="selected"><?php echo $district->dname_eng; ?></option>
        <?php
            }
            else {
                ?>
        <option value="<?php echo $district->did; ?>"><?php echo $district->dname_eng; ?></option>
        <?php
            }
        }
        ?>
    </select>
    <div class="elVal"></div>
    <p>
    <label for="city">City :</label>
    <input type="text" id="city" name="city" class="text medium" value="<?php echo $studentdetails['city']; ?>">
    <div class="elVal"></div>
    <p>
    <label for="address">Address :</label>
    <textarea id="address" class=" medium" name="address" ><?php echo $studentdetails['address']; ?></textarea>
    <p>
    <label for="address">Father's Name :</label>
    <input type="text" id="father_name" class="text medium" name="father_name" value="<?php echo $studentdetails['father_name']; ?>">
    <p>
    <label for="address">Father's Occupation :</label>
    <input type="text" id="father_occ" class="text medium" name="father_occ" value="<?php echo $studentdetails['father_occupation']; ?>">
    <p>
    <label for="address">Mother's Name :</label>
    <input type="text" id="mother_name" class="text medium" name="mother_name" value="<?php echo $studentdetails['mother_name']; ?>">
    <p>
    <label for="address">Mother's Occupation :</label>
    <input type="text" id="mother_occ" class="text medium" name="mother_occ" value="<?php echo $studentdetails['mother_occupation']; ?>">
    <p>
    <label for="address">No of Siblings :</label>
    <input type="text" id="siblings_no" class="text medium" name="siblings_no" value="<?php echo $studentdetails['no_of_siblings']; ?>">
    <p>
        <input type="hidden" id="form_add" name="form_add" value="edit" />
        <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>" />
        <input type="hidden" id="user_name" name="user_name" value="<?php echo $studentdetails['user_name']; ?>">
    <div id="user_msg"></div>
    <p>
    <input id="reg_user" type="submit" class="button def" name="reg_user" value="Update Details" />
    &nbsp;
    <input type="button" class="button alt" value="Cancel" onclick="history.go(-1);" />
    
    
    
    </form>
			
			
		</div>
	</div>
    
    <script type="text/javascript">        
 $('#students').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 