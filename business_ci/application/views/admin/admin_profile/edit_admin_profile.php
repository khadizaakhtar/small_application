<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add City</h4>
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

                <form  method="post" action="<?php echo base_url(); ?>update_admin_detail/<?php echo $admin_detail->user_id; ?>">
                    <div class="control-group">
                        <label class="control-label">First Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="first_name" value="<?php echo $admin_detail->first_name; ?>" id="category_name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="last_name" value="<?php echo $admin_detail->last_name; ?>" id="category_name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">User Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="user_name" value="<?php echo $admin_detail->user_name; ?>" id="category_name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls title">
                            <input type="text" class="title" name="user_mail" value="<?php echo $admin_detail->user_mail; ?>" id="category_name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">User Type</label>
                        <div class="controls title">
                            <select name="user_type"  class="form-control">
                                <option value="1"<?php if ((isset($admin_detail->access_level) != '') && $admin_detail->access_level == 1) { ?> selected="selected" <?php } ?>>Admin</option>
                                <option value="0"<?php if ((isset($admin_detail->access_level) != '') && $admin_detail->access_level == 0) { ?> selected="selected" <?php } ?>>User</option>
                            </select>
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


