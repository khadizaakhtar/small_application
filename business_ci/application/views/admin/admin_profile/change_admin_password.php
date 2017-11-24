<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Change Password</h4>
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

                <form  method="post" action="<?php echo base_url(); ?>update_admin_password">
                    <div class="control-group">
                        <label class="control-label">Current Password</label>
                        <div class="controls title">
                            <input type="password" class="title" name="old_pass" id="old_pass" placeholder="Current Password">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">New Password</label>
                        <div class="controls title">
                            <input type="password" class="title" name="new_pass" id="new_pass" placeholder="New Password">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Retype New Password</label>
                        <div class="controls title">
                            <input type="password" class="title" name="conf_new_pass" id="conf_new_pass" placeholder="Retype New Password">
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


