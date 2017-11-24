<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 lis1" style="background-color:white;">
                        <div class="results-header">
                            <div class="results-count pull-left">
                                <?php echo $total_rows;?> Total Listings
                            </div>

                        </div>	
                    </div>
                </div>
                
              <div class="recent_first">  
                 <?php 
                    foreach($all_blog as $v_blog){
                    ?>
                <div class="row rs_content">                  
                    <div class="col-md-12" style="background-color:white;">
                        <div class="entertain_box1 wow fadeInRight" data-wow-delay="0.4s">
                            <div class="col-md-3 grid_box rs_content">
                                <a href="#"> <img width="400px;" src="<?php echo base_url() . "blog_uploads/" . $v_blog->image; ?>" class="img-responsive" alt=""><span class="zoom-icon"></span> </a>
                                
                                <div class="grid_box2">
                                    <h6>POSTED BY:<?php echo $v_blog->user_name;?></h6>
                                    <p>DATE:<?php echo $v_blog->publication_date;?></p>
                                </div>
                            </div> 
                            <div class="col-md-9 rs_content2">
                                <h3 class="rs-hed2"><a href="<?php echo base_url()?>blog_detail/<?php echo $v_blog->post_id; ?>"><?php echo $v_blog->blog_title;?></a></h3>
                                <h4 class="rs-hed3"></h4>
                                <p><?php echo $v_blog->blog_description;?>
                                </p>                              
                                <p class="actions">                                   
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
                    <h4 class="section_title title_sm">LATEST BLOG</h4>
                  
                    <div class="img-wrap">
                       
                        <img src="<?php echo base_url() . "blog_uploads/" . $recent_post->image; ?>" alt="Ww8ep2f7qwbywiztv0wx">
                    </div>
                    <div class="description">
                        <h5 class="title"><?php echo $recent_post->blog_title;?></h5>
                        <p class="subtitle">
                            <?php echo $recent_post->blog_description;?>
                        </p>
                    </div>
                       <?php
                    if(empty($recent_post)){ ?>                   
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


