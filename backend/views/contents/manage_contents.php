
<div class="kubrick">
	<div class="top">
		<h3><?php echo $inner_title;?></h3>

		<div class="clear"></div>
	</div>

	<div class="wrap">



		<!-- forms tab -->
		<div id="forms">

			<form action="#" method="post">
				<fieldset>


					<!-- <label>Textarea</label>     -->
					<form method="post" name="frm_content" id="frm_content">

						<textarea cols="40" id="content_text" name="content_text" rows="10"><?php echo $content_data->content;?>
                
              </textarea>
						<script type="text/javascript">
				//<![CDATA[
					CKEDITOR.replace( 'content_text',
						{
							extraPlugins : 'uicolor',
							uiColor: '#EBDBDB',
							filebrowserBrowseUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/ckfinder.html',
							filebrowserImageBrowseUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/ckfinder.html?Type=Flash',
							filebrowserUploadUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
							filebrowserImageUploadUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '<?php echo base_url();?>backend_resources/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'							
						} );
				//]]>
				</script>
				
				<input type="hidden" id="content_id" name="content_id" value="<?php echo $content_data->content_id;?>">
				
					<p>	<span id="rtn_msg"></span>				</p>
						<p>n
							<input class="button def" type="button" onclick="updateContent()"
								value="save" />
						</p>
				
				</fieldset>
			</form>






		</div>




	</div>
</div>

                        
 <script type="text/javascript">        
 $('#manage_pages').addClass('selected');   
</script>                  
            



