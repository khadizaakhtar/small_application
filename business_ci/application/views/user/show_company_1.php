<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 lis1" style="background-color:white;">
                        <div class="results-header">
                            <div class="results-count pull-left">
                                <?php echo$total_rows;?> Total Listings
                            </div>
                            <ul class="results-sort cat-check pull-right">
                                <li>
                                   <input type="radio" value="Alphabetically" name="filterrific[sorted_by]" id="Alphabetically">
                                    <label for="Alphabetically" id="Alphabetically"> <a href="<?php echo base_url();?>show_company/<?php echo $this->uri->segment(2)?>/alfabetically">Alphabetically</a></label>
                                </li>
                                <li>
                                    <input type="radio" value="Recent First" name="filterrific[sorted_by]" id="Recent First">
                                    <label for="Recent First" id="RecentFirst"><a href="<?php echo base_url();?>show_company/<?php echo $this->uri->segment(2)?>/recentfirst">Recent First</a></label>
                                </li>
                                <li>                           
                                    <input type="radio" value="Highest Rated" name="filterrific[sorted_by]" id="Highest Rated">
                                    <label for="Highest Rated" id="HighestRated"><a href="<?php echo base_url();?>show_company/<?php echo $this->uri->segment(2)?>/highestrate">Highest Rated</a></label>
                                </li>
                            </ul>
                        </div>	
                    </div>
                </div>
                
              <div class="recent_first">  
                 <?php 
                    foreach($all_company as $vk_company){
                        $company_id=$vk_company->company_id;
                        $review=$this->user_model->get_review_by_company_id($company_id);
                        $rating=$this->user_model->count_avg_ratings($company_id);
                        $rat=round($rating->rating,2);
                    ?>
                <div class="row rs_content">                  
                    <div class="col-md-12" style="background-color:white;">
                        <div class="entertain_box1 wow fadeInRight" data-wow-delay="0.4s">
                            <div class="col-md-3 grid_box rs_content">
                                <a href="#"> <img width="400px;" src="<?php echo base_url() . "uploads/" . $vk_company->company_logo; ?>" class="img-responsive" alt=""><span class="zoom-icon"></span> </a>
                                <div class="grid_box2">
                                    <h4><a href="#">Photos</a></h4>
                                    <p><?php echo $rat;?> Ratings</p>
                                </div>
                            </div> 
                            <div class="col-md-9 rs_content2">
                                <h3 class="rs-hed2"><?php echo $vk_company->company_name;?></h3>
                                <h4 class="rs-hed3"><img src="<?php echo base_url();?>/images/location.ico"><?php echo $vk_company->company_address;?></h4>
                                <p><?php echo $vk_company->company_description;?>
                                </p>                              
                                <p class="actions">
                                    <span><i class="fa fa-comments"></i> <?php echo $review->total;?> Reviews </span>
                                    <span class="share right"> <span>Share</span> 
                                        <?php 
                                        if($vk_company->twitter_link!=''){
                                        ?>
                                        <a href="<?php echo $vk_company->twitter_link;?>" class="tw" target="_blank"> <img width="20px;" height="20px;" src="<?php echo base_url();?>/images/favicont.ico"></a> 
                                      <?php }?>
                                        
                                        <?php 
                                        if($vk_company->facebook_link!=''){
                                        ?>
                                        <a href="<?php echo $vk_company->facebook_link;?>" target="_blank" class="fb"><img width="20px;" height="20px;" src="<?php echo base_url();?>/images/favicon.ico"></a>
                                        <?php }?>
                                    </span>
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>	
                    </div>                   
                </div>
                 <?php } ?>
                </div>
                
                 <div class="col-md-6">
                    <ul class="pagination pagination-sm" style="float:right; margin: 10px 0 !important;">
                        <?php echo $pagination; ?>
                    </ul>
                </div>
            </div> 

            <div class="col-md-3 border-left">
                <div class="listing_xs">
                    <h4 class="section_title title_sm">Spot of the Month</h4>
                    <?php 
                    foreach($spot_info as $v_spot){
                    ?>
                    <div class="img-wrap">
                       
                        <img src="<?php echo base_url() . "spot_image/" . $v_spot->image; ?>" alt="Ww8ep2f7qwbywiztv0wx">
                    </div>
                    <div class="description">
                        <h5 class="title">Spot of the Month Casper and Gambini's</h5>
                        <p class="subtitle">
                            <?php echo $v_spot->spot_description;?>
                        </p>
                    </div>
                    <?php }?>
                    
                    <?php
                    if(empty($spot_info)){ ?>                   
                    <div class="img-wrap">
                       
                        <img src="<?php echo base_url();?>images/default_avatar.jpg" alt="Ww8ep2f7qwbywiztv0wx">
                    </div>
                    <div class="description">
                        <h5 class="title">Spot of the Month Casper and Gambini's</h5>
                        <p class="subtitle">
                        </p>
                    </div>                   
                     <?php }  ?> 
                    
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>       
    </div>
</div> 


