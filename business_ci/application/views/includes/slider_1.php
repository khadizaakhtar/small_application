<div class="content_top">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 200px; overflow: hidden; visibility: hidden;">
                            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                                <div style="position:absolute;display:block;background:url('images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                            </div>
                            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 200px; overflow: hidden;">
                                <div class="slid" data-p="225.00" style="display: none;">
                                    <ul>
                                        <li><div style="width:110px; height:110px; border-radius:55px; float:left; margin-left:75px; margin-top:20px; border:1px solid #E7E7E7;"><a href="#"><p class="kcat"><img width="40px" height="40px;" src="<?php echo base_url()."uploads/health.png" ?>"></p></a></div></li>
                                        <?php 
                                        foreach($slider_category as $k_category){
                                        ?>
                                        <li><div style="width:110px; height:110px; border-radius:55px; float:left; margin-left:98px; margin-top:20px; border:1px solid #E7E7E7;"><a href="<?php echo base_url();?>/show_company/<?php echo $k_category->category_id;?>"><p class="kcat"><img width="40px" height="40px;" src="<?php echo base_url()."uploads/".$k_category->category_icon; ?>"></p></a></div>                                         
                                        </li>
                                        <?php } ?>
                                    </ul>
                                  
                                    <ul class="kcatp">
                                        <li>All</li>
                                         <?php 
                                        foreach($slider_category as $k_category){
                                        ?> 
                                        <li><a href="<?php echo base_url();?>show_company/<?php echo $k_category->category_id;?>"><?php echo $k_category->category_name;?></a></li>
                                      <?php } ?>
                                    </ul>
                                       
                                </div>
                                <div  class="slid" data-p="225.00" style="display: none;">
                                    <ul>
                                        <?php 
                                        foreach($slider_category2 as $k_category2){
                                        ?>
                                        <li><div style="width:110px; height:110px; border-radius:55px; float:left; margin-left:100px; margin-top:20px; border:1px solid #E7E7E7;"><a href="<?php echo base_url();?>/show_company/<?php echo $k_category2->category_id;?>"><p class="kcat"><img width="40px" height="40px;" src="<?php echo base_url()."uploads/".$k_category2->category_icon; ?>"></p></a></div></li>
                                          <?php } ?>
                                        <div style="width:110px; height:110px; border-radius:55px; float:left; margin-left:100px; margin-top:20px;"></div></li>
                                    </ul><br/>
                                    
                                    <ul class="kcatp2">
                                         <?php 
                                        foreach($slider_category2 as $k_category2){
                                        ?> 
                                      <li><a href="<?php echo base_url();?>/show_company/<?php echo $k_category2->category_id;?>"><?php echo $k_category2->category_name;?></a></li>
                                      <?php } ?>
                                    </ul>
                                </div>                               
                            </div>
                            <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                                <div data-u="prototype" style="width:16px;height:16px;"></div>
                            </div>
                            <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
                            <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
                            <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
