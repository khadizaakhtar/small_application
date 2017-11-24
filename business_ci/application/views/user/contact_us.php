<div class="content_middle">
    <div class="container">
        <div class="col-sm-8">
            <div class="main-content">
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
                <div class="regform">
                    <h3 style="text-align:center; padding-top:50px;">Contact Us</h3><hr>
                    <div style="padding-left: 10px;padding-right: 10px;padding-bottom: 20px;text-align: justify;">
                        
                        <form  action="<?php echo base_url(); ?>contact_with_authority" method="post" class="registration-form">
                           <div class="form-group">
                                 <input style="" type="text" name="subject" value="" class="form-control" placeholder="Subject"/>
                            </div>
                            <div class="form-group">
                                <input style="width:180px;float:left;margin-right: 5px;" type="text" name="name" value="" id="tenantName" class="form-control" placeholder="Name"/>
                                <input style="width:180px;float:left;margin-right: 5px;" type="text" name="email" value="" class="form-control" placeholder="Email"/>
                                <input style="width:180px;" type="text" name="phone" value="" class="form-control" placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                 <textarea  style="width: 550px;height: 200px;" name="message"  class="form-control" placeholder="Type your message here..."></textarea>
                            </div>
                            <div class="form-group full-width">
                                <button class="reg-btn" type="submit" id="publish">Send</button> 
                                <br style="clear:both" />
                            </div>
                      </form>
                    </div>      
                </div>    
            </div>  
        </div>
        <div class="col-sm-4">
            <div class="regform">
                <div style="padding:10px;">
                <p><span style="margin-right: 5px;"><img src="<?php echo base_url()?>images/contact.ico"></span>Contact Us</p><hr>
                <p style="color:gray;font-size: 14px;"><span style="margin-right: 5px;"><img src="<?php echo base_url()?>images/home.ico"></span><?php echo $settings['site_name']?></p>
                <p style="color:gray;font-size: 14px;"><span style="margin-right: 5px;"><img src="<?php echo base_url()?>images/location.ico"></span><?php echo $settings['site_address']?></p>
                <p style="color:gray;font-size: 14px;"><span style="margin-right: 5px;"><img src="<?php echo base_url()?>images/mobile.ico"></span> Tel : <?php echo $settings['site_telephone']?></p>
                <p style="color:gray;font-size: 14px;"><span style="margin-right: 5px;"><img src="<?php echo base_url()?>images/email.ico"></span>Mail : <?php echo $settings['site_email']?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('.business').css('display', 'none');
        $('.member_name').css('display', 'block');
        $(".member").show();

        $("input[name='access_level']").click(function () {
            var usertype = $(this).val(); //alert(usertype);
            if (usertype == 0) {
                $('.business').css('display', 'none');
                $('.member_name').css('display', 'block');
                $(".member").show();
            } else {
                $('.member_name').css('display', 'none');
                $('.business').css('display', 'block');
                $(".member").show();
            }
        });
    });

</script>    





