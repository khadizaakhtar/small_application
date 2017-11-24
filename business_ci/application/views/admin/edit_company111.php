<?php $this->load->view('includes/admin_header'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Category Page</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
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
                <form  action="<?php echo base_url(); ?>update_company/<?php echo $result->company_id ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls title">
                            <input type="text" class="title" name="company_name" value= "<?php echo $result->company_name; ?>"id="category_name">
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Company Description</label>
                        <div class="controls title">
                            <textarea name="company_description" rows="4" cols="30"><?php echo $result->company_description; ?></textarea>
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls title">
                            <input type="text" name="country_code" value="<?php echo substr($result->mobile_number, 0, 4); ?>" style="width:36px;" class="form-control" placeholder="Mobile number" readonly/>
                            <input type="text" name="mobile_number" value="<?php echo substr($result->mobile_number, 4); ?>" style="width:153px;" id="mobile_number" class="form-control" placeholder="Mobile number"/>
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Category</label>
                        <div class="controls title">
                            <select class="form-control input-sm" name="category_id" id="category_id" onchange="getval(this);">
                                <option>Select Category</option>
                                <?php
                                if (isset($categories) && !empty($categories)) {
                                    foreach ($categories as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->category_id; ?>" <?php if ($result->category_id == $cat->category_id) { ?> selected="selected"<?php } ?>><?php echo $cat->category_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select> 	  
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Sub Category</label>
                        <div class="controls title subcat-div">
                            <?php $sub_categories = $this->option->FetchData('tbl_category', 'parent=' . $result->category_id); ?>
                            <select class="sel" name="sub_category_name" class="" id="category_name">
                                <option value="0">Select Sub Category</option>
                                <?php
                                if (isset($sub_categories) && !empty($sub_categories)) {
                                    foreach ($sub_categories as $sub_cat) {
                                        ?>
                                        <option value="<?php echo $sub_cat->category_id; ?>" <?php if ($result->sub_category_id == $sub_cat->category_id) { ?> selected="selected"<?php } ?>><?php echo $sub_cat->category_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                            <span class="required-field category_id" style="color:red"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">City</label>
                        <div class="controls title">
                            <select class="form-control input-sm" name="city_id">
                                <option>Select City</option>
                                <?php
                                if (isset($city) && !empty($city)) {
                                    foreach ($city as $c) {
                                        ?>
                                        <option value="<?php echo $c->city_id; ?>" <?php if ($result->city_id == $c->city_id) { ?> selected="selected"<?php } ?>><?php echo $c->city_name; ?></option>
                                        <?php
                                    }
                                }
                                ?>

                            </select> 	  
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls title">
                            <input type="text" class="" name="email" value="<?php echo $result->email; ?>" placeholder="">
                            <span class="error" style="color:red">*</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls title">
                            <input type="text" name="phone_number" value="<?php echo $result->phone_number; ?>" id="phone_number" class="form-control" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Fax</label>
                        <div class="controls title">
                            <input type="text" name="fax" value="<?php echo $result->fax; ?>" id="fax" class="form-control" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Company Website</label>
                        <div class="controls title">
                            <input type="text" name="company_uri" value="<?php echo $result->company_website; ?>" id="company_uri" class="form-control" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls title">
                            <input type="text" name="facebook_uri" value="<?php echo $result->facebook_link; ?>" id="company_uri" class="form-control" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls title">
                            <input type="text" name="twitter_uri" value="<?php echo $result->twitter_link; ?>" id="company_uri" class="form-control" placeholder=""/>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Company Logo</label>
                        <div class="controls title">
                            <input type="file" class="" name="company_logo" onchange="readURL(this);" value="<?php echo $result->company_logo; ?>" placeholder="">
                            <br>
                            <div>
                                <?php if ($result->company_logo != '') { ?>
                                    <img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src="<?php echo base_url('uploads/' . $result->company_logo); ?>"/>
                                <?php } else { ?>
                                    <img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src="<?php echo base_url('uploads/default/default.png'); ?>"/>
                                <?php } ?>   
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <h4>Select Location:</h4>
                        <div class="controls title">
                            <div class="googlemap">
                                <div id="googleMapUp" style="width:100%;height:280px;">

                                </div>
                            </div> 
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Latitude & Longitude</label>
                        <div class="controls title">
                            <input type="text" name="latitude" id="company_uri" class="form-control rs_lat" value="<?php echo $result->latitude; ?>" placeholder="Latitude"/>
                            <input type="text" name="longitude" id="company_uri" class="form-control rs_long" value="<?php echo $result->longitude; ?>" placeholder="Longitude"/>
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>

                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<?php $this->load->view('includes/admin_footer'); ?>
<!-- END PAGE -->

<script>
    function initialize() {
        var myLatLng = {lat: <?php echo $result->latitude; ?>, lng: <?php echo $result->longitude; ?>};

        var map = new google.maps.Map(document.getElementById('googleMapUp'), {
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



