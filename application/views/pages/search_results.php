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
                    <?php foreach ($results as $result) { ?>
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
                                <h3><?php echo $result->make_name . ' ' . $result->model_name . ' ' . $result->year; ?>  <a href="javascript:void(0)" class="trigger color" title="View Route"><i class="fa fa-sort-desc" aria-hidden="true"></i></a></h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-taxi icn-size" aria-hidden="true"></i>
                                        <p><?php echo $result->seats; ?> seats</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-snowflake-o icn-size" aria-hidden="true"></i>
                                        <p><?php if($result->isAc == 'Y'){ echo 'Air Conditioned'; }else{ echo 'No Air Condition';} ?></p>
                                    </li>
                                    <li  class="route-sp">
                                        <span>Panadura</span>
                                        <span>Moratuwa</span>
                                        <span>Colombo</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="one-fourth heightfix">
                                <div>
                                    <span class="meta">Driver ID #DRV<?php echo str_pad($result->driver_id, 5, '0', STR_PAD_LEFT); ?></span>
                                    <a  class="btn grey large contact">Contact</a>
                                </div>
                            </div>
                            <div class="full-width information">
                                <a href="javascript:void(0)" class="close color" title="Close">x</a>
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

<script>
$('.contact').click(function(){
    swal({
    title: "Give us your contact details to reach you",
    text: '<input type="text" name="username" placeholder="ex : Saman Rathnayake" style="display:block" /><input type="text" style="display:block" name="email" placeholder="ex : samanrath@yahoo.com"/><input style="display:block" type="text" name="phone" placeholder="ex : 0751010101"/>',
    html: true,
    showCancelButton: true,
    closeOnCancel: true,
    type: "info",
    closeOnConfirm: false,
  },
  function(){
    console.log($( "input[name='username']" ).val());
    var username =$( "input[name='username']" ).val();
    var email =$( "input[name='email']" ).val();
    var phone =$( "input[name='phone']" ).val();
    if(username!='' && (email!='' || phone !='')){
      //place ajax call here
      swal("Thanks for the information. We will contact you soon.");
    }

  });
});
</script>
