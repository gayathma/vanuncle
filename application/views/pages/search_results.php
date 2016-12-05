<!-- Search -->
<div class="advanced-search color">
    <div class="wrap">
        <form role="form">
            <!-- Row -->
            <div class="f-row">
                <div class="form-group datepicker one-third">
                    <label for="service_type">Service</label>
                    <select id="service_type" class="form-control" name="service_type">
                        <option selected>&nbsp;</option>
                        <option value="staff">Staff Services</option>
                        <option value="school">School Services</option>
                        <option value="special">Special Hires</option>
                        <option value="freight">Freight Transportation</option>
                    </select>
                </div>
                <div class="form-group select one-third">
                    <label>Pick up location</label>
                    <input type="text" id="pick_up_loc" name="pick_up_loc"/>
                </div>
                <div class="form-group select one-third">
                    <label>Drop off location</label>
                    <input type="text" id="drop_off_loc" name="drop_off_loc"/>
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
            <h2>Select transfer type for your DEPARTURE</h2>

            <div class="results">
                <?php if(!is_null($results) && count($results) > 0){?>
                    <?php foreach($results as $result){?>
                        <!-- Item -->
                        <article class="result">
                            <div class="one-fourth heightfix">
                                <?php if($result->image_path != ''):?>
                                    <img src="<?php echo base_url(); ?>uploads/vehicles/<?php echo $result->image_path; ?>"  class="image-responsive" />
                                <?php else:?>
                                    <img src="<?php echo base_url(); ?>uploads/vehicles/default.png"  class="image-responsive"/>
                                <?php endif;?>
                            </div>
                            <div class="one-half heightfix">
                                <h3><?php echo $result->make_name.' '.$result->model_name.' '.$result->year;?> <a href="javascript:void(0)" class="trigger color" title="Read more">?</a></h3>
                                <ul>
                                    <li>
                                        <span class="ico people"></span>
                                        <p><strong><?php echo $result->seats;?> seats</strong></p>
                                    </li>
                                    <li>
                                        <span class="ico luggage"></span>
                                        <p>Max <strong>3 suitcases</strong> <br />per vehicle</p>
                                    </li>
                                    <li>
                                        <span class="ico time"></span>
                                        <p>Estimated time <br /><strong>50 mins</strong></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="one-fourth heightfix">
                                <div>
                                    <div class="price">130,00 <small>USD</small></div>
                                    <span class="meta">per passenger</span>
                                    <a href="booking-step1.html" class="btn grey large">select</a>
                                </div>
                            </div>
                            <div class="full-width information">	
                                <a href="javascript:void(0)" class="close color" title="Close">x</a>
                                <p><?php echo $result->description; ?></p>
                            </div>
                        </article>
                        <!-- //Item -->
                    <?php }?>
                <?php }else{?>
                        <h3>No results found. <a href="<?php echo site_url(); ?>/contact">Please click here to make an inquiry.</a></h3>
                <?php }?>
            </div>

        </div>
        <!--- //Content -->
    </div>
</div>