////  <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery-1.8.3.min.js"></script>
//// <script type="text/javascript" src="<?php echo base_url(); ?>backend_resources/js/jquery-ui-1.10.3.js"></script>
//
//
//$(document).ready(function() {
//
//
//    jQuery.ajaxSetup({async: false});
//
//    $(function() {
//        var pickerOpts = {
//            dateFormat: $.datepicker.ISO_8601
//        };
//        $("#from_date").datepicker(pickerOpts);
//        $("#to_date").datepicker(pickerOpts);
//    });
//
//});
//////////////////////////////JQuery Date Picker

function eraseText() {
    document.getElementById("student_name").value = "";
    document.getElementById("from_date").value = "";
    document.getElementById("to_date").value = "";
}

////////////////////////////clear text inputs

