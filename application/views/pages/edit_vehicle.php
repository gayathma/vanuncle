
<header class="site-title color" >
    <div class="wrap">
        <div class="container">
            <h1>Edit Vehicle</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                    <li>Edit Vehicle</li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- //Page info -->

<div class="wrap">
    <div class="row">
        <!--- Content -->
        <div class="full-width content">
            <h2>Edit Vehicle Details</h2>
            <p>Please ensure all of the required fields are completed. This information is imperative to ensure a smooth journey.<br />All fields are required.</p>
        </div>
        <!--- //Content -->

        <div class="four-fourth">
            <form method="post" enctype="multipart/form-data" id="add_vehicle_form" name="add_vehicle_form">
                <div class="f-row">
                    <div class="one-half">
                        <label for="make">Make</label><span class="error">*</span>
                        <select id="make" name="make" class="uniform-input">
                            <option value="">Select Make</option>
                            <?php foreach ($makes as $make) { ?>
                                <option value="<?php echo $make->id; ?>" <?php if($make->id == $vehicle->make):?> selected="true" <?php endif;?>><?php echo $make->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="model">Model</label><span class="error">*</span>
                        <select id="model" name="model">
                            <option value="">Select Model</option>
                        </select>
                    </div>
                </div>
                <div class="f-row">
                    <div class="one-half">
                        <label for="year">Year</label><span class="error">*</span>
                        <select id="year" name="year">
                            <option value=""  >Choose a year</option>
                            <option value="2017" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2017</option>
                            <option value="2016" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2016</option>
                            <option value="2015" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2015</option>
                            <option value="2014" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2014</option>
                            <option value="2013" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2013</option>
                            <option value="2012" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2012</option>
                            <option value="2011" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2011</option>
                            <option value="2010" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2010</option>
                            <option value="2009" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2009</option>
                            <option value="2008" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2008</option>
                            <option value="2007" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2007</option>
                            <option value="2006" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2006</option>
                            <option value="2005" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2005</option>
                            <option value="2004" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2004</option>
                            <option value="2003" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2003</option>
                            <option value="2002" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2002</option>
                            <option value="2001" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2001</option>
                            <option value="2000" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>2000</option>
                            <option value="1999" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1999</option>
                            <option value="1998" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1998</option>
                            <option value="1997" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1997</option>
                            <option value="1996" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1996</option>
                            <option value="1995" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1995</option>
                            <option value="1994" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1994</option>
                            <option value="1993" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1993</option>
                            <option value="1992" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1992</option>
                            <option value="1991" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1991</option>
                            <option value="1990" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1990</option>
                            <option value="1989" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1989</option>
                            <option value="1988" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1988</option>
                            <option value="1987" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1987</option>
                            <option value="1986" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1986</option>
                            <option value="1985" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1985</option>
                            <option value="1984" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1984</option>
                            <option value="1983" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1983</option>
                            <option value="1982" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1982</option>
                            <option value="1981" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1981</option>
                            <option value="1980" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1980</option>
                            <option value="1979" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1979</option>
                            <option value="1978" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1978</option>
                            <option value="1977" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1977</option>
                            <option value="1976" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1976</option>
                            <option value="1975" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1975</option>
                            <option value="1974" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1974</option>
                            <option value="1973" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1973</option>
                            <option value="1972" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1972</option>
                            <option value="1971" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1971</option>
                            <option value="1970" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1970</option>
                            <option value="1969" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1969</option>
                            <option value="1968" <?php if($vehicle->year == '2017'):?> selected="true" <?php endif;?>>1968</option>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="type">Vehicle Type</label><span class="error">*</span>
                        <select id="type" name="type">
                            <option value="">Select Vehicle Type</option>
                            <option value="van">Van</option>
                            <option value="car">Car</option>
                            <option value="bus">Bus</option>
                            <option value="freight_vehicle">Freight Vehicle</option>
                        </select>
                    </div>
                </div>

                <div class="f-row">

                    <div class="one-third">
                        <label for="seats"> Number Of Seats</label>
                        <input type="number" id="seats" class="uniform-input number" name="seats"/>
                    </div>
                    <div class="one-third">
                        <label for="vehicle_no">Vehicle Registration Number</label><span class="error">*</span>
                        <input type="text" name="vehicle_no" id="vehicle_no" class="uniform-input"/>
                    </div>
                    <div class="one-third">
                        <label>Features</label>
                        <br>
                        <input type="checkbox" id="is_ac" name="is_ac" value="1"/>
                        <label for="is_ac">Air Conditioning</label>
                    </div>
                </div>
                <div class="f-row">

                    <div class="one-half">
                        <label for="service_type">Service Type</label>
                        <select id="service_type" name="service_type">
                            <option value=""  selected="">Select Service Type</option>
                            <option value="staff">Staff Services</option>
                            <option value="school">School Services</option>
                            <option value="special">Special Hires</option>
                            <option value="freight">Freight Transportation</option>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="route" class="route-label">Route</label>
                        <input type="text" id="route" name="route" placeholder="Type Names Of Cities,Schools,Places " class="route-text"/>
                        <input type="button" id="add" value="Add" class="route-add"/>

                        <ul class="route-list">

                        </ul>
                        <div id="route_inputs"></div>
                    </div>
                </div>

                <div class="f-row">
                    <div class="one">
                        <label for="file">Vehicle Images</label>
                        <div  id="drop" class="dropzone">
                            <div class="dz-message needsclick">
                                Drop your vehicle images here or click to upload.<br>
                                <span class="note needsclick">(You can upload maximum 3 images.)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="vehicle_uploaded_images">
                </div>

                <div class="f-row">
                    <div class="one">
                        <label for="type">Description</label>
                        <textarea name="description" id="description" placeholder="Description of charges i.e.Per Km Charge, Waiting time charge,etc"></textarea>
                    </div>
                </div>

                <div class="actions">
                    <input type="submit" class="btn medium color right" value="Submit"/>
                </div>
            </form>
        </div>

        
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>

<script type="text/javascript">
    $("div#drop").dropzone({
        url: site_url + "/vehicles/upload_vehicle_images",
        maxFiles: 3,
        acceptedFiles: "image/*",
        success: function (file, response) {
            obj = jQuery.parseJSON(response);
            $('#vehicle_uploaded_images').append('<input type="hidden" name="vehi_images[]" value="' + obj.filename + '" />');
        }
    });



    $('.route-add').click(function () {
        if ($('#route').val() != '') {
            $('.route-list').append('<li><p class="route-item">' + $('#route').val() + '</p><span class="clse">remove</span></li>');
            $('#route_inputs').append('<input type="hidden" name="vehi_routes[]" value="' + $('#route').val() + '" />');
            $('#route').val('');
        }
    });
    $('.route-list').on('click', '.clse', function () {
        $(this).parent().remove();
    });


    function initialize() {
        var input = document.getElementById('route');
        var options = {componentRestrictions: {country: 'LK'}};

        new google.maps.places.Autocomplete(input, options);
    }

    google.maps.event.addDomListener(window, 'load', initialize);



    //Make on change
    $('#make').on('change', function (e) {

        var make = $(this).val();

        $.post(site_url + '/vehicles/get_models_for_make', {make: make}, function (msg)
        {
            $('#model').html(msg);
        });
    });


    $(document).ready(function () {

        $("#add_vehicle_form").validate({
            ignore: ":hidden:not('select')",
            rules: {
                make: {
                    required: true
                },
                model: {
                    required: true
                },
                year: {
                    required: true
                },
                type: {
                    required: true
                },
                vehicle_no: {
                    required: true
                }
            },
            messages: {
                make: {
                    required: "Please select make of your vehicle"
                },
                model: {
                    required: "Please select model of your vehicle"
                },
                year: {
                    required: "Please select year"
                },
                type: {
                    required: "Please select vehicle type"
                },
                vehicle_no: {
                    required: "Please enter vehicle registration number"
                }
            }, submitHandler: function (form)
            {
                $.post(site_url + '/vehicles/add_new_vehicle', $('#add_vehicle_form').serialize(), function (msg)
                {
                    if (msg == 1) {
                        swal("VanUncle.lk", "Vehicle Successfully Saved!!", "success");
                        setTimeout("location.href = site_url+'/account';", 1000);
                    } else {
                        swal("VanUncle.lk", "Error occured in saving the vehicle", "error");
                    }

                });
            }

        });
    });



</script>
