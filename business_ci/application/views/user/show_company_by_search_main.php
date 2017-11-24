<?php
//echo $name.' '.$category_id.' '.$city
if (($city != '') || ($category_id != '') || ($name != '')) {
    if (($city != '') && ($category_id == '') && ($name == '')) { //city
        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'city/' . $city . '/' . $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'city/' . $city . '/' . $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'city/' . $city . '/' . $page;
    }
    if (($city == '') && ($category_id != '') && ($name == '')) { //category
        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'category/' . $category_id . '/' . $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'category/' . $category_id . '/' . $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'category/' . $category_id . '/' . $page;
    }
    if (($city == '') && ($category_id == '') && ($name != '')) { //name
        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'name/' . $name . '/' . $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'name/' . $name . '/' . $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'name/' . $name . '/' . $page;
    }
    if (($city != '') && ($category_id != '') && ($name != '')) { //city, category, name
        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . $category_id . '/' . $city . '/' . $name . '/' . $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . $category_id . '/' . $city . '/' . $name . '/' . $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . $category_id . '/' . $city . '/' . $name . '/' . $page;
    }
    if (($city != '') && ($category_id != '') && ($name == '')) { //city,category
        //$base_url = base_url() . 'search/' . $rate . '/' . 'cat_city/' . $category_id . '/' . $city;

        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'cat_city/' .$category_id. '/'.$city . '/' . $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'cat_city/' .$category_id. '/'.$city . '/' . $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'cat_city/' .$category_id. '/'.$city . '/' . $page;
    }
    if (($city != '') && ($category_id == '') && ($name != '')) { //city,name
       // $base_url = base_url() . 'search/'.$rate.'/' .'co_name/'. $name .'/'. 'city/' . $city;
        
        $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'co_name/' .$name. '/'.'city' . '/'.$city .'/'. $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'co_name/' .$name. '/'.'city' . '/' .$city .'/'. $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'co_name/' .$name. '/'.'city'. '/' .$city .'/'.$page;
    }
    if (($city == '') && ($category_id != '') && ($name != '')) { //category,name
        
         $base_url = base_url() . 'search/' .$rate.'/'.'co_name/'. $name .'/'. 'cat/' . $category_id;
         
         $base_url_alfabetically = base_url() . 'search/' . 'alfabetically' . '/' . 'co_name/' .$name. '/'.'cat' . '/'.$category_id .'/'. $page;
        $base_url_recentfirst = base_url() . 'search/' . 'recentfirst' . '/' . 'co_name/' .$name. '/'.'cat' . '/' .$category_id .'/'. $page;
        $base_url_highestrate = base_url() . 'search/' . 'highestrate' . '/' . 'co_name/' .$name. '/'.'cat'. '/' .$category_id .'/'.$page;
    }
}
?>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 lis1" style="background-color:white;">
                        <div class="results-header">
                            <div class="results-count pull-left">
                                <?php echo$total_rows; ?> Total Listings
                            </div>
                            <ul class="results-sort cat-check pull-right">
                                <li>
                                    <input type="radio" value="Alphabetically" name="filterrific[sorted_by]" id="Alphabetically">
                                    <label for="Alphabetically" id="Alphabetically"> <a href="<?php echo $base_url_alfabetically; ?>">Alphabetically</a></label>
                                </li>
                                <li>
                                    <input type="radio" value="Recent First" name="filterrific[sorted_by]" id="Recent First">
                                    <label for="Recent First" id="RecentFirst"><a href="<?php echo $base_url_recentfirst; ?>">Recent First</a></label>
                                </li>
                                <li>                           
                                    <input type="radio" value="Highest Rated" name="filterrific[sorted_by]" id="Highest Rated">
                                    <label for="Highest Rated" id="HighestRated"><a href="<?php echo $base_url_highestrate; ?>">Highest Rated</a></label>
                                </li>
                            </ul>
                        </div>	
                    </div>
                </div>

                <div class="recent_first">  
                    <?php
                    foreach ($all_company as $vk_company) {
                        $company_id = $vk_company->company_id;
                        $review = $this->user_model->get_review_by_company_id($company_id);
                        $rating = $this->user_model->count_avg_ratings($company_id);
                        $rat = round($rating->rating, 2);
                        ?>
                        <div class="row rs_content">                  
                            <div class="col-md-12" style="background-color:white;">
                                <div class="entertain_box1 wow fadeInRight" data-wow-delay="0.4s">
                                    <div class="col-md-3 grid_box rs_content">
                                        <a href="#"> <img width="400px;" src="<?php echo base_url() . "uploads/" . $vk_company->company_logo; ?>" class="img-responsive" alt=""><span class="zoom-icon"></span> </a>
                                        <div class="grid_box2">
                                            <h4><a href="#">Photos</a></h4>
                                            <p><?php echo $rat; ?> Ratings</p>
                                        </div>
                                    </div> 
                                    <div class="col-md-9 rs_content2">
                                        <h3 class="rs-hed2"><?php echo $vk_company->company_name; ?></h3>
                                        <h4 class="rs-hed3"><img src="<?php echo base_url(); ?>/images/location.ico"><?php echo $vk_company->company_address; ?></h4>
                                        <p><?php echo $vk_company->company_description; ?>
                                        </p>                              
                                        <p class="actions">
                                            <span><i class="fa fa-comments"></i> <?php echo $review->total; ?> Reviews </span>
                                            <span class="share right"> <span>Share</span> 
                                                <?php
                                                if ($vk_company->twitter_link != '') {
                                                    ?>
                                                    <a href="<?php echo $vk_company->twitter_link; ?>" class="tw" target="_blank"> <img width="20px;" height="20px;" src="<?php echo base_url(); ?>/images/favicont.ico"></a> 
                                                <?php } ?>

                                                <?php
                                                if ($vk_company->facebook_link != '') {
                                                    ?>
                                                    <a href="<?php echo $vk_company->facebook_link; ?>" target="_blank" class="fb"><img width="20px;" height="20px;" src="<?php echo base_url(); ?>/images/favicon.ico"></a>
                                                <?php } ?>
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
                <div class="clearfix"> </div>
            </div>
        </div>       
    </div>
</div> 

