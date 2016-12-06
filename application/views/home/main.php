<script>
$(document).ready(function(){
  $('#mainback').vide('<?php echo base_url(); ?>fe_resources/video/main', {
     volume: 0,
     playbackRate: 1,
     muted: true,
     loop: true,
     autoplay: true,
     position: '50% 50%', // Similar to the CSS `background-position` property.
     posterType: 'jpg', // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
     resizing: true, // Auto-resizing, read: https://github.com/VodkaBears/Vide#resizing
     bgColor: 'transparent' // Allow custom background-color for Vide div,

  });



});
</script>


  <div id="mainback" style="width: 100%; height: 900px;" ></div>

<!-- //Intro -->

<!-- Search -->
<div class="advanced-search color" id="booking">
    <div class="wrap">
        <form role="form" action="<?php echo site_url(); ?>/home/search" method="post">
            <!-- Row -->
            <div class="f-row">
                <div class="form-group datepicker one-third">
                    <label for="service_type">Service</label>
                    <select id="service_type" class="form-control" name="service_type">
                        <option value="staff">Staff Services</option>
                        <option value="school">School Services</option>
                        <option value="special">Special Hires</option>
                        <option value="freight">Freight Transportation</option>
                    </select>
                </div>
                <div class="form-group  one-third">
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

<!-- Services iconic -->
<div class="services iconic white">
    <div class="wrap">
        <div class="row">
            <!-- Item -->
            <div class="one-third wow fadeIn">
                <span class="circle"><span class="ico telephone"></span></span>
                <h3>24h customer service</h3>
                <p class="p-height">Our team is readily available to provide every customer with a maximized transportation solution; 24 hours a day, 7 days a week, 365 days a year.</p>
            </div>
            <!-- //Item -->

            <!-- Item -->
            <div class="one-third wow fadeIn" data-wow-delay=".2s">
                <span class="circle"><span class="ico shuttle"></span></span>
                <h3>Quality vehicles</h3>
                <p class="p-height">Facilitating quality transportation is the essence of our business; therefore, we consider our network of contracted transportation providers to be the heartbeat of our operation.</p>
            </div>
            <!-- //Item -->

            <!-- Item -->
            <div class="one-third wow fadeIn" data-wow-delay=".4s">
                <span class="circle"><span class="ico heart"></span></span>
                <h3>Safety</h3>
                <p class="p-height">You can be assured of travel safety if you choose to hire professionals instead of trust in your own driving skills.</p>
            </div>
            <!-- //Item -->

            <!-- Item -->
            <div class="one-third wow fadeIn">
                <span class="circle"><span class="ico award"></span></span>
                <h3>Comfortable rides</h3>
                <p class="p-height">You get to enjoy utmost travel convenience with the help of an expert driver and a comfortable ride.</p>
            </div>
            <!-- //Item -->

            <!-- Item -->
            <div class="one-third wow fadeIn" data-wow-delay=".2s">
                <span class="circle"><span class="ico wand"></span></span>
                <h3>On time arrivals</h3>
                <p class="p-height">No more worries about being late, We’ll get you to your destination on time.</p>
            </div>
            <!-- //Item -->

            <!-- Item -->
            <div class="one-third wow fadeIn" data-wow-delay=".4s">
                <span class="circle"><span class="ico clip"></span></span>
                <h3>Wide range of choice</h3>
                <p class="p-height">Our comprehensive data base covers a wide range of transport service providers and service seekers. You can select a service provider of your choice.</p>
            </div>
            <!-- //Item -->
        </div>
    </div>
</div>
<!-- //Services iconic -->



<!-- Services -->
<div class="services boxed white" id="services">
    <!-- Item -->
    <article class="one-fourth wow fadeIn">
        <figure class="featured-image">
            <img src="<?php echo base_url(); ?>fe_resources/images/uploads/img.jpg" alt="" />
            <div class="overlay">
                <a href="services.html" class="expand">+</a>
            </div>
        </figure>
        <div class="details">
            <h4><a href="#">Staff Services</a></h4>
            <p>Why drive on your own to your work place when you can opt for a professional transportation service. You can experience relaxation at its best while enjoying the company of fellow commuters. We are ready to connect you to a vast number of staff service providers covering all most all the routes in Sri Lanka.</p>
        </div>
    </article>
    <!-- //Item -->

    <!-- Item -->
    <article class="one-fourth wow fadeIn" data-wow-delay=".2s">
        <figure class="featured-image">
            <img src="<?php echo base_url(); ?>fe_resources/images/uploads/img4.jpg" alt="" />
            <div class="overlay">
                <a href="services.html" class="expand">+</a>
            </div>
        </figure>
        <div class="details">
            <h4><a href="#">School Services</a></h4>
            <p>Here we connect school van seeking parents to school van service providers. Parent will get reliable School Van services with shortest possible route. Children can enjoy journey with more comfort.</p>
        </div>
    </article>
    <!-- //Item -->

    <!-- Item -->
    <article class="one-fourth wow fadeIn" data-wow-delay=".4s">
        <figure class="featured-image">
            <img src="<?php echo base_url(); ?>fe_resources/images/uploads/img2.jpg" alt="" />
            <div class="overlay">
                <a href="services.html" class="expand">+</a>
            </div>
        </figure>
        <div class="details">
            <h4><a href="#">Special Hires</a></h4>
            <p>Are you looking for a vehicle for a trip? We can send a vehicle anytime, anywhere you want. We have vans, buses and cars A/c, Non A/C, these services can be customized based on your budget and preferences.</p>
        </div>
    </article>
    <!-- //Item -->

    <!-- Item -->
    <article class="one-fourth wow fadeIn" data-wow-delay=".6s">
        <figure class="featured-image">
            <img src="<?php echo base_url(); ?>fe_resources/images/uploads/img3.jpg" alt="" />
            <div class="overlay">
                <a href="services.html" class="expand">+</a>
            </div>
        </figure>
        <div class="details">
            <h4><a href="#">Freight Transportation</a></h4>
            <p>We can connect you for most cost effective Home moving, Office moving services along with goods transportation.</p>
        </div>
    </article>
    <!-- //Item -->
</div>
<!-- //Services -->
