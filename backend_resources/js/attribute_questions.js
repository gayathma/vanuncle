$(document).ready(function() {

    attribute_question_validate = $('#edit_attribute_question').validate({
        highlight: function(element) {
            $(element).closest('div.elVal').addClass("form-field error");
        },
        unhighlight: function(element) {
            $(element).closest('div.elVal').removeClass("form-field error");
        },
        rules: {
            question_eng: 'required',
            attribute_id: 'required'

        },
        messages: {
            question_eng: 'Please enter the attribute in English',
            attribute_id: 'Please select a attribute'

        },
        submitHandler: function(form) {

            $.post(site_url + '/attribute_questions/updateAttributeQuestions', $('#edit_attribute_question').serialize(), function(msg) {
                //alert(msg);
                if (msg == 1)
                {
                    
                    $('#custom_alert').html('<div class="success canhide">Attribute Question successfully Updated.</div>');
                    window.location = site_url + "/attribute_questions/manageAttributeQuestions";
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
            });

        }
    });
    attribute_question_validate = $('#add_attribute_question').validate({
        highlight: function(element) {
            $(element).closest('div.elVal').addClass("form-field error");
        },
        unhighlight: function(element) {
            $(element).closest('div.elVal').removeClass("form-field error");
        },
        rules: {
            question_eng: 'required',
            attribute_id: 'required'

        },
        messages: {
            question_eng: 'Please enter the attribute in English',
            attribute_id: 'Please select a attribute'

        },
        submitHandler: function(form) {

            $.post(site_url + '/attribute_questions/addAttributeQuestions', $('#add_attribute_question').serialize(), function(msg) {

                if (msg == 1)
                {
                    //alert(msg);
                    window.location = site_url + "/attribute_questions/manageAttributeQuestions";

                     $('#custom_alert').html('<div class="success canhide">Attribute Question successfully Saved.</div>');
                }

                else
                {
                    //alert(msg);
                     $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }
            });

        }
    });
    $(document).on('click', '.delete_attribute_question', function() {

        var question_id = $(this).attr('id');
        if (confirm('Are you sure you want to delete this attribute question ?')) {
            $.post(site_url + '/attribute_questions/removeAttributeQuestion', 'question_id=' + question_id, function(msg) {

                //alert(msg);
                if (msg ==1)
                {

                    $('#custom_alert').html('<div class="success canhide">Attribute Question successfully Deleted.</div>');
                    $('#row_' + question_id).hide();
                }

                else
                {
                    $('#custom_alert').html('<div class="warning">Error occured. Try again !</div>');
                }



            });
        }

    });
});