<div class="educate_grid">
    <?php 
    foreach($last_two_post as $v_lpost){
    ?>
    <div class="col-md-6">
        <div class="living_box"><a href="#">
                <img src="<?php echo base_url()."blog_uploads/".$v_lpost->image;?>" class="img-responsive" alt=""/>
                <span class="sale-box">
                    <span class="sale-label">Blog</span>
                </span>
            </a>
            <div class="living_desc desc1">
                <h3><a href="#"><?php echo $v_lpost->blog_title;?></a></h3>
                <p>Lorem ipsum consectetuer adipiscing </p>
                <p class="educate"><img src="images/like2.jpg" alt=""/>
                    <img src="images/share2.png" alt=""/></p>
                <p class="price pr_box"></p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php }?>
  <div class="clearfix"></div>
</div>

<div class="educate_grid1">
    <?php 
    foreach($last_post_offset_two as $v_lopost){
    ?>
    <div class="col-md-6">
        <div class="living_box"><a href="#">
                <img src="<?php echo base_url()."blog_uploads/".$v_lopost->image;?>" class="img-responsive" alt=""/>
                <span class="sale-box">
                    <span class="sale-label">plan</span>
                </span>
            </a>
            <div class="living_desc desc1">
                <h3><a href="#">aliquam volutp</a></h3>
                <p>Lorem ipsum consectetuer adipiscing </p>
                <p class="educate"><img src="images/like2.jpg" alt=""/>
                    <img src="images/share2.png" alt=""/>
                </p>
                <p class="price pr_box"></p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
     <?php }?>
    <div class="clearfix"></div>
</div>
