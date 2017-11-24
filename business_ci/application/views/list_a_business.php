<style>
    .sel{
        width:150px;
        height:30px;
    }
    .error{
        color:red;
    }
</style>
<div class="content_middle">
    <div class="container">
        <div class="col-sm-10">
            <div class="main-content">
                <?php
                if ($this->session->flashdata('success')) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Success!</b> 
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?> 
                 <?php
                if ($this->session->flashdata('error')) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>ERROR!</b> 
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?> 
                <div class="regform"> 
                    <h3 style="text-align:center; padding-top:50px;">Add Your Company</h3>
                    <form action="<?php echo base_url(); ?>listbusiness" method="post" class="registration-form" enctype="multipart/form-data" style="padding-left:80px; padding-bottom:50px;">
                        <div class="step1">
                            <div class="form-group full-width">
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name"/>
                                <span class="required-field company_name">company name is required!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <textarea  name="company_description"  class="form-control" placeholder="Company description"></textarea>
                                <span class="required-field company_description">company description is required!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <textarea  name="company_address"  class="form-control" placeholder="Company address"></textarea>
                                <span class="required-field company_address">company address is required!!!</span>
                            </div>

                            <?php
                            $check_validation = $this->business_model->user_validation($this->session->userdata('userid'));
                            if ($check_validation == 0) {
                                ?>
                                <div class="form-group">
                                    <input type="text" name="country_code" value="+971" id="country_code" class="form-control" style="width:8%;float:left;margin-right: 2px;" readonly/>
                                    <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile number" style="width:90%"/>
                                    <span class="required-field mobile_no">Please enter the correct mobile number, SMS will be sent for verification</span>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" name="mobile_number" value="<?php echo $check_validation; ?>" id="mobile_number" class="form-control" placeholder="Mobile number" style="width:90%"/>
<?php } ?>

                            <div class="form-group full-width">
                                <input type="email" name="company_email" id="email"  class="form-control" placeholder="Email"/>
                                <span class="required-field email">email is required!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Telephone number"/>
                            </div>

                            <div class="form-group full-width">

                                <input type="text" name="fax" id="fax" class="form-control" placeholder="Fax"/>
                            </div>

                            <div class="form-group full-width">

                                <select class="form-control" name="city_name" id="city_name">
                                    <option value="0">Select City</option>
                                    <?php foreach ($city as $cityname) { ?>
                                        <option value="<?php echo $cityname->city_id; ?>"><?php echo $cityname->city_name; ?></option>
<?php } ?>
                                </select>
                                <span class="required-field city_name">city is required!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <select class="form-control" name="category_id" id="category_id" onchange="getval(this);">
                                    <option value="0">Select Catagory</option>
                                    <?php foreach ($category as $cat) { ?>
                                        <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name; ?></option>
<?php } ?>
                                </select>
                                <span class="required-field category_id">category is required!!!</span>
                            </div> 

                            <div class="form-group full-width subcat-div">
                                <select class="form-control" name="sub_category_id" id="sub_category_name">
                                    <option>Select Sub Catagory</option>
                                </select>
                            </div> 

                            <div class="form-group full-width">

                                <input type="text" name="company_uri" id="company_uri" class="form-control" placeholder="Company website"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="facebook_uri" id="company_uri" class="form-control" placeholder="Facebook Link"/>
                            </div>
                            <div class="form-group full-width">

                                <input type="text" name="twitter_uri" id="company_uri" class="form-control" placeholder="Twitter Link"/>
                            </div>
                            <div class="form-group full-width pull-right">
                                <button type="button" class="btn1" style="padding-top: 6px !important; padding-bottom: 6px !important;">Next</button>
                                <br style="clear:both" />
                            </div>
                        </div>


                        <div class="step2">
                            <div class="form-group full-width">
                                <label class="label-1">Company Logo</label>
                                <input type="file" name="company_logo" id="company_logo" class="form-control" placeholder="" style="padding-bottom: 40px;" onchange="readURL(this);"/>
                                <br>
                                <div><img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src=""/></div>
                            </div>
                            <div class="form-group full-width pull-right">
                                <button type="button" class="btn2" >Next</button>
                                <br style="clear:both" />
                            </div>
                        </div>


                        <div class="step3">
                            <div class="form-group full-width">
                                <h3>Select Location:</h3>
                                <div class="googlemap">
                                    <div id="googleMapUp12" style="width:100%;height:280px;">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="latitude" id="company_uri" class="form-control rs_lat" value="" placeholder="Latitude"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="longitude" id="company_uri" class="form-control rs_long" value="" placeholder="Longitude"/>
                            </div>
                            <div class="form-group full-width pull-right">
                                <button type="submit" id="publish">Select Location And Finish</button>
                                <br style="clear:both" />
                            </div>
                        </div>                    
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(110)
                        .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    function initialize() {
        var myLatLng = {lat: 24.45781706215627, lng: 54.140625};

        var map = new google.maps.Map(document.getElementById('googleMapUp12'), {
            zoom: 4,
            center: myLatLng
        });
        google.maps.event.addListenerOnce(map, 'idle', function () {
            //alert('sumaya');
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
            $('.step3').hide();
            
        });


        google.maps.event.addListener(map, 'click', function (e) {
            $('.rs_lat').val(e.latLng.lat());
            $('.rs_long').val(e.latLng.lng());
            myLatLng = {lat: e.latLng.lat(), lng: e.latLng.lng()};
            marker.setPosition(myLatLng);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
    $(document).ready(function () {

        $('.step2').hide();
        $('.step3').show();
        $(".btn1").click(function (e) {

            var baseurl = "<?php echo base_url(); ?>";
            var company_name = $("#company_name").val();
            var company_description = $('textarea[name=company_description]').val();
            var company_address = $('textarea[name=company_address]').val();
            var email = $.trim($("input[name='company_email']").val());
            var mobile_no = $("#mobile_number").val(); 
            var mobile_no_with_country_code = '+971' + mobile_no; 
            var category_id = $('select[name=category_id]').val();
            var city_name = $('select[name=city_name]').val();
            if (company_name == '' || company_description == '' || company_address == '' || email == '' || mobile_no == '' || category_id == 0 || city_name == 0) {
                if (company_name == '') {
                    $('.company_name').css("color", "red");
                } else {
                    $('.company_name').css("color", "#bbb");
                }
                if (company_description == '') {
                    $('.company_description').css("color", "red");
                } else {
                    $('.company_description').css("color", "#bbb");
                }

                if (company_address == '') {
                    $('.company_address').css("color", "red");
                } else {
                    $('.company_address').css("color", "#bbb");
                }
                if (email == '') {
                    $('.email').css("color", "red");
                } else {
                    $('.email').css("color", "#bbb");
                }
                if (mobile_no == '') {
                    $('.mobile_no').css("color", "red");
                } else {
                    $('.mobile_no').css("color", "#bbb");
                }
                if (category_id == 0) {
                    $('.category_id').css("color", "red");
                } else {
                    $('.category_id').css("color", "#bbb");
                }
                if (city_name == 0) {
                    $('.city_name').css("color", "red");
                } else {
                    $('.city_name').css("color", "#bbb");
                }
            }
            else {

                $.ajax({
                    type: "post",
                    url: baseurl + 'check_mobilenumber_ajax',
                    data: {mobile_no: mobile_no_with_country_code},
                    success: function (result) { 
                        var obj = jQuery.parseJSON(result); 
                        if (obj.ok == 'ok') { 
                            
                            $('.step1').hide();
                            $('.step2').show();
                        } else { 
                            $('.mobile_no').html('');
                            $('.mobile_no').text('This Mobile number has been banned! Please Try with another number.').css('color', 'red');
                            $('.step1')[0].scrollIntoView(true);
                        }

                    },
                    error: function () {
                        alert('Error while request..');
                    }
                });

            }
        });


        $(".btn2").click(function (e) {
           
            $('.step1').hide();
            $('.step2').hide();
            $('.step3').show();

        });

        $('#category_id').on('change', function () {

            var baseurl = '<?php echo base_url(); ?>';
            var parent = $(this).val();
            
            $.ajax({
                url: baseurl + 'get_subcategory_ajax',
                type: 'POST',
                data: {parent: parent},
                dataType: "json",
                success: function (result) {
                    if (result.success == 1) {

                        $('.subcat-div').html('');
                        $('.subcat-div').append(result.box)
                    } else {
                        $('.subcat-div').html('');
                        $('.subcat-div').append(result.box)
                    }

                },
            });
        });
    });
</script>