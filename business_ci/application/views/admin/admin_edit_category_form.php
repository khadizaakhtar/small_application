<?php $this->load->view('includes/admin_header'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Category Page</h4>
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
                <form  action="<?php echo base_url(); ?>update_category/<?php echo $result->category_id ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                     <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="category_name" value= "<?php echo $result->category_name;?>"id="category_name">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Parent</label>
                        <div class="controls title">
                            <select class="form-control input-sm" name="parent" id="parent">
                                <option value="0">No Parent</option>
                                <?php
                                if (isset($categories) && !empty($categories)) {
                                    foreach ($categories as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->category_id; ?>" <?php if($result->parent == $cat->category_id) { ?> selected="selected"<?php } ?>><?php echo $cat->category_name; ?></option>
                                    <?php
                                    }
                                }
                                ?>

                            </select> 	  
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Category Icon</label>
                        <div class="controls title">
                            <input type="file" class="fa_icon" name="category_icon"  onchange="readURL(this);">
			<div><img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src=""/></div>
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


