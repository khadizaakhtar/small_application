<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Site Settings</h4>
                <span class="tools">
                    <a class="icon-chevron-down" href="javascript:;"></a>
                    <a class="icon-remove" href="javascript:;"></a>
                </span>
            </div>
            <div class="message"></div>      
            <div class="widget-body form">
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
                if ($this->session->flashdata('error')) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Message!</b> 
                        <?php echo $this->session->flashdata('error'); ?>
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

                <form  method="post" action="<?php echo base_url(); ?>update_site_settings">
                    
                    <div class="control-group">
                        <label class="control-label">Site Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_name" value="<?php echo $settings['site_name']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Site Address</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_address" value="<?php echo $settings['site_address']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Site Telephone</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_telephone" value="<?php echo $settings['site_telephone']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Site Email</label>
                        <div class="controls title">
                            <input type="email" class="title" name="site_email" value="<?php echo $settings['site_email']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Website</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_website" value="<?php echo $settings['site_website']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Facebook</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_facebook" value="<?php echo $settings['site_facebook']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Twitter</label>
                        <div class="controls title">
                            <input type="text" class="title" name="site_twitter" value="<?php echo $settings['site_twitter']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Product Token</label>
                        <div class="controls title">
                            <input type="text" class="title" name="product_token" value="<?php echo $settings['product_token']; ?>" id="category_name">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Verification message</label>
                        <div class="controls title">
                            <textarea name="verification_message"><?php echo $settings['verification_message']; ?></textarea>
                        </div>
                        <span>please use {{code}} where you want to show verification code</span>
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


