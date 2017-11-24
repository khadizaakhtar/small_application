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
                            <th>Spot Id</th>
                            <th>Spot Image</th>
                            <th>Spot Description</th>
                            <th>Company Name</th>
                            <th>Month</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        foreach ($all_info as $v_info) {
                            ?>
                      
                            <tr>
                                <td><?php echo $v_info->spot_id; ?></td>
                                <td><img width="70px;" height="70px;" src="<?php echo base_url().'spot_image/'.$v_info->image; ?>"></td>
                                <td><?php echo $v_info->spot_description; ?></td>
                                <td><?php echo $v_info->company_id; ?></td>  
                                <td><?php echo $v_info->date; ?></td>
                               <td>  
                                    <a title="edit member" href="<?php echo base_url(); ?>/edit_spot/<?php echo $v_info->spot_id; ?>"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a>
                                    <a class="delete" title="delete this"  href="<?php echo base_url(); ?>delete_spot/<?php echo $v_info->spot_id; ?>"> <button class="btn btn-danger"><i class="icon-trash"></i></button></a>
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


