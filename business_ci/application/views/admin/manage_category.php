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
                <table class="table table-striped table-bordered DataTable" id="example" aria-describedby="sample_1_info">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Parent</th>
                            <th>Icon</th>
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
                                <td><?php 
                                $this->load->model('admin_model');
                                $cat_name = $this->admin_model->get_parent_name_by_id($v_result->parent);
                                if(isset($cat_name->category_name) && !empty($cat_name->category_name)){ 
                                echo $cat_name->category_name;
                                }else{
                                    echo 'No Parent';
                                }
                                ?></td>
                                <td><img src="<?php echo base_url('uploads/'.$v_result->category_icon);?>" style="width:40px;margin:5px;" class="loading pull-right">
                                </td>
                                <td> 
                                    <a title="edit member" href="<?php echo base_url(); ?>edit_category/<?php echo $v_result->category_id; ?>"><button class="btn btn-success"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this" href="<?php echo base_url(); ?>admin/delete_category/<?php echo $v_result->category_id; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
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


