

<!-- page corner -->
	<div class="corner"></div>

	<h1><?php //echo $title_menu_main; ?></h1>
    
   
	
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Edit Discipline Details</h3>
			
        	<!-- tabs menu -->
            <ul class="tabs"> 
                
<!--                <li><a class="selected" href="#add_discip">Add Discipline</a></li> 
                <li><a href="#manage_discip">Manage Disciplines</a></li>-->
                
            </ul>
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
            
            <div id="edit_discip">
					
			
            <form name="discipline_edit_form" id="discipline_edit_form" method="post">
                
                <input type="hidden" name="dis_id" id="dis_id" value="<?php echo $discipline_detail['discipline_id']; ?>" />
                
                <label>Discipline Name - English</label>
					<input name="dis_eng" id="dis_eng" class="text medium" type="text" value="<?php echo $discipline_detail['discipline_eng']; ?>" />
					
                    
                    <label>Discipline Name - Sinhala</label>
					<input name="dis_sin" id="dis_sin" class="text medium" type="text" value="<?php echo $discipline_detail['discipline_sin']; ?>" />
					
                    
                    <label>Discipline Name - Tamil</label>
					<input name="dis_tam" id="dis_tam" class="text medium" type="text" value="<?php echo $discipline_detail['discipline_tam']; ?>" />
					
                    
                    <label>English Status</label>
                    <input type="radio" name="eng_status" id="eng_status" value="1" <?php if($discipline_detail['english_status'] == '1'){ echo "checked='checked'"; } ?> />Published
                    <input type="radio" name="eng_status" id="eng_status" value="0" <?php if($discipline_detail['english_status'] == '0'){ echo "checked='checked'"; } ?> />Unpublished
                    
                    <label>Sinhala Status</label>
                    <input type="radio" name="sin_status" id="sin_status" value="1" <?php if($discipline_detail['sinhala_status'] == '1'){ echo "checked='checked'"; } ?> />Published
                    <input type="radio" name="sin_status" id="sin_status" value="0" <?php if($discipline_detail['sinhala_status'] == '0'){ echo "checked='checked'"; } ?> />Unpublished
                    
                    <label>Tamil Status</label>
                    <input type="radio" name="tam_status" id="tam_status" value="1" <?php if($discipline_detail['tamil_status'] == '1'){ echo "checked='checked'"; } ?> />Published
                    <input type="radio" name="tam_status" id="tam_status" value="0" <?php if($discipline_detail['tamil_status'] == '0'){ echo "checked='checked'"; } ?> />Unpublished
                    
                    <label>Overall Publish Status</label>
                    <input type="radio" name="pub_status" id="pub_status" value="1" <?php if($discipline_detail['published_status'] == '1'){ echo "checked='checked'"; } ?> />Published
                    <input type="radio" name="pub_status" id="pub_status" value="0" <?php if($discipline_detail['published_status'] == '0'){ echo "checked='checked'"; } ?> />Unpublished
                    
                    <div class=" clear">
                        <br/>
                    </div>
                    
                    <p>
						<input class="button def" type="submit" value="Save Details" />
						<input class="button alt" type="button" value="Cancel" onclick="history.go(-1);" />
					</p>
                
            </form>
			
			</div>
            
            
	</div>
        <div id="custom_alert">
        
    </div>
        
        <script type="text/javascript">        
 $('#mastr').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script> 