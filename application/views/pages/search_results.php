<!-- Search -->
<div class="advanced-search color">
    <div class="wrap">
        <form role="form" action="<?php echo site_url(); ?>/home/search" method="post">
            <!-- Row -->
            <div class="f-row">
                <div class="form-group datepicker one-third">
                    <label for="service_type">Service</label>
                    <select id="service_type" class="form-control" name="service_type">

                        <option <?php
                        if (isset($service_type) && ($service_type == 'staff')) {
                            echo 'selected';
                        }
                        ?> value="staff">Staff Services</option>
                        <option <?php
                        if (isset($service_type) && ($service_type == 'school')) {
                            echo 'selected';
                        }
                        ?> value="school">School Services</option>
                        <option <?php
                        if (isset($service_type) && ($service_type == 'special')) {
                            echo 'selected';
                        }
                        ?> value="special">Special Hires</option>
                        <option <?php
                        if (isset($service_type) && ($service_type == 'freight')) {
                            echo 'selected';
                        }
                        ?> value="freight">Freight Transportation</option>
                    </select>
                </div>
                <div class="form-group select one-third">
                    <label>Pick up location</label>
                    <input type="text" id="pick_up_loc" name="pick_up_loc" value="<?php
                    if (isset($pick_up_loc)) {
                        echo $pick_up_loc;
                    }
                    ?>"/>
                </div>
                <div class="form-group select one-third">
                    <label>Drop off location</label>
                    <input type="text" id="drop_off_loc" name="drop_off_loc" value="<?php
                    if (isset($drop_off_loc)) {
                        echo $drop_off_loc;
                    }
                    ?>"/>
                </div>
            </div>
            <!-- //Row -->
            <!-- Row -->
            <div class="f-row">
                <div class="form-group right">
                    <button type="submit" class="btn large black">Find a transfer</button>
                </div>
            </div>
            <!--// Row -->
        </form>
    </div>
</div>
<!-- //Search -->

<script>
var routeArr={};

function generateMap(v){
  var map;
  var elevator;
  var myOptions = {
      zoom: 17,
      center: new google.maps.LatLng(0, 0),
      mapTypeId: 'terrain'
  };
  map = new google.maps.Map($('#map_canvas_'+v)[0], myOptions);

  var addresses = routeArr[v];

  for (var x = 0; x < addresses.length; x++) {
      $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
          var p = data.results[0].geometry.location
          var latlng = new google.maps.LatLng(p.lat, p.lng);
          var marker=new google.maps.Marker({
              position: latlng,
              map: map
          });
          map.setZoom(10);
          map.panTo(marker.position)

      });
  }
}
</script>

<div class="wrap">
    <div class="row">
        <!--- Content -->
        <div class="full-width content">
            <h2  class="heading">
                <?php
                if (isset($service_type) && ($service_type == 'staff')) {
                    echo 'Staff Services';
                }
                if (isset($service_type) && ($service_type == 'school')) {
                    echo 'School Services';
                }
                if (isset($service_type) && ($service_type == 'special')) {
                    echo 'Special Hires';
                }
                if (isset($service_type) && ($service_type == 'freight')) {
                    echo 'Freight Transportation';
                }
                ?>
            </h2>

            <div class="results">
                <?php if (!is_null($results) && count($results) > 0) { ?>
                    <?php $vehicle_route_service = new Vehicle_route_service(); ?>
                    <?php
                    foreach ($results as $result) {
                        $routes = $vehicle_route_service->get_routes_for_vehicle($result->driver_id, $result->id, $service_type);
                        ?>
                        <!-- Item -->
                        <article class="result">
                            <div class="one-fourth heightfix">
                                <?php if ($result->image_path != ''): ?>
                                    <img src="<?php echo base_url(); ?>uploads/vehicles/<?php echo $result->image_path; ?>"  class="image-responsive" />
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>uploads/vehicles/default.png"  class="image-responsive"/>
                                <?php endif; ?>
                            </div>
                            <div class="one-half heightfix">
                                <h3><?php echo $result->make_name . ' ' . $result->model_name . ' ' . $result->year; ?>   <a href="javascript:void(0)" class="trigger color" title="View Route"><i class="fa fa-sort-desc" aria-hidden="true"></i></a></h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-taxi icn-size" aria-hidden="true"></i>
                                        <p><?php echo $result->seats; ?> seats</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-snowflake-o icn-size" aria-hidden="true"></i>
                                        <p><?php
                                            if ($result->isAc == 'Y') {
                                                echo 'Air Conditioned';
                                            } else {
                                                echo 'No Air Condition';
                                            }
                                            ?></p>
                                    </li>
                                    <?php if (!empty($routes)): ?>
                                        <li  class="route-sp">
                                          <i class="fa fa-map-marker icn-size" aria-hidden="true" onclick="generateMap(<?php echo $result->id; ?>)"></i>
                                          <script type="text/javascript" language="javascript">
                                            var arr=[];
                                            <?php foreach ($routes as $route) { ?>
                                                <?php $route = explode(',', $route->route) ?>
                                                arr.push('<?php echo $route[0]; ?>');
                                            <?php } ?>
                                            routeArr['<?php echo $result->id; ?>']=arr;
                                            console.log(routeArr);
                                          </script>

                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="one-fourth heightfix">
                                <div>
                                    <?php if ($result->profile_pic != ''): ?>
                                        <img src="<?php echo base_url(); ?>uploads/drivers/<?php echo $result->profile_pic; ?>"  class="image-responsive img-circle" />
                                    <?php else: ?>
                                        <img src="<?php echo base_url(); ?>uploads/drivers/avatar.png"  class="image-responsive  img-circle"/>
                                    <?php endif; ?>
                                    <span class="meta driver-ref">Driver ID #DRV<?php echo str_pad($result->driver_id, 5, '0', STR_PAD_LEFT); ?></span>

                                    <a href="javascript:;" onclick="contact(<?php echo $result->id; ?>)" class="btn grey large contact" style="cursor: pointer">Contact</a>
                                </div>
                            </div>
                            <div class="full-width information">
                                <a href="javascript:void(0)" class="close color" title="Close">x</a>
                                <div id="map_canvas_<?php echo $result->id; ?>" class="map-style"></div>
                               <p><?php echo $result->description; ?></p>
                            </div>
                        </article>
                        <!-- //Item -->
                    <?php } ?>
                <?php }else { ?>
                    <h3>No results found. <a href="<?php echo site_url(); ?>/contact">Please click here to make an inquiry.</a></h3>
                <?php } ?>
            </div>

        </div>
        <!--- //Content -->

        <div class="pagination pull-right">
            <?php echo $links; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>fe_resources/js/jquery.validate.min.js"></script>
<script>
                                        function contact(vehicle_id) {
                                            swal({
                                                title: "Give us your contact details to reach you",
                                                text: '<form role="form" name="request_form" id="request_form"><input type="text" name="username" placeholder="ex : Saman Rathnayake" style="display:block" /><input type="email" style="display:block" name="email" placeholder="ex : samanrath@yahoo.com"/><input style="display:block" type="text" name="phone" placeholder="ex : 0751010101"/></form>',
                                                html: true,
                                                showCancelButton: true,
                                                closeOnCancel: true,
                                                type: "info",
                                                closeOnConfirm: false,
                                            },
                                                    function () {
                                                        console.log("sdfs");
                                                        if($("#request_form").valid()){
                                                            console.log("sdfs2");
                                                            var username = $("input[name='username']").val();
                                                            var email = $("input[name='email']").val();
                                                            var phone = $("input[name='phone']").val();
                                                            if (username != '' && (email != '' || phone != '')) {
                                                                //place ajax call here
                                                                $.post(site_url + '/vehicles/send_vehicle_request', {username: username, email: email, phone: phone, vehicle_id: vehicle_id}, function (msg)
                                                                {
                                                                    if (msg == 1) {
                                                                        swal("VanUncle.lk", "Thanks for the information. We will contact you soon.", "success");
                                                                    } else {
                                                                        swal("VanUncle.lk", "Error occured while sending your request", "error");
                                                                    }

                                                                });
                                                            }
                                                        }

                                                    });
                                        }

                                        $(document).ready(function () {

                                            $("#request_form").validate({
                                                rules: {
                                                    username: {
                                                        required: true
                                                    },
                                                    email: {
                                                        required: true,
                                                        email: true
                                                    },
                                                    phone: {
                                                        required: true,
                                                        digits: true,
                                                        minlength: 10,
                                                        maxlength: 10
                                                    }
                                                }
                                            });
                                        });
</script>
