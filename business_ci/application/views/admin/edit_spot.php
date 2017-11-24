<?php $this->load->view('includes/admin_header'); ?>
<div class="row-fluid">
    <div class="span6">
        <!-- BEGIN widget-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add spot</h4>
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
                
                <form  method="post" action="<?php echo base_url(); ?>update_spot/<?php echo $spot_info->spot_id; ?>" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label">Company Name<span class="error" style="color:red">*</span></label>
                        <div class="controls title">
                            <select name="company_id">
                                <option value="">----select---</option>
                                <?php
                                foreach ($all_company as $v_company) {
                                    ?>
                                    <option value="<?php echo $v_company->company_id; ?>"<?php if(isset($spot_info->company_id) && $spot_info->company_id==$v_company->company_id) {
                                 echo 'selected';}?>><?php echo $v_company->company_name; ?></option>
                                <?php } ?>
                            </select>

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
                                        <label class="control-label">Spot Description<span class="error" style="color:red">*</span></label>
                                        <div class="controls">
                                            <textarea class="span12 wysihtmleditor5" name="spot_description" rows="5"><?php echo $spot_info->spot_description; ?></textarea>
                                        </div>
                                    </div>

                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END EXTRAS widget-->
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Spot Image<span class="error" style="color:red">*</span></label>
                        <div class="controls description">
                            <input type="file"  name="image" onchange="readURL(this);" value="<?php if (isset($spot_info->image) != '') echo set_value('image', $spot_info->image); ?>">    
                            <br>
                            <div><img align="center" id="blah" alt="" style="height:100px; width:110px;"  name="image" class="msg-img" src=""/></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Month<span class="error" style="color:red">*</span></label>
                        <div class="controls title">
                            <select name="date">
                                <option value="">----select month---</option>
                                <?php                               
                             for ($m=1; $m<=12; $m++) {
                                 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));                                                          
                                    ?>
                                <option value="<?php echo $month;?>" <?php if(isset($spot_info->date) && $spot_info->date==$month) {
                                 echo 'selected';}?>><?php echo $month;?></option>
                                 <?php  }?>
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
<!-- END PAGE -->



