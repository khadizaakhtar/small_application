<?php $this->load->view('includes/admin_header'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
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
                <table class="table table-striped table-bordered" id="example" aria-describedby="sample_1_info">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Type</th>
                           
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $v_result) {
                            //print_r($all_category);die();
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $v_result->user_id; ?></a></td>
                                <td><a href="#"><?php echo $v_result->user_name; ?></a></td>
                                <td><a href="#"><?php echo $v_result->user_mail; ?></a></td>
                                <td><a href="#"><?php if($v_result->access_level == 1){echo 'Admin';}
                                     if($v_result->access_level == 0){echo 'User';}
                                     if($v_result->access_level == 2){echo 'Service Provider';}
                                ?></a></td>
                                
                                <td> 
                                    <a title="edit user" href="<?php echo base_url(); ?>edit_user/<?php echo $v_result->user_id; ?>"><button class="btn btn-success"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this" href="<?php echo base_url(); ?>delete_user/<?php echo $v_result->user_id; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
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
    $(document).ready(function () {
        $('#example').DataTable({
            "pagingType": "full_numbers",
               "aaSorting": []
        });
    });
</script>
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


