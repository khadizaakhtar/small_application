<div class="top_grid">              
    <?php
    //print_r($latest_one); die();
    foreach ($latest_one as $k_locompany) {
        ?>               
        <div class="col-md-4">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img" style="background-color:gray;"><a href="<?php echo base_url() . 'company_detail/' . $k_locompany->company_id; ?>"><img width="400px !important;" src="<?php echo base_url() . "uploads/" . $k_locompany->company_logo; ?>" class="img-responsive" alt=""/></a></div>
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
    <?php
    //print_r($latest_company); die();
    foreach ($latest_company as $k_company) {
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img">
                        <a href="<?php echo base_url() . 'company_detail/' . $k_company->company_id ?>"><img width="400px !important;" height="500px !important;" src="<?php echo base_url() . "uploads/" . $k_company->company_logo; ?>" class="img-responsive" alt=""/></a>
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
<div class="top_grid rs_top">
    <?php
    foreach ($latest_company_offset_four as $k_ofcompany) {
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img">
                        <a href="<?php echo base_url() . 'company_detail/' . $k_ofcompany->company_id ?>"><img width="400px !important;" height="500px !important;" src="<?php echo base_url() . "uploads/" . $k_ofcompany->company_logo; ?>" class="img-responsive" alt=""/></a>
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
    <?php
    foreach ($recent_blog_post as $k_blogpost) {
        ?>
        <div class="col-md-3">
            <div class="grid1">
                <div class="view view-first">
                    <div class="index_img"><img width="400px !important;" height="400px !important;" src="<?php echo base_url() . "blog_uploads/" . $k_blogpost->image; ?>" class="img-responsive" alt=""/></div>
                </div> 
                <div class="inner_wrap">
                    <h3><?php echo $k_blogpost->blog_title;?></h3>
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
                    <h3><?php echo $kr_blogpost->blog_title;?></h3>
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