function updatecontentpagebyhcode() {

	var title_eng = $('#title_eng').val();
	var title_sin = $('#title_sin').val();
	var title_tam = $('#title_tam').val();

	var des_eng = encodeURIComponent(CKEDITOR.instances.des_eng.getData());
	var des_sin = encodeURIComponent(CKEDITOR.instances.des_sin.getData());
	var des_tam = encodeURIComponent(CKEDITOR.instances.des_tam.getData());

	//var eng_status = $('#eng_status').val();
	
	var eng_status = $("#update_content_form").find("input[class^=eng_status]:checked").val();
	var sin_status = $("#update_content_form").find("input[class^=sin_status]:checked").val();
	var tam_status = $("#update_content_form").find("input[class^=tam_status]:checked").val();
	var pub_status = $("#update_content_form").find("input[class^=pub_status]:checked").val();
	//alert(sin_status);
	
	
	
	//var sin_status = $('#sin_status').val();
	//var tam_status = $('#tam_status').val();
	//var pub_status = $('#pub_status').val();
	//
	
	//   var ChkBox = document.getElementById("CheckBox1");
	 //   alert(eng_status.Checked);

	var content_id = $('#content_id').val();

	$
			.ajax({
				type : "POST",
				url : site_url + '/contents/updatecontentpage',
				data : "title_eng=" + title_eng + "& title_sin=" + title_sin
						+ "& title_tam=" + title_tam + "& des_eng=" + des_eng
						+ "& des_sin=" + des_sin + "& des_tam=" + des_tam
						+ "& eng_status=" + eng_status + "& sin_status="
						+ sin_status + "& tam_status=" + tam_status
						+ "& pub_status=" + pub_status + "& content_id=" + content_id,
				success : function(msg) {
					//alert(msg);

					if (msg == 1) {
						$('#rtn_msg')
								.html(
										'<div class="success canhide">Successfully saved..</div>');


					} else {
						$('#rtn_msg')
								.html(
										'<div class="warning canhide">An error occured.</div>');

					}

				}

			});

}
