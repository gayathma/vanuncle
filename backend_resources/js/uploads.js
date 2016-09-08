$(document).ready(function() {
    
    
    jQuery.ajaxSetup({async: false});
    
    
    
    
      
var btnUpload=$('#jd_pdf_en');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: site_url + '/occupations/upload/jd_pdf_en',
			name: 'jd_pdf_eng',
			onSubmit: function(file, ext){
				 if (! (ext && /^(pdf)$/.test(ext))){ 
                    // extension is not allowed 
					alert('Only PDF is allowed');
					return false;
				}
				//status.text('Uploading...Please wait');
				
				
			},
			onComplete: function(file, response){
				//On completion clear the status
				//status.text('');
					//alert(1);
				//Add uploaded file to list
				
				
				if(response!="error"){
					//alert(response);
					
					
                                        $("#jd_pdf_eng").attr('value',response);
                                        $("#jd_pdf_eng_file").html('<a href="'+base_url+"uploads/occupation/eng/"+response+'" target="_blank">'+response+'</a>');
				} else{
					$("#jd_pdf_eng").attr('value','');
                                        $("#jd_pdf_eng_file").html('');
				}
			}
		});

var btnUpload1=$('#jd_pdf_si');
		var status=$('#status');
		new AjaxUpload(btnUpload1, {
			action: site_url + '/occupations/upload/jd_pdf_si',
			name: 'jd_pdf_sin',
			onSubmit: function(file, ext){
				 if (! (ext && /^(pdf)$/.test(ext))){ 
                    // extension is not allowed 
					alert('Only PDF is allowed');
					return false;
				}
				//status.text('Uploading...Please wait');
				
				
			},
			onComplete: function(file, response){
				//On completion clear the status
				//status.text('');
					$("#sta").html("");
				//Add uploaded file to list
				if(response!="error"){
                                        $("#jd_pdf_sin").attr('value',response);
                                        $("#jd_pdf_sin_file").html('<a href="'+base_url+"uploads/occupation/sin/"+response+'" target="_blank">'+response+'</a>');
				} else{
					$("#jd_pdf_sin").attr('value','');
                                        $("#jd_pdf_eng_file").html('');
				}
			}
		});
var btnUpload2=$('#jd_pdf_ta');
		var status=$('#status');
		new AjaxUpload(btnUpload2, {
			action: site_url + '/occupations/upload/jd_pdf_ta',
			name: 'jd_pdf_tam',
			onSubmit: function(file, ext){
				 if (! (ext && /^(pdf)$/.test(ext))){ 
                    // extension is not allowed 
					alert('Only PDF is allowed');
					return false;
				}
				//status.text('Uploading...Please wait');
				
				
			},
			onComplete: function(file, response){
				//On completion clear the status
				//status.text('');
					
				//Add uploaded file to list
				if(response!="error"){
                                        $("#jd_pdf_tam").attr('value',response);
                                        $("#jd_pdf_tam_file").html('<a href="'+base_url+"uploads/occupation/tam/"+response+'" target="_blank">'+response+'</a>');
				} else{
					$("#jd_pdf_tam").attr('value','');
                                        $("#jd_pdf_tam_file").html('');
				}
			}
		});
    
    
    
    
    
});