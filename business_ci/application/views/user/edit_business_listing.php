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
                <div class="regform"> 
                    <h3 style="text-align:center; padding-top:50px;">Edit Listing</h3>
                    <form action="<?php echo base_url(); ?>update_listing/<?php echo $result->company_id ?>" method="post" class="registration-form" enctype="multipart/form-data" style="padding-left:80px; padding-bottom:50px;">
                        <div class="step1">
                            <div class="form-group full-width">
                                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $result->company_name; ?>" placeholder="Company Name"/>
                                <span class="required-field company_name">company name must require!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <textarea  name="company_description"  class="form-control" placeholder="Company description"><?php echo $result->company_description; ?></textarea>
                                <span class="required-field company_description">company description must require!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <textarea  name="company_address"  class="form-control" placeholder="Company address"><?php echo $result->company_address; ?></textarea>
                                <span class="required-field company_address">company address must require!!!</span>
                            </div>

                            <div class="form-group">
                                <input type="text" name="country_code" value="<?php echo substr($result->mobile_number, 0, 4); ?>" id="country_code" class="form-control" style="width:8%;float:left;margin-right: 2px;" readonly/>
                                <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile number" value="<?php echo substr($result->mobile_number, 4); ?>" style="width:90%"/>
                                <span class="required-field mobile_no">mobile number must require!!!</span>
                            </div>	

                            <div class="form-group full-width">
                                <input type="email" name="email" id="email"  class="form-control" value="<?php echo $result->email; ?>" placeholder="Email"/>
                                <span class="required-field email">email must require!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <input type="text" name="phone_number" value="<?php echo $result->phone_number; ?>" id="phone_number" class="form-control" placeholder="Telephone number"/>
                            </div>

                            <div class="form-group full-width">
                                <input type="text" name="fax" id="fax" class="form-control" value="<?php echo $result->fax; ?>" placeholder="Fax"/>
                            </div>

                            <div class="form-group full-width">
                                <select class="form-control" name="city_id" id="city_name">
                                    <option value="0">Select City</option>
                                    <?php foreach ($city as $cityname) { ?>
                                        <option value="<?php echo $cityname->city_id; ?>" <?php if (isset($result->city_id) && $result->city_id == $cityname->city_id) {
                                        echo 'selected';
                                    }
                                        ?>><?php echo $cityname->city_name; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="required-field city_name">city must require!!!</span>
                            </div>

                            <div class="form-group full-width">
                                <select class="form-control" name="category_id" id="category_id" onchange="getval(this);">
                                    <option value="0">Select Catagory</option>
                                            <?php foreach ($categories as $cat) { ?>
                                        <option value="<?php echo $cat->category_id; ?>" <?php if (isset($result->category_id) && $result->category_id == $cat->category_id) {
                                                echo 'selected';
                                            }
                                            ?>><?php echo $cat->category_name; ?></option>
                                            <?php } ?>
                                </select>
                                <span class="required-field category_id">category must require!!!</span>
                            </div> 

                            <div class="form-group full-width subcat-div">
                                    <?php $sub_categories = $this->option->FetchData('tbl_category', 'parent=' . $result->category_id); ?>
                                <select class="form-control" name="sub_category_id" id="sub_category_name">
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
                            </div> 

                            <div class="form-group full-width">
                                <input type="text" name="company_uri" id="company_uri" class="form-control" value="<?php echo $result->company_website; ?>" placeholder="Company website"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="facebook_uri" id="company_uri" class="form-control" value="<?php echo $result->facebook_link; ?>" placeholder="Facebook Link"/>
                            </div>
                            <div class="form-group full-width">

                                <input type="text" name="twitter_uri" id="company_uri" class="form-control" value="<?php echo $result->twitter_link; ?>" placeholder="Twitter Link"/>
                            </div>
                            <div class="form-group full-width pull-right">
                                <button type="submit" class="btn1" style="padding-top: 6px !important; padding-bottom: 6px !important;">Save</button>
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

