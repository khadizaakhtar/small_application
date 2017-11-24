<style>
.btnactionright {
    position: absolute;
    top: -3px;
    right: 40px;
    font-size: 16px;
    font-weight: bold;
}

.btnaction {
    position: absolute;
    top: 1px;
    left: 37px;
    font-size: 16px;
    font-weight: bold;
}
</style>

<div class="content_middle">
    <div class="container">
      <div class="row">
       
        <div class="col-sm-12">
            <div class="main-content">
                <!--                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-ban"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b></b>
                                </div>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b></b> 
                
                                </div>-->
                
                  <h3 style="text-align:center; padding-top:50px;"><div style="margin-left: 285px;" class="listing"><a href="<?php echo base_url();?>business_listing/<?php echo $this->session->userdata('userid');?>">Back</a></div></h3> 
 
               
<div class = "row">
<?php if(!empty($company_images)){
                foreach($company_images as $v_listing){
                $company_id=$v_listing->company_id;
                            
                ?>   
   
   <div class = "col-md-4">
      <a href = "#" class = "thumbnail">
         <img src = "<?php echo base_url();?>multi_img/<?php echo $v_listing->images;?>" style="height:200px; width:300px; padding-top:20px; padding-bottom:20px; border-radius:20px;"   alt = "Generic placeholder thumbnail">
      </a>
<div class="btnactionright">
                                <a class="button" href="<?php echo base_url();?>update_company_main_image/<?php echo $v_listing->company_id;?>/<?php echo $v_listing->id;?>" data-toggle="tooltip" title="Add content">
   <?php if($v_listing->main == 0){?>    
    select as main image <?php }else{?>selected <?php }?></a>
                                </div>
<div class="btnaction">   
                                <a class="button delete" href="<?php echo base_url();?>delete_company_image/<?php echo $v_listing->company_id;?>/<?php echo $v_listing->id;?>" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </div>
   </div>
<?php }}?>           
</div>


    
             </div>   
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.business').css('display', 'none');
        $('.member_name').css('display', 'block');
        $(".member").show();

        $("input[name='access_level']").click(function () {
            var usertype = $(this).val(); //alert(usertype);
            if (usertype == 0) {
                $('.business').css('display', 'none');
                $('.member_name').css('display', 'block');
                $(".member").show();
            } else {
                $('.member_name').css('display', 'none');
                $('.business').css('display', 'block');
                $(".member").show();
            }
        });
    });

</script>    




