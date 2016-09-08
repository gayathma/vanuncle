    








function updateContent() {

    var content_text = encodeURIComponent(CKEDITOR.instances.content_text
            .getData());
    var content_id = $('#content_id').val();

    $
            .ajax({
                type: "POST",
                url: site_url + '/content_controller/updatecontentbyid',
                data: "content_text=" + content_text + "& content_id="
                        + content_id,
                success: function(msg) {
                    // alert(msg);

                    if (msg == 1) {
                        $('#rtn_msg')
                                .html(
                                        '<div class="success canhide">Successfully updated.</div>');

                    } else {
                        $('#rtn_msg')
                                .html(
                                        '<div class="warning canhide">An error occured.</div>');

                    }

                }

            });

}



function addsliderimage() {

    var slider_order = $('#slider_order').val();
    var picFileName = $('#picFileName').val();
    var slider_no = $('#slider_no').val();
    var slider_title = $('#slider_title').val();




    $
            .ajax({
                type: "POST",
                url: site_url + '/slider_controller/addsliderimage',
                data: "slider_order=" + slider_order + "& picFileName="
                        + picFileName + "& slider_no=" + slider_no + "& slider_title=" + slider_title,
                success: function(msg) {
                   // alert(msg);

                    if (msg == 1) {
                        $('#rtn_msg')
                                .html(
                                        '<div class="success canhide">Successfully added.</div>');

                        location.reload();
                        /*
                         * setTimeout( "location.href =
                         * site_url+'/tour_packages_controller/manage_tour_packages/';",
                         * 100);
                         */

                    } else {

                        $('#rtn_msg')
                                .html(
                                        '<div class="warning canhide">An error occured.</div>');

                        // $('#rtn_msg')
                        // .html(msg);

                    }

                }

            });

}

function addspcloffrsliderimage() {

    var slider_order = $('#slider_order').val();
    var picFileName = $('#picFileName').val();
    var slider_no = $('#spcl_ofrs_slider_no').val();
    var spcl_ofr_ttle = $('#spcl_ofr_ttle').val();
    var spcl_afr_discnt = $('#spcl_afr_discnt').val();
    var spcl_ofr_lnk = $('#spcl_ofr_lnk').val();

    $
            .ajax({
                type: "POST",
                url: site_url + '/spcl_ofrs_slider_controller/addslclofrsliderimage',
                data: "slider_order=" + slider_order + "& picFileName="
                        + picFileName + "& slider_no=" + slider_no + "& spcl_ofr_ttle=" + spcl_ofr_ttle + "& spcl_afr_discnt=" + spcl_afr_discnt + "& spcl_ofr_lnk=" + spcl_ofr_lnk,
                success: function(msg) {
                    //alert(msg);

                    if (msg == 1) {
                        $('#rtn_msg')
                                .html(
                                        '<div class="success canhide">Successfully added.</div>');

                        location.reload();
                        /*
                         * setTimeout( "location.href =
                         * site_url+'/tour_packages_controller/manage_tour_packages/';",
                         * 100);
                         */

                    } else {

                        $('#rtn_msg')
                                .html(
                                        '<div class="warning canhide">An error occured.</div>');

                        // $('#rtn_msg')
                        // .html(msg);

                    }

                }

            });

}




function updatespcloffrsliderimage() {

    var slider_order = $('#slider_order').val();
    var picFileName = $('#picFileName').val();
    var slider_no = $('#spcl_ofrs_slider_no').val();
    var spcl_ofr_ttle = $('#spcl_ofr_ttle').val();
    var spcl_afr_discnt = $('#spcl_afr_discnt').val();
    var spcl_ofr_lnk = $('#spcl_ofr_lnk').val();
    var spcl_ofrs_slider_id = $('#spcl_ofrs_slider_id').val();

    $
            .ajax({
                type: "POST",
                url: site_url + '/spcl_ofrs_slider_controller/updateslclofrsliderimage',
                data: "slider_order=" + slider_order + "& picFileName="
                        + picFileName + "& slider_no=" + slider_no + "& spcl_ofr_ttle=" + spcl_ofr_ttle + "& spcl_afr_discnt=" + spcl_afr_discnt + "& spcl_ofr_lnk=" + spcl_ofr_lnk + "& spcl_ofrs_slider_id=" + spcl_ofrs_slider_id,
                success: function(msg) {
                    //alert(msg);

                    if (msg == 1) {
                        $('#rtn_msg')
                                .html(
                                        '<div class="success canhide">Successfully saved.</div>');

                        //  location.reload();

                        setTimeout("location.href =site_url+'/spcl_ofrs_slider_controller/manage_spcl_ofrs_slider/';", 100);


                    } else {

                        $('#rtn_msg')
                                .html(
                                        '<div class="warning canhide">An error occured.</div>');

                        // $('#rtn_msg')
                        // .html(msg);

                    }

                }

            });

}












function savesliderorder(id) {
    //alert(id);


    var slider_ordr = $('#slider_ordr_' + id).val();
  //  alert(slider_ordr);


    $
            .ajax({
                type: "POST",
                url: site_url + '/slider_controller/savesliderorder',
                data: "slider_ordr=" + slider_ordr + "& id="
                        + id,
                success: function(msg) {
                    //alert(msg);

                    if (msg == 1) {

                        location.reload();
                        /*
                         * setTimeout( "location.href =
                         * site_url+'/tour_packages_controller/manage_tour_packages/';",
                         * 100);
                         */

                    } else {



                        // $('#rtn_msg')
                        // .html(msg);

                    }

                }

            });










}


function savespclofrsliderorder(id) {
    //alert(id);


    var slider_ordr = $('#slider_ordr_' + id).val();
    //alert(slider_ordr);


    $
            .ajax({
                type: "POST",
                url: site_url + '/spcl_ofrs_slider_controller/savesliderorder',
                data: "slider_ordr=" + slider_ordr + "& id="
                        + id,
                success: function(msg) {
                    //alert(msg);

                    if (msg == 1) {

                        location.reload();
                        /*
                         * setTimeout( "location.href =
                         * site_url+'/tour_packages_controller/manage_tour_packages/';",
                         * 100);
                         */

                    } else {



                        // $('#rtn_msg')
                        // .html(msg);

                    }

                }

            });


}



function deletetourpackage(id) {

    if (confirm('Are you sure want to delete this Tour Package ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/tour_packages_controller/deletetourpackage',
            data: "id=" + id,
            success: function(msg) {
                // alert(msg);
                if (msg == 1) {
                    // document.getElementById(trid).style.display='none';
                    $('#tour_pck_' + id).hide();
                } else if (msg == 2) {
                    // alert('Cannot be deleted as it is already assigned to
                    // Item Types');
                }
            }

        });

    }

}

function updatetourpackage() {

    var tour_desc = encodeURIComponent(CKEDITOR.instances.tour_desc.getData());
    var tour_name = $('#tour_name').val();
    var tour_package_id = $('#tour_package_id').val();

    $
            .ajax({
                type: "POST",
                url: site_url + '/tour_packages_controller/updatetourpackage',
                data: "tour_desc=" + tour_desc + "& tour_name=" + tour_name
                        + "& tour_package_id=" + tour_package_id,
                success: function(msg) {
                    // alert(msg);

                    if (msg == 1) {
                        $('#rtn_msg')
                                .html(
                                        '<div class="success canhide">Successfully updated.</div>');

                        // location.reload();
                        setTimeout(
                                "location.href = site_url+'/tour_packages_controller/manage_tour_packages/';",
                                100);

                    } else {
                        $('#rtn_msg')
                                .html(
                                        '<div class="warning canhide">An error occured.</div>');

                    }

                }

            });

}




function deletetourpackage(id) {

    if (confirm('Are you sure want to delete this Slider image ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/slider_controller/deletesliderimage',
            data: "id=" + id,
            success: function(msg) {
                // alert(msg);
                if (msg == 1) {
                    // document.getElementById(trid).style.display='none';
                    $('#slider_' + id).hide();
                } else if (msg == 2) {
                    // alert('Cannot be deleted as it is already assigned to
                    // Item Types');
                }
            }

        });

    }

}
