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
                    <h3 style="text-align:center; padding-top:50px;">Verify Your Company</h3>
                    <form action="<?php echo base_url(); ?>update_verfication/<?php echo $this->uri->segment(2)?>" method="post" class="registration-form" enctype="multipart/form-data" style="padding-left:80px; padding-bottom:50px;">
                        <div class="step1">
                            <div class="form-group full-width">
                                <input type="text" name="code" id="company_name" class="form-control" placeholder="Type 6 digits number"/>
                            </div>
                            <div class="form-group full-width resnedmsg">
                                <p style="color:green;font-size: 14px;">A new message has been sent to your number</p>
                            </div>
                            <?php $count = $this->option->get_by_id('company_info','company_id',$this->uri->segment(2));?>
                            <?php if($count->count_resend_code != 2){?>
                            <span class="resend_span"><a class="resend_code">resend code</a></span>
                            <?php }?>
                            <div class="form-group full-width pull-right">
                                <button type="submit" id="publish">Activate</button>
                                <br style="clear:both" />
                            </div>
                        </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {    
        $('.resnedmsg').hide();
        $('.resend_code').click(function () {
             $('.resnedmsg').hide();
            var company_id = '<?php echo $this->uri->segment(2);?>'; //alert(company_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>"+"resend_verification_code/"+company_id,
                dataType: 'json',
                data: company_id,
                success: function (res) { //alert(res.count);
                   if(res.success == 1){
                       $('.resnedmsg').show();
                   }else{
                       $('.resend_span').hide();
                   }
                   if(res.count == 2){
                      $('.resend_span').hide();
                   }
                }
            });

        });
        });    

    </script>
