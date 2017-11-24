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
                            <th>Post Id</th>
                            <th>Blog </th>
                            <th>Blog title</th>
                            <th>Blog Description</th>
                            <th>Author Name</th>
                            <th>Category Name</th>
                            <th>Publication Status</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        foreach ($all_info as $v_info) {
                            //print_r($all_category);die();
                            ?>
                      
                            <tr>
                                <td><?php echo $v_info->post_id; ?></td>
                                <td><img width="70px;" height="70px;" src="<?php echo base_url().'blog_uploads/'.$v_info->image; ?>"></td>
                                <td><?php echo $v_info->blog_title; ?></td>
                                <td><?php echo $v_info->blog_description; ?></td>
                                <td><?php echo $v_info->first_name; ?></td>
                                <td><?php echo $v_info->category_name; ?></td>
                                <td><?php if( $v_info->status==1){ echo 'Published';} else{
                                     echo 'Unpublished';
                                     } ?>                            
                                </td>
                                <td>
                                     <?php 
                                    if($v_info->status==1){
                                    ?>
                                    <a href="<?php echo base_url();?>unpublished_post/<?php echo $v_info->post_id; ?>"><i class="icon-arrow-down"></i></a>
                                     <?php }
                                     else{
                                            ?>
                                    <a href="<?php echo base_url();?>published_post/<?php echo $v_info->post_id; ?>"><i class="icon-arrow-up"></i></a>
                                     <?php }?>
                                </td>
                               <td>  
                                    <a title="edit member" href="<?php echo base_url(); ?>/edit_blog_post/<?php echo $v_info->post_id; ?>"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this"  href="<?php echo base_url(); ?>delete_blog_post/<?php echo $v_info->post_id; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
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

                if (isConfirm) {
                    window.location.href = $href;
                } else {
                }
            });
        }

        return false;
    });
</script>
<?php $this->load->view('includes/admin_footer'); ?>


