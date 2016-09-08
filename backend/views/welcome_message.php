<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>

<style type="text/css">
::selection {
	background-color: #E13300;
	color: white;
}

::moz-selection {
	background-color: #E13300;
	color: white;
}

::webkit-selection {
	background-color: #E13300;
	color: white;
}

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}
</style>
<script
	src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo base_url();?>jquery-1.1.3.1.pack.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>


<script type="text/javascript">

function updateContent(){

	  var news_des = encodeURIComponent(CKEDITOR.instances.news_des.getData());
      
     // alert(news_des);
 

	  $.ajax({
          type: "POST",
          url: '<?php echo site_url()?>/welcome/getUpdateContents',
          data: "news_des=" + news_des,
          success: function (msg) {
              alert(msg);
             
          }

      });


	
}

	</script>



</head>
<body>

	<div id="container">

		<form method="post" name="frm_content" id="frm_content">

			<textarea cols="40" id="news_des" name="news_des" rows="10">
                
              </textarea>
			<script type="text/javascript">
				//<![CDATA[
					CKEDITOR.replace( 'news_des',
						{
							extraPlugins : 'uicolor',
							uiColor: '#EBDBDB',
							filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
							filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?Type=Flash',
							filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
							filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'							
						} );
				//]]>
				</script>


			<input type="button" onclick="updateContent()" value="save">
		</form>



		<h1>Welcome to CodeIgniter!</h1>

		<div id="body">
			<p>The page you are looking at is being generated dynamically by
				CodeIgniter.</p>

			<p>If you would like to edit this page you'll find it located at:</p>
			<code>application/views/welcome_message.php</code>

			<p>The corresponding controller for this page is found at:</p>
			<code>application/controllers/welcome.php</code>

			<p>
				If you are exploring CodeIgniter for the very first time, you should
				start by reading the <a href="user_guide/">User Guide</a>.
			</p>
		</div>

		<p class="footer">
			Page rendered in <strong>{elapsed_time}</strong> seconds
		</p>
	</div>
	
	
	
	<p>
	
	<h1 style="margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-weight: normal; font-size: 20px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 24px;">
	Audience</h1>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	This documentation is designed for people familiar with&nbsp;<a href="http://www.ecma-international.org/publications/standards/Ecma-262.htm" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-family: inherit; vertical-align: baseline; color: rgb(17, 85, 204);" wrc_done="true">JavaScript</a>&nbsp;&nbsp;programming and object-oriented programming concepts. There are many&nbsp;<a href="http://www.google.com/search?q=javascript+tutorials" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-family: inherit; vertical-align: baseline; color: rgb(17, 85, 204);" wrc_done="true">JavaScript tutorials</a>&nbsp;&nbsp;available on the Web.</p>
<h1 style="margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-weight: normal; font-size: 20px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 24px;">
	Introduction</h1>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	The Google Hosted Libraries provides your applications with stable, reliable, high-speed, globally available access to all of the most popular, open-source JavaScript libraries.</p>
<h1 id="Libraries" style="margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-weight: normal; font-size: 20px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 24px;">
	Libraries</h1>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	To load a hosted library, copy and paste the HTML snippet for that library (shown below) in your web page. For instance, to load jQuery, embed the<code class="snippet" style="margin: 0px; padding: 0px; border: 0px; font-size: 1em; font-family: 'Droid Sans Mono', monospace; vertical-align: baseline; line-height: 1.5; white-space: nowrap; color: rgb(0, 112, 0);">&lt;script src=&quot;//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js&quot;&gt;&lt;/script&gt;</code>&nbsp;snippet in your web page.</p>
<p>
	<a name="Introduction" style="margin: 0px; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; text-decoration: underline; color: rgb(17, 85, 204); line-height: 21px;"></a></p>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	The following section lists all of the libraries currently hosted. We list the library name and all of the supported versions.</p>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	&nbsp;</p>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	&nbsp;</p>
<p style="margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-size: 13px; font-family: Arial, sans-serif; vertical-align: baseline; line-height: 21px;">
	&nbsp;</p>
	
	
	
	
	</p>

</body>
</html>