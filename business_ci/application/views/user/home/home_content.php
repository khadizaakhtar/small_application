<div class="top_grid">              
    <?php
    //print_r($latest_one); die();
    foreach ($latest_one as $k_locompany) {
       $company_image = $this->user_model->get_company_main_image($k_locompany->company_id); 
        ?>               
        <div class="col-md-4">
            
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img" style="background-color:gray;"><a href="<?php echo base_url() . 'company_detail/' . $k_locompany->company_id; ?>">
<?php if(!empty($company_image)){?>
<img width="400px !important;" src="<?php echo base_url() . "multi_img/" . $company_image->images; ?>" class="img-responsive" alt=""/>
<?php } else{?>
    <img width="400px !important;" src="<?php echo base_url() . "images/default_avatar.jpg"?>" class="img-responsive" alt=""/>
<?php }?>
</a></div>
                </div>                
                <div class="inner_wrap">
                    <h3><a href="<?php echo base_url();?>company_detail/<?php echo $k_locompany->company_id; ?>"><?php echo $k_locompany->company_name;?></a></h3>
                    <ul class="star1">
                        <h4 class="green"></h4>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="grid1">
                <div class="rs_padd">
                    <h4 class="rs_h">Company Description</h4>
                    <p class="rs_p"><?php echo $k_locompany->company_description; ?></p>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
<?php } ?>
</div>

<div class="top_grid rs_top2">
   <h4 class="rs_h" style="padding-left: 14px; padding-bottom: 10px;border-bottom: 1px solid #DCDCDC;">Recent Company</h4>
    <?php
    //print_r($latest_company); die();
    foreach ($latest_company as $k_company) {
         $company_image = $this->user_model->get_company_main_image($k_company->company_id); 
        ?>
        <div class="col-md-3">
            
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img">
                        <a href="<?php echo base_url() . 'company_detail/' . $k_company->company_id ?>">
<?php if(!empty($company_image)){?>
<img width="400px !important;" src="<?php echo base_url() . "multi_img/" . $company_image->images; ?>" class="img-responsive" alt=""/>
<?php } else{?>
    <img width="400px !important;" src="<?php echo base_url() . "images/default_avatar.jpg"?>" class="img-responsive" alt=""/>
<?php }?>

</a>
                    </div>
                </div> 
                <div class="inner_wrap">
                    <h3><a href="<?php echo base_url();?>company_detail/<?php echo $k_company->company_id; ?>"><?php echo $k_company->company_name;?></a></h3>
                    <ul class="star1">
                        <h4 class="green"></h4>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>

    <div class="clearfix"> </div>
</div>
<div class="top_grid rs_top" style="">
    <?php
    foreach ($latest_company_offset_four as $k_ofcompany) {
         $company_image = $this->user_model->get_company_main_image($k_company->company_id); 
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img">
                        <a href="<?php echo base_url() . 'company_detail/' . $k_ofcompany->company_id ?>">

<?php if(!empty($company_image)){?>
<img width="400px !important;" src="<?php echo base_url() . "multi_img/" . $company_image->images; ?>" class="img-responsive" alt=""/>
<?php } else{?>
    <img width="400px !important;" src="<?php echo base_url() . "images/default_avatar.jpg"?>" class="img-responsive" alt=""/>
<?php }?>


</a>
                    </div>
                </div> 
                <div class="inner_wrap">
                    <h3><a href="<?php echo base_url();?>company_detail/<?php echo $k_ofcompany->company_id; ?>"><?php echo $k_ofcompany->company_name;?></a></h3>
                    <ul class="star1">
                        <h4 class="green"></h4>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>                
    <div class="clearfix"> </div>
</div>


<div class="top_grid rs_top">
     <h4 class="rs_h" style="padding-left: 14px; padding-bottom: 10px;padding-top: 25px;border-bottom: 1px solid #DCDCDC;">Recent Blog</h4>
    <?php
    foreach ($recent_blog_post as $k_blogpost) {
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img"><img width="400px !important;" height="400px !important;" src="<?php echo base_url() . "blog_uploads/" . $k_blogpost->image; ?>" class="img-responsive" alt=""/></div>
                </div> 
                <div class="inner_wrap">
                    <h3><a href="<?php echo base_url();?>blog_detail/<?php echo $k_blogpost->post_id; ?>"><?php echo $k_blogpost->blog_title;?></a></h3>
                    <ul class="star1">
                        <h4 class="green"></h4>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>                
    <div class="clearfix"> </div>
</div>


<div class="top_grid rs_top">
    <?php
    foreach ($last_four_blog_post as $kr_blogpost) {
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img"><img width="400px !important;" height="400px !important;" src="<?php echo base_url() . "blog_uploads/" . $kr_blogpost->image; ?>" class="img-responsive" alt=""/></div>
                </div> 
                <div class="inner_wrap">
                    <h3><a href="<?php echo base_url();?>blog_detail/<?php echo $kr_blogpost->post_id; ?>"><?php echo $kr_blogpost->blog_title;?></a></h3>
                    <ul class="star1">
                        <h4 class="green"></h4>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>                
    <div class="clearfix"> </div>
</div>