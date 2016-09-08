$(document).ready(function() {


    add_sub_discipline_validate = $('#add_sub_discipline').validate({
        highlight: function(element) {
            $(element).closest('div.elVal').addClass("form-field error");
        },
        unhighlight: function(element) {
            $(element).closest('div.elVal').removeClass("form-field error");
        },
        rules: {
            category_eng: 'required',
            //attribute_id:'required'

        },
        messages: {
            category_eng: 'Please enter the sub discipline in English',
            // attribute_id: 'Please select a attribute'

        },
        submitHandler: function(form) {

            $.post(site_url + '/sub_discipline/addSubDiscipline', $('#add_sub_discipline').serialize(), function(msg) {

                if (msg==1)
                {
                    //alert(msg);
                    window.location = site_url + "/Sub_discipline/manageSubDisciplines";
                    $('#custom_alert').html('<div class="success canhide">Discipline Sub Category Successfully Saved !</div>');
                }

                else
                {

                    //alert(msg);
                   $('#custom_alert').html('<div class="warning">Error adding Discipline Sub Category. Try again !</div>');
                }
            });

        }
    });


    edit_sub_discipline_validate = $('#edit_sub_discipline').validate({
        highlight: function(element) {
            $(element).closest('div.elVal').addClass("form-field error");
        },
        unhighlight: function(element) {
            $(element).closest('div.elVal').removeClass("form-field error");
        },
        rules: {
            category_eng: 'required'

        },
        messages: {
            category_eng: 'Please enter a Category name',
            // attribute_eng: 'Please enter an attribute name',
            // added_by: 'Logged in user',

        },
        submitHandler: function(form) {

            $.post(site_url + '/sub_discipline/updateSubDisciplines', $('#edit_sub_discipline').serialize(), function(msg) {
                alert(msg);
                if (jQuery.trim(msg.split(' ########## ')[1]) == 'success canhide')
                {
                    window.location = site_url + "/sub_discipline/manageSubDisciplines";
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }

                else
                {
                    $('#custom_alert').html('<div class="' + jQuery.trim(msg.split(' ########## ')[1]) + '">' + jQuery.trim(msg.split(' ########## ')[0]) + '</div>');
                }
            });
        }


    });



});


function test() {

    alert(1);


}

function deleteSDiscipline(id) {


    if (confirm('Are you sure want to delete this Discipline Sub Category ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/sub_discipline/deleteSDiscipline',
            data: "id=" + id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#category_id_' + id).hide();
                    //window.location = site_url + "/sub_discipline/manageSubDisciplines";
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Item Types');
                }
            }

        });

    }



}



