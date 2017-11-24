<?php $settings = $this->admin_model->get_settings();?>
<div class="footer">
        <div class="container">
           
            <div class="footer_grids">
                <div class="footer-grid my-footer-grid">
                    <h4><a href="<?php echo base_url()?>service_agreement" style="color:white; text-align: none !important;">Service Agreement</a></h4>
                </div>
                <div class="footer-grid my-footer-grid">
                    <h4><a href="<?php echo base_url()?>contact_us" style="color:white; text-align: none !important;">Contact Us</a></h4>
                </div>
                <div class="footer-grid my-footer-grid-middle">
                    <h4>Company Logo</h4>
                </div>
                <div class="footer-grid my-last-footer-grid">
                    <a href="<?php echo base_url();?>about_us"><h4>About Us</h4></a>
                </div>
                <div class="footer-grid last_last_grid">
                    <h4>Follow Us</h4>
                </div>
                <div class="footer-grid last_grid">
                    <a href="<?php echo $settings['site_website'];?>"><img src="<?php echo base_url()?>images/globe.ico"></a>
                    <a href="<?php echo $settings['site_facebook'];?>"><img src="<?php echo base_url()?>images/favicon.ico"></a>
                    <a href="<?php echo $settings['site_twitter'];?>"><img src="<?php echo base_url()?>images/favicont.ico"></a>
                    <div class="copy wow fadeInRight" data-wow-delay="0.4s">
                        <p>&copy; Template by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</body>
</html>	

