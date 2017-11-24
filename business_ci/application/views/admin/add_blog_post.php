<?php $this->load->view('includes/admin_header'); ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add Post</h4>
                <span class="tools">
                    <a class="icon-chevron-down" href="javascript:;"></a>
                    <a class="icon-remove" href="javascript:;"></a>
                </span>
            </div>
            <div class="message"></div>      
            <div class="widget-body form">
                <!-------------------------------------------------------------------------------->
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
                <!-------------------------------------------------------------------------------->
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
                <!-- BEGIN FORM-->
                
                <form  method="post" action="<?php echo base_url(); ?>save_blog_post" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Blog title<span class="error" style="color:red">*</span></label>
                        <div class="controls title">
                            <input type="text" class="blog_title" name="blog_title">
                        </div>
                    </div>
                    
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN  widget-->
                            <div class="widget red">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> WYSIWYG Editor</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <!-- BEGIN FORM-->

                                    <div class="control-group">
                                        <label class="control-label">Blog Description<span class="error" style="color:red">*</span></label>
                                        <div class="controls">
                                            <textarea class="span12 wysihtmleditor5" name="blog_description" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END EXTRAS widget-->
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Blog Category<span class="error" style="color:red">*</span></label>
                        <div class="controls title">
                            <select name="category_id">
                                <option value="">----select---</option>
                                <?php
                                foreach ($all_category as $v_cat) {
                                    ?>
                                    <option value="<?php echo $v_cat->category_id; ?>"><?php echo $v_cat->category_name; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Author Name<span class="error" style="color:red">*</span></label>
                        <div class="controls title">
                             <select name="user_id">
                                <option value="">----select---</option>
                                <?php
                                foreach ($all_user as $v_info) {
                                    ?>
                                    <option value="<?php echo $v_info->user_id; ?>"><?php echo $v_info->first_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Image</label>
                        <div class="controls description">
                            <input type="file"  name="image" onchange="readURL(this);">    
                            <br>
                            <div><img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src=""/></div>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls title">
                            <select name="status">
                                <option value="">----select---</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>        
                    <button  style="text-align: center;margin-left: 60px" class="btn  btn-primary" >Published</button>
                </form>
                <br>
                <br>
                <!-- END FORM-->
            </div>
        </div>
    </div>

    <!-- END widget-->
</div>
<script>
    $(document).ready(function () {

        $('.type').hide();
        $("input[class='offered_received']").click(function () {
            $(this).attr('checked');
            if ($(this).is(':checked')) {
                $('.type').show();
               //  alert('show');
            }
            else {
              $('.type').hide();
              //alert('hide');
            }
        });


        $("input[class='offered']").click(function () {
            $(this).attr('checked');
            if ($(this).is(':checked')) {
                $('.type').hide();
                //      alert('show');
            }
            else {
                $('.type').hide();
                //alert('hide');

            }
        });
    });
</script>
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
<?php $this->load->view('includes/admin_footer'); ?>





