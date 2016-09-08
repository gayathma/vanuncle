$(document).ready(function(){
   
   jQuery.ajaxSetup({async: false});
   
   
   $('#form_login').validate({
        rules: {
            username: 'required',
            password: 'required'
        },
        messages: {
            username: 'Username required',
            password: 'Password required'
        },
        submitHandler: function(form) {
            $('#custom_alert').html('<div class="info canhide">Authenticating User...</div>');
            
            $.post(site_url + '/login/authenticateUser', $("#form_login").serialize(), function(msg) {
                $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                
                if(jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    
                    window.location = (site_url+"/main_controller");
                }
            });
        }
    });
    
    
});