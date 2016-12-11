
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
            <form method="post" enctype="multipart/form-data" id="edit_vehicle_form" name="edit_vehicle_form">
                <div class="f-row">
                    <div class="one-half">
                        <label for="make">Make</label><span class="error">*</span>
                        <select id="make" name="make" class="uniform-input">
                            <option value="">Select Make</option>
                            <?php foreach ($makes as $make) { ?>
                                <option value="<?php echo $make->id; ?>" <?php if ($make->id == $vehicle->make): ?> selected="true" <?php endif; ?>><?php echo $make->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="model">Model</label><span class="error">*</span>
                        <select id="model" name="model">
                            <option value="">Select Model</option>
                            <?php foreach ($models as $model) { ?>
                                <option value="<?php echo $model->id; ?>" <?php if ($model->id == $vehicle->model): ?> selected="true" <?php endif; ?>><?php echo $model->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="f-row">
                    <div class="one-half">
                        <label for="year">Year</label><span class="error">*</span>
                        <select id="year" name="year">
                            <option value=""  >Choose a year</option>
                            <option value="2017" <?php if ($vehicle->year == '2017'): ?> selected="true" <?php endif; ?>>2017</option>
                            <option value="2016" <?php if ($vehicle->year == '2016'): ?> selected="true" <?php endif; ?>>2016</option>
                            <option value="2015" <?php if ($vehicle->year == '2015'): ?> selected="true" <?php endif; ?>>2015</option>
                            <option value="2014" <?php if ($vehicle->year == '2014'): ?> selected="true" <?php endif; ?>>2014</option>
                            <option value="2013" <?php if ($vehicle->year == '2013'): ?> selected="true" <?php endif; ?>>2013</option>
                            <option value="2012" <?php if ($vehicle->year == '2012'): ?> selected="true" <?php endif; ?>>2012</option>
                            <option value="2011" <?php if ($vehicle->year == '2011'): ?> selected="true" <?php endif; ?>>2011</option>
                            <option value="2010" <?php if ($vehicle->year == '2010'): ?> selected="true" <?php endif; ?>>2010</option>
                            <option value="2009" <?php if ($vehicle->year == '2009'): ?> selected="true" <?php endif; ?>>2009</option>
                            <option value="2008" <?php if ($vehicle->year == '2008'): ?> selected="true" <?php endif; ?>>2008</option>
                            <option value="2007" <?php if ($vehicle->year == '2007'): ?> selected="true" <?php endif; ?>>2007</option>
                            <option value="2006" <?php if ($vehicle->year == '2006'): ?> selected="true" <?php endif; ?>>2006</option>
                            <option value="2005" <?php if ($vehicle->year == '2005'): ?> selected="true" <?php endif; ?>>2005</option>
                            <option value="2004" <?php if ($vehicle->year == '2004'): ?> selected="true" <?php endif; ?>>2004</option>
                            <option value="2003" <?php if ($vehicle->year == '2003'): ?> selected="true" <?php endif; ?>>2003</option>
                            <option value="2002" <?php if ($vehicle->year == '2002'): ?> selected="true" <?php endif; ?>>2002</option>
                            <option value="2001" <?php if ($vehicle->year == '2001'): ?> selected="true" <?php endif; ?>>2001</option>
                            <option value="2000" <?php if ($vehicle->year == '2000'): ?> selected="true" <?php endif; ?>>2000</option>
                            <option value="1999" <?php if ($vehicle->year == '1999'): ?> selected="true" <?php endif; ?>>1999</option>
                            <option value="1998" <?php if ($vehicle->year == '1998'): ?> selected="true" <?php endif; ?>>1998</option>
                            <option value="1997" <?php if ($vehicle->year == '1997'): ?> selected="true" <?php endif; ?>>1997</option>
                            <option value="1996" <?php if ($vehicle->year == '1996'): ?> selected="true" <?php endif; ?>>1996</option>
                            <option value="1995" <?php if ($vehicle->year == '1995'): ?> selected="true" <?php endif; ?>>1995</option>
                            <option value="1994" <?php if ($vehicle->year == '1994'): ?> selected="true" <?php endif; ?>>1994</option>
                            <option value="1993" <?php if ($vehicle->year == '1993'): ?> selected="true" <?php endif; ?>>1993</option>
                            <option value="1992" <?php if ($vehicle->year == '1992'): ?> selected="true" <?php endif; ?>>1992</option>
                            <option value="1991" <?php if ($vehicle->year == '1991'): ?> selected="true" <?php endif; ?>>1991</option>
                            <option value="1990" <?php if ($vehicle->year == '1990'): ?> selected="true" <?php endif; ?>>1990</option>
                            <option value="1989" <?php if ($vehicle->year == '1989'): ?> selected="true" <?php endif; ?>>1989</option>
                            <option value="1988" <?php if ($vehicle->year == '1988'): ?> selected="true" <?php endif; ?>>1988</option>
                            <option value="1987" <?php if ($vehicle->year == '1987'): ?> selected="true" <?php endif; ?>>1987</option>
                            <option value="1986" <?php if ($vehicle->year == '1986'): ?> selected="true" <?php endif; ?>>1986</option>
                            <option value="1985" <?php if ($vehicle->year == '1985'): ?> selected="true" <?php endif; ?>>1985</option>
                            <option value="1984" <?php if ($vehicle->year == '1984'): ?> selected="true" <?php endif; ?>>1984</option>
                            <option value="1983" <?php if ($vehicle->year == '1983'): ?> selected="true" <?php endif; ?>>1983</option>
                            <option value="1982" <?php if ($vehicle->year == '1982'): ?> selected="true" <?php endif; ?>>1982</option>
                            <option value="1981" <?php if ($vehicle->year == '1981'): ?> selected="true" <?php endif; ?>>1981</option>
                            <option value="1980" <?php if ($vehicle->year == '1980'): ?> selected="true" <?php endif; ?>>1980</option>
                            <option value="1979" <?php if ($vehicle->year == '1979'): ?> selected="true" <?php endif; ?>>1979</option>
                            <option value="1978" <?php if ($vehicle->year == '1978'): ?> selected="true" <?php endif; ?>>1978</option>
                            <option value="1977" <?php if ($vehicle->year == '1977'): ?> selected="true" <?php endif; ?>>1977</option>
                            <option value="1976" <?php if ($vehicle->year == '1976'): ?> selected="true" <?php endif; ?>>1976</option>
                            <option value="1975" <?php if ($vehicle->year == '1975'): ?> selected="true" <?php endif; ?>>1975</option>
                            <option value="1974" <?php if ($vehicle->year == '1974'): ?> selected="true" <?php endif; ?>>1974</option>
                            <option value="1973" <?php if ($vehicle->year == '1973'): ?> selected="true" <?php endif; ?>>1973</option>
                            <option value="1972" <?php if ($vehicle->year == '1972'): ?> selected="true" <?php endif; ?>>1972</option>
                            <option value="1971" <?php if ($vehicle->year == '1971'): ?> selected="true" <?php endif; ?>>1971</option>
                            <option value="1970" <?php if ($vehicle->year == '1970'): ?> selected="true" <?php endif; ?>>1970</option>
                            <option value="1969" <?php if ($vehicle->year == '1969'): ?> selected="true" <?php endif; ?>>1969</option>
                            <option value="1968" <?php if ($vehicle->year == '1968'): ?> selected="true" <?php endif; ?>>1968</option>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="type">Vehicle Type</label><span class="error">*</span>
                        <select id="type" name="type">
                            <option value="">Select Vehicle Type</option>
                            <option value="van" <?php if ($vehicle->type == 'van'): ?> selected="true" <?php endif; ?>>Van</option>
                            <option value="car" <?php if ($vehicle->type == 'car'): ?> selected="true" <?php endif; ?>>Car</option>
                            <option value="bus" <?php if ($vehicle->type == 'bus'): ?> selected="true" <?php endif; ?>>Bus</option>
                            <option value="freight_vehicle" <?php if ($vehicle->type == 'freight_vehicle'): ?> selected="true" <?php endif; ?>>Freight Vehicle</option>
                        </select>
                    </div>
                </div>

                <div class="f-row">

                    <div class="one-third">
                        <label for="seats"> Number Of Seats</label>
                        <input type="number" id="seats" class="uniform-input number" name="seats" value="<?php echo $vehicle->seats; ?>"/>
                    </div>
                    <div class="one-third">
                        <label for="vehicle_no">Vehicle Registration Number</label><span class="error">*</span>
                        <input type="text" name="vehicle_no" id="vehicle_no" class="uniform-input" value="<?php echo $vehicle->vehicle_no; ?>"/>
                    </div>
                    <div class="one-third">
                        <label>Features</label>
                        <br>
                        <input type="checkbox" id="is_ac" name="is_ac" value="1" <?php if ($vehicle->isAc == 'Y'): ?> checked="true" <?php endif; ?>/>
                        <label for="is_ac">Air Conditioning</label>
                    </div>
                </div>
                <div class="f-row">
                    <?php if (!empty($routes)): ?>
                        <?php
                        $service_type = '';
                        foreach ($routes as $route) {
                            $service_type = $route->service_type;
                            break;
                            ?>
                        <?php } ?>
                    <?php endif; ?>
                    <div class="one-half">
                        <label for="service_type">Service Type</label>
                        <select id="service_type" name="service_type">
                            <option value=""  selected="">Select Service Type</option>
                            <option value="staff" <?php if ($service_type == 'staff'): ?> selected="true" <?php endif; ?>>Staff Services</option>
                            <option value="school" <?php if ($service_type == 'school'): ?> selected="true" <?php endif; ?>>School Services</option>
                            <option value="special" <?php if ($service_type == 'special'): ?> selected="true" <?php endif; ?>>Special Hires</option>
                            <option value="freight" <?php if ($service_type == 'freight'): ?> selected="true" <?php endif; ?>>Freight Transportation</option>
                        </select>
                    </div>
                    <div class="one-half">
                        <label for="route" class="route-label">Route</label>
                        <input type="text" id="route" name="route" placeholder="Type Names Of Cities,Schools,Places " class="route-text"/>
                        <input type="button" id="add" value="Add" class="route-add"/>

                        <ul class="route-list">
                            <?php if (!empty($routes)): ?>
                                <?php foreach ($routes as $route) { ?>
                                    <li><p class="route-item"><?php echo $route->route; ?></p><span class="clse">remove</span></li>
                                <?php } ?>
                            <?php endif; ?>   
                        </ul>
                        <div id="route_inputs">
                            <?php if (!empty($routes)): ?>
                                <?php foreach ($routes as $route) { ?>
                                    <input type="hidden" name="vehi_routes[]" value="<?php echo $route->route; ?>" />
                                <?php } ?>
                            <?php endif; ?>
                        </div>
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
                        <textarea name="description" id="description" placeholder="Description of charges i.e.Per Km Charge, Waiting time charge,etc"><?php echo $vehicle->description; ?></textarea>
                    </div>
                </div>

                <div class="actions">
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo $vehicle->id; ?>" />
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

        $("#edit_vehicle_form").validate({
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
                $.post(site_url + '/vehicles/update_vehicle', $('#edit_vehicle_form').serialize(), function (msg)
                {
                    if (msg == 1) {
                        swal("VanUncle.lk", "Vehicle Successfully Updated!!", "success");
                        setTimeout("location.href = site_url+'/account';", 1000);
                    } else {
                        swal("VanUncle.lk", "Error occured in saving the vehicle", "error");
                    }

                });
            }

        });
    });



</script>
