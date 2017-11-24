<div class="content_middle">
    <div class="container">
        <div class="col-sm-9 col-sm-offset-1">
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
                <h3 style="text-align:center; padding-top:50px;"><div style="margin-left: 285px;" class="listing"><a href="<?php echo base_url();?>listbusiness">+Add A NEW LISTING</a></div></h3>
                  <?php
                    if(empty($company_info)){ ?>
                <div class="regform">                    
                    <ul style="list-style: none; display:inline-block;">
                        <li>
                            <span><img align="center" id="blah" alt="" style="height:250px; width:350px; padding:20px; border-radius:50px;"  name="image" class="msg-img" src="<?php echo base_url();?>images/default_avatar.jpg"/></span>                           
                        </li>
                    </ul> 
                    <ul style="list-style: none; display:inline-block;">
                        <li>
                            <span>You Have No Listing!</span>                            
                        </li>
                    </ul> 
                 </div>
                 <?php }else{               
                    ?>  
                
                <?php 
                foreach($company_info as $v_listing){
                $company_id=$v_listing->company_id;
                $review=$this->user_model->get_review_by_company_id($company_id);   
                $company_image = $this->user_model->get_company_main_image($company_id);            
                ?>
                <div class="regform"> 
                                
                    <ul style="list-style: none; display:inline-block;">
                        <li>
                            <span>
<?php if(!empty($company_image)){?>
<a href="<?php echo base_url();?>company_detail/<?php echo $v_listing->company_id?>"><img align="center" id="blah" alt="" style="height:250px; width:350px; padding:20px; border-radius:50px;"  name="image" class="msg-img" src="<?php echo base_url() . "multi_img/" . $company_image->images; ?>"/></a>
<?php }else{?>
<a href="<?php echo base_url();?>company_detail/<?php echo $v_listing->company_id?>"><img align="center" id="blah" alt="" style="height:250px; width:350px; padding:20px; border-radius:50px;"  name="image" class="msg-img" src="<?php echo base_url();?>images/default_avatar.jpg"/></a>
<?php }?>

</span>                           
                        </li>
                    </ul> 
                    <ul style="list-style: none; display:inline-block;">                                              
                         <li style="color:#0d4e8f; padding-top:40px;">
                             <span><a href="<?php echo base_url();?>company_detail/<?php echo $v_listing->company_id?>"><?php echo $v_listing->company_name;?></a></span>                        
                        </li>
                        <li>
                            <span><button class="lis-button" type="button" id="publish">REVIEWS <?php echo $review->total;?></button></span>                           
                        </li>
                        <li style="padding-top:10px;">
                            <span><a href="<?php echo base_url()?>edit_listing/<?php echo $v_listing->company_id;?>"><button class="lis-button2" type="button" id="publish">EDIT</button></a></span> 
                            <span><a href="<?php echo base_url()?>upload_multiple_image/<?php echo $v_listing->company_id;?>"><button class="lis-button2" type="button" id="publish">Upload Images</button></a></span> 
<span><a href="<?php echo base_url()?>view_multiple_image/<?php echo $v_listing->company_id;?>"><button class="lis-button2" type="button" id="publish">View Images</button></a></span> 
<span><a href="<?php echo base_url()?>delete_company_by_user/<?php echo $v_listing->company_id;?>"><button class="lis-button2" type="button" id="publish">Delete</button></a></span> 
                        </li>                        
                    </ul> 
                </div>                
                <?php } }?>
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





