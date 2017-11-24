<?php $this->load->view('includes/admin_header'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN BASIC PORTLET-->
        <div class="widget orange">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Advanced Table</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>

            <div class="widget-body">
                <table class="table table-striped table-bordered DataTable" id="myTable" aria-describedby="sample_1_info">
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Publication Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_category as $v_result) {
                            //print_r($all_category);die();
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $v_result->category_id; ?></a></td>
                                <td><a href="#"><?php echo $v_result->category_name; ?></a></td>
                                <td><?php if($v_result->publication_status==1){
                                        echo 'Published';
                                }else{ echo 'Unpublished';} ?>
                                </td>
                                <td>
                                     <?php 
                                    if($v_result->publication_status==1){
                                    ?>
                                    <a href="<?php echo base_url();?>unpublished_category/<?php echo $v_result->category_id; ?>"><i class="icon-arrow-down"></i></a>
                                     <?php }
                                     else{
                                            ?>
                                    <a href="<?php echo base_url();?>published_category/<?php echo $v_result->category_id; ?>"><i class="icon-arrow-up"></i></a>
                                     <?php }?>
                                </td>
                                <td>                                   
                                    <a title="edit member" href="<?php echo base_url(); ?>edit_blog_category/<?php echo $v_result->category_id; ?>"><button class="btn btn-success"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this" href="<?php echo base_url(); ?>delete_blog_category/<?php echo $v_result->category_id; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>           
</div>
<script>
    $('body').delegate('.delete', 'click', function () {

        var $thisLayoutBtn = jQuery(this);
        var $href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "This album will be deleted",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function (isConfirm) {
//				  if (isConfirm) {
//					   window.location.href = $href;
//                                          
//				  } else {
//					  
//				  }

                if (isConfirm) {

                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location.href = $href;
                } else {
                    // swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }

        return false;
    });
</script>
<?php $this->load->view('includes/admin_footer'); ?>



