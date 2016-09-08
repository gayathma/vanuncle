<!-- page corner -->
	<div class="corner"></div>

	
<!--	<div class="notice canhide">You have 7 new messages</div>
	<div class="info canhide">Welcome to Primo!</div>
	<div class="success canhide">Installation complete!</div>
	<div class="warning">Install folder is still there! Hurry up, delete it!</div>-->
	
	<div class="divider"></div>
				
	<div class="kubrick">
		<div class="top">
			<h3>Edit <?php foreach($editAttributeQuestions as $attributeQuestions){
                        echo $attributeQuestions->question_eng;} ?></h3>
			
        	
			<div class="clear"></div>
		</div>
		
		<div class="wrap">
			
			<!-- forms tab -->
			<div id="forms">
				
				<form action="#" method="post" id="edit_attribute_question" name="edit_attribute_question">
				
                                    <fieldset>
						<?php foreach($editAttributeQuestions as $attributeQuestions){ ?>
                                        <input name="question_id" type="hidden" id="question_id" value="<?php echo $attributeQuestions->question_id;?>"/>
					<label>Attribute Question in English</label>
					<input name="question_eng" class="text medium" type="text" id="question_eng" value="<?php echo $attributeQuestions->question_eng;?>"/>
																
					<label>Attribute Question in Sinhala</label>
					<input name="question_sin" class="text medium" type="text" id="question_sin" value="<?php echo $attributeQuestions->question_sin;?>"/>
									
					<label>Attribute Question in Tamil</label>
					<input name="question_tam" class="text medium" type="text" id="question_tam" value="<?php echo $attributeQuestions->question_tam;?>"/>
					                                        
                                        <label>Attribute</label>
					<select name="attribute_id" id="attribute_id">
                                            <option value="" selected >Choose</option>
                                            <?php foreach($getAllAttributes as $attributes){ ?>
                                            <option value="<?php echo $attributes->attribute_id; ?>"<?php if($attributeQuestions->attribute_id==$attributes->attribute_id){ echo 'selected';}?> ><?php echo $attributes->attribute_eng;?></option>
                                            <?php }?>
                                        </select>
                                        
                                        <label>English Status</label>
                                        <input name="english_status" type="radio" id="english_status" value="1" <?php if($attributeQuestions->english_status=='1'){ echo  "checked";}?> />Published
                                        <input name="english_status" type="radio" id="english_status" value="0" <?php if($attributeQuestions->english_status=='0'){ echo "checked";}?>/>Un-Published
					
                                        <label>Sinhala Status</label>
                                        <input name="sinhala_status" type="radio" id="sinhala_status" value="1" <?php if($attributeQuestions->sinhala_status=='1'){ echo  "checked";}?> />Published
                                        <input name="sinhala_status" type="radio" id="sinhala_status" value="0" <?php if($attributeQuestions->sinhala_status=='0'){ echo "checked";}?>/>Un-Published
                                        
                                        <label>Sinhala Status</label>
                                        <input name="tamil_status" type="radio" id="tamil_status" value="1" <?php if($attributeQuestions->tamil_status=='1'){ echo  "checked";}?> />Published
                                        <input name="tamil_status" type="radio" id="tamil_status" value="0" <?php if($attributeQuestions->tamil_status=='0'){ echo "checked";}?>/>Un-Published
                                        
                                        <label>Overall Publish Status</label>
                                        <input name="published_status" type="radio" id="published_status" value="1" <?php if($attributeQuestions->published_status=='1'){ echo  "checked";}?> />Published
                                        <input name="published_status" type="radio" id="published_status" value="0" <?php if($attributeQuestions->published_status=='0'){ echo "checked";}?>/>Un-Published
                                <?php } ?>
					<p>
						<input class="button def" type="submit" value="Submit form" />
						<input class="button alt" type="reset" value="Cancel" onclick="history.go(-1);" />
					</p>
					</fieldset>	
				</form>
			</div>
		</div>
	</div>
        <div id="custom_alert">

</div>
        <script type="text/javascript">        
 $('#mastr').addClass('selected');  
 // $('#setting_sub_menu').removeClass('closed'); 
  
</script>  