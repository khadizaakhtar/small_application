<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add Category</h4>
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
                if ($this->session->flashdata('success')) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Success!</b> 
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?> 

                <form  method="post" action="<?php echo base_url(); ?>save_category" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls title">
                            <input type="text" class="title" name="category_name" id="category_name">
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
                                        <option value="<?php echo $cat->category_id; ?>"><?php echo $cat->category_name; ?></option>
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


