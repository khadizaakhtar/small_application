<div class="content_middle">
    <div class="container">
        <div class="col-sm-10">
            <div class="main-content">
                    <form  action="<?php echo base_url(); ?>update_settings/<?php echo $this->uri->segment(2);?>" method="post"  enctype="multipart/form-data" class="registration-form">
                    <div class="regform">
                        <?php
                    if (validation_errors() || $this->session->flashdata('failed')) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Error!</b> <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('failed'); ?>
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
                        <div class="col-md-4">
                            <h3 style="text-align:center; padding-top:50px;"></h3>
                            <div class="form-group full-width">
                                <label class="label-1"><h3>Profile Image</h3></label>
                                <input type="file" name="user_image" class="form-control" placeholder="" style="padding-bottom: 40px;" onchange="readURL(this);"/>
                                <br>
                                <div><img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src="<?php echo base_url('uploads/'.$user_info->user_image);?>"/></div>
                            </div>

                        </div>
                        <div class="col-md-8" style="border-left: 1px solid gainsboro;">
                            <h3 style="text-align:center; padding-top:50px;">Profile</h3>
                           <?php if($user_info->access_level == 0){?>
                            <div class="form-group full-width">
                                <input type="text" name="first_name" value= "<?php echo $user_info->first_name; ?>" id="tenantName" class="form-control" placeholder="First Name"/>
                            </div>	                   	                   
                            <div class="form-group full-width">
                                <input type="text" name="last_name" value="<?php echo $user_info->last_name; ?>" class="form-control" placeholder="Last Name"/>
                            </div>	
                           <?php }else{?>
                            <div class="form-group full-width">
                                <input type="text" name="business_name" value="<?php echo $user_info->business_name; ?>" class="form-control" placeholder="Last Name"/>
                            </div>
                           <?php }?>
                            <div class="form-group full-width">
                                <input type="email" name="user_mail" value="<?php echo $user_info->user_mail; ?>" class="form-control" placeholder="Email Address"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="user_name" value="<?php echo $user_info->user_name; ?>" class="form-control" placeholder="Username"/>
                            </div>
                            <h4 style="text-align:center; padding-top:50px;">Change Your Password</h4>
                            <div class="form-group full-width">
                                <input type="password" name="password" value="" class="form-control" placeholder="New Password"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="password" name="re_pass" value=""  class="form-control" placeholder="Confirm New Password"/>
                            </div>

                            <div class="form-group full-width">
                                <button class="reg-btn" type="submit" id="publish">Save Changes</button> 
                                <br style="clear:both" />
                            </div>                      
                        </div>
                        </div>
                    </form>
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





