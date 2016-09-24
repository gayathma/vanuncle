
<header class="site-title color" >
    <div class="wrap">
        <div class="container">
            <h1>Add Vehicle</h1>
            <nav role="navigation" class="breadcrumbs">
                <ul>
                    <li><a href="<?php echo site_url(); ?>" title="Home">Home</a></li>
                    <li>Add Vehicle</li>
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
            <h2>Vehicle Details</h2>
            <p>Please ensure all of the required fields are completed. This information is imperative to ensure a smooth journey.<br />All fields are required.</p>
        </div>
        <!--- //Content -->

        <div class="three-fourth">
            <form method="post" enctype="multipart/form-data">
                <div class="f-row">
                    <div class="one-half">
                        <label for="make_model">Make and Model</label>
                        <input type="text" id="make_model" name="make_model" placeholder="e.g. Mazda Axela"/>
                    </div>
                    <div class="one-half">
                        <label for="year">Year</label>
                        <select id="year" name="year">
                            <option value=""  selected="">Choose a year</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                        </select>
                    </div>
                </div>
                <div class="f-row">

                    <div class="one-half">
                        <label for="seats">Maximum Number Of Seats</label>
                        <input type="number" id="seats" class="uniform-input number" name="seats"/>
                    </div>
                    <div class="one-half">
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
                        <label for="route">Route</label>
                        <input type="text" id="route" name="route"/>
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

                <div class="actions">
                    <a href="booking-step3.html" class="btn medium color right">Submit</a>
                </div>
            </form>
        </div>

        <!--- Sidebar -->
        <aside class="one-fourth sidebar right">
            <!-- Widget -->
            <div class="widget">
                <h4>Booking summary</h4>
                <div class="summary">
                    <div>
                        <h5>DEPARTURE</h5>
                        <dl>
                            <dt>Date</dt>
                            <dd>28.08.2014 10:00</dd>
                            <dt>From</dt>
                            <dd>London bus station</dd>
                            <dt>To</dt>
                            <dd>London airport</dd>
                            <dt>Vehicle</dt>
                            <dd>Private shuttle</dd>
                            <dt>Extras</dt>
                            <dd>2 pieces of baggage up to 15kg</dd>
                        </dl>
                    </div>

                    <div>
                        <h5>RETURN</h5>
                        <dl>
                            <dt>Date</dt>
                            <dd>02.09.2014 17:00</dd>
                            <dt>From</dt>
                            <dd>London airport</dd>
                            <dt>To</dt>
                            <dd>London bus station</dd>
                            <dt>Vehicle</dt>
                            <dd>Private shuttle</dd>
                            <dt>Extras</dt>
                            <dd>2 pieces of baggage up to 15kg</dd>
                        </dl>
                    </div>

                    <dl class="total">
                        <dt>Total</dt>
                        <dd>840,00 usd</dd>
                    </dl>
                </div>
            </div>
            <!-- //Widget -->
        </aside>
        <!--- //Sidebar -->
    </div>
</div>
<script type="text/javascript">
    $("div#drop").dropzone({
        url: "/file/post",
        maxFiles: 3,
        acceptedFiles: "image/*",
    });
</script>