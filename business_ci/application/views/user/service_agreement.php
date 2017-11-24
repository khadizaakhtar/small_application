<div class="content_middle">
    <div class="container">
        <div class="col-sm-10">
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
                    <h3 style="text-align:center; padding-top:50px;">Company Name Service Agreement</h3><hr>
                    <div style="padding-left: 20px;padding-right: 20px;padding-bottom: 20px;text-align: justify;color:#666;font-size: 13px;">
                        <p>By providing your business, product or service information, you have agreed to allow "Company Name" publish your business on our website and become part of its listing directory </p>
                        <p style="padding-top: 10px;"><b>Terms and conditions</b></p>
                        <p>Businesses are responsible for keeping their listing (includes change in address, change in description or contact details etc.) and pictures up to date in order for "Company Name" to maintain the integrity of its business listings. Pictures provided by businesses become property of "Company Name" and we can use the pictures for the purposes of the website. Each business is responsible for checking these terms from time to time for any possible changes that may be made. If you feel that any content posted by another business is in breach of these terms or infringes on your rights, it is your responsibility to inform "Company Name". "Company Name" may at anytime terminate the listing of a business or take down any advertising content displayed. Said business will be notified by email of such termination or removal of content, which will be effective immediately. </p>
                        <p style="padding-top: 10px;"><b>Disclaimer</b></p>
                        <p>"Company Name" will have no liability for the *comments/reviews that are posted on the website by its users. "Company Name" is not responsible for marketing each business listed on the website, unless indicated by the business. "Company Name" is a city guide/community business listing platform. </p>
                        <p style="padding-top: 10px;"><b>Privacy policy</b></p>
                        <p>Being listed on the website gives "Company Name" the right to share each business ‘s contact information with the general public. (Phone number, address, link to website etc.) </p>
                        <p style="padding-top: 10px;"><b>Local Laws and Regulation</b></p>
                        <p>"Company Name" is subject to all local Laws and regulations. </p>
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





