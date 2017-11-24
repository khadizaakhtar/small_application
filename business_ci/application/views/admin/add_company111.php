<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add Company</h4>
                <span class="tools">
                    <a class="icon-chevron-down" href="javascript:;"></a>
                    <a class="icon-remove" href="javascript:;"></a>
                </span>
            </div>
            <div class="message"></div>      
            <div class="widget-body">
                <?php
                if (validation_errors() || $this->session->flashdata('err')) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Error!</b> <?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('err'); ?>

                    </div>
                <?php } ?>


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

                <form  method="post" action="<?php echo base_url(); ?>save_company" enctype="multipart/form-data">
                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="company_name" value="<?php echo set_value('company_name');?>" id="company_name" class="form-control" placeholder="Company Name"/>
                            <span class="required-field company_name" style="color:red">*</span>
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls title">
                            <textarea name="company_description" rows="4" cols="30" placeholder="Company description"><?php echo set_value('company_description');?></textarea>
                            <span class="required-field company_description" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="country_code" value="+971" style="width:36px;" class="form-control" placeholder="Mobile number" readonly/>
                            <input type="text" name="mobile_number" value="<?php echo set_value('mobile_number');?>" style="width:153px;" id="mobile_number" class="form-control" placeholder="Mobile number"/>
                            <span class="required-field mobile_no" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="email" name="company_email" value="<?php echo set_value('company_email');?>" id="email"  class="form-control" placeholder="Email"/>
                            <span class="required-field email" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="phone_number" value="<?php echo set_value('phone_number');?>" id="phone_number" class="form-control" placeholder="Telephone number"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="fax" value="<?php echo set_value('fax');?>" id="fax" class="form-control" placeholder="Fax"/>
                        </div>
                    </div>


                    <div class="control-group">
                        <div class="controls title">
                            <select class="sel" name="city_name" id="city_name">
                                <option value="0">Select City</option>
                                <?php foreach ($city as $cityname) { ?>
                                    <option value="<?php echo $cityname->city_id; ?>"<?php echo set_select('city_name',$cityname->city_id); ?>><?php echo $cityname->city_name; ?></option>
                                <?php } ?>
                            </select>
                            <span class="required-field city_name" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <select class="sel" name="category_name" id="category_id" onchange="getval(this);">
                                <option>Select Catagory</option>
                                <?php
                                foreach ($categories as $cat) {
                                    ?>
                                    <option value="<?php echo $cat->category_id; ?>"<?php echo set_select('category_name',$cat->category_id); ?>><?php echo $cat->category_name; ?></option>
                                 <?php } ?>

                            </select>
                            <span class="required-field category_id" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title subcat-div">
                            <select class="sel" name="sub_category_id" class="" id="category_name">
                                <option>Select Sub Category</option>

                            </select>
                            <span class="required-field category_id" style="color:red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="company_uri" value="<?php echo set_value('company_uri');?>" id="company_uri" class="form-control" placeholder="Company website"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="facebook_uri" value="<?php echo set_value('facebook_uri');?>" id="company_uri" class="form-control" placeholder="Facebook Link"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="text" name="twitter_uri" value="<?php echo set_value('twitter_uri');?>" id="company_uri" class="form-control" placeholder="Twitter Link"/>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls title">
                            <input type="file"  name="company_logo" onchange="readURL(this);">   
                            <br>
                            <div><img align="center" id="blah" alt="Put Your Company Logo" style="height:100px; width:110px;"  name="image" class="msg-img" src=""/></div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls title">
                           <h4>Select Location:</h4>
                                <div class="googlemap">
                                    <div id="googleMapUp12" style="width:100%;height:280px;">

                                    </div>
                                </div> 
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls title">
                           <input type="text" name="latitude" id="company_uri" class="form-control rs_lat" value="" placeholder="Latitude"/>
                           <input type="text" name="longitude" id="company_uri" class="form-control rs_long" value="" placeholder="Longitude"/>
                        </div>
                    </div>
                  
                    <button type="submit" style="text-align: center;margin-left: 400px" class="btn  btn-primary" >save</button>
                </form>

                <br>
                <br>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/admin_footer'); ?>
<!-- END PAGE -->
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

    $('#category_id').on('change', function () {

        var baseurl = '<?php echo base_url(); ?>';
        var parent = $(this).val();
        alert(parent);
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
</script>

<script>
    function initialize() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('googleMapUp12'), {
            zoom: 4,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
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
