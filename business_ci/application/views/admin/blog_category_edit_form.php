
<?php $this->load->view('includes/admin_header'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Member Page</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">

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
                <form action="<?php echo base_url(); ?>update_blog_category/<?php echo $result->category_id ?>" class="form-horizontal" method="post">
                    <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls title">
                            <input type="text" class="title" value="<?php if (isset($result->category_name) != '') echo set_value('category_name', $result->category_name); ?>" name="category_name">
                            <input class="form-control" type="hidden" value="<?php echo $result->category_id; ?>" >
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


