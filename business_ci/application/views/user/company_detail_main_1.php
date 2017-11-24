<div class="content_middle">
    <div class="container">
        <div class="content_middle_box">
		<?php //foreach($company_detail as $detail) { ?>
            <div class="top_grid">
                <div class="col-md-12">
                    <p><h3><?php echo $company_detail->company_name;?></h3></p>
                </div>
            </div>
            <div class="top_grid">
                <div class="col-md-8">
                    <div class="grid1">
                        <div class="index_img parent-container"><a href="<?php echo base_url().'images/pic4.jpg'?>"><img src="<?php echo base_url() . "uploads/" . $company_detail->company_logo; ?>" style="width:100%;height:365px;" alt=""/></a></div>
                    </div>
                    <div class="inner_wrap1">
                        <ul class="item_module">
                            <li class="module_left" style="padding:0 0 15px 0 !important"><p>Rating&nbsp;&nbsp;&nbsp;<?php echo round($avg_ratings->rating,2)?>/5</p></li>
                            <li class="module_right">
                               <!-- <img src="images/m_star.png" class="img-responsive" alt=""/>-->
                            </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="grid1">
                        <ul class="vision">
                            <li></li>
                            <li class="desc"><a href="#"> <img src="" alt=""></a></li>
                        </ul>
                        <div class="inner_wrap1 my_wrap1_companydetail">
                            <div class="googlemap">
                                <div id="googleMapUp12" style="width:100%;height:280px;">
                                </div>
                            </div>
                        </div>
                        <div class="inner_wrap1 my_wrap1_address">
                            <ul class="item_module my_wrap1_website">
                                <li class="module_left"><img src="<?php echo base_url();?>images/location.ico" class="img-responsive" alt=""/></li>
                                <li class="module_right" style="padding: 10px 0 0 0;">
                                    <p><?php echo $company_detail->company_address;?></p>
                                </li>
                                <li class="module_left"><img src="<?php echo base_url();?>images/mobile.ico" class="img-responsive" alt=""/></li>
                                <li class="module_right" style="padding: 10px 0 0 0;">
                                    <p><?php echo $company_detail->mobile_number;?></p>
                                </li>
                                <li class="module_left" ><img src="<?php echo base_url();?>images/email.ico" class="img-responsive" alt=""/></li>
                                <li class="module_right" style="padding: 10px 0 0 0;">
                                    <p><?php echo $company_detail->email;?></p>
                                </li>
                            </ul>
                            <ul class="website">
							  <?php if($company_detail->company_website !=''){ ?>
                                <li><img src="<?php echo base_url();?>images/globe.ico" class="img-responsive" alt=""/></li>
                                <li><a href="<?php echo $company_detail->company_website;?>">website</a></li>
						      <?php } ?>	
                              <?php if($company_detail->facebook_link !=''){ ?>							  
                                <li><img src="<?php echo base_url();?>images/favicon.ico" class="img-responsive" alt=""/></li>
                                <li><a href="<?php echo $company_detail->facebook_link;?>">facebook</a></li>
						      <?php }?>
	                          <?php if($company_detail->twitter_link !=''){ ?>		
                                <li><img src="<?php echo base_url();?>images/favicont.ico" class="img-responsive" alt=""/></li>
                                <li><a href="<?php echo $company_detail->twitter_link;?>">twitter</a></li>
						      <?php } ?>		
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
			
			
			
            <div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
                <div class="col-md-8">
                    <div class="grid1" style="box-shadow:none !important;">
                        <h3>About</h3>
                        <p style="text-align: justify;">
                            <?php echo $company_detail->company_description;?>
                        </p>   
                    </div>
                </div>
                

                  <?php
                    if(isset($multiple_image) && !empty($multiple_image)){
                   ?>
                <div class="col-md-4">
                    <div class="grid1 image_grid1">
                        <div class="col-md-12" style="background-color:white;">
                            <p class="office_add_companydetail">Images</p>
                            <ul class="website parent-container">
                              
                                <?php  
                                foreach($multiple_image as $image){
                                ?>
                                <li><a href="<?php echo base_url() . "multi_img/" . $image->images; ?>"><img src="<?php echo base_url() . "multi_img/" . $image->images; ?>" class="img-responsive featured-img" alt=""/></a></li>
                                <?php }?>
                               
                                <div class="clearfix"> </div>
                            </ul>
                        </div>                       
                    </div> <hr>			
                </div>
                 <?php }?>


                <div class="clearfix"> </div>
            </div>
		<?php //} ?>
		
            </div>			
        <div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
            <div class="col-md-8">
                <?php if(($this->session->userdata('userid') != '') && ($this->session->userdata('usertype') != 2)) {?>
		<div class="grid1">
                        <div class="col-md-12" style="background-color:whitesmoke; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="review_box_service">
                                <li><p>Review</p><hr></li>
                            </ul>
                            <ul class="website parent-container">
                                
                                <li>
                             
                                <img src="<?php echo base_url('uploads/'.$user_info->user_image);?>" class="img-responsive featured-img avatar" alt=""/>
                                
                                </li>
			        <li><textarea id="body" class="review-text" name="review" placeholder="Add a review" required="required" rows="2"></textarea></li>
                                <div class="clearfix"> </div>
                            </ul>
			    <ul class="website parent-container">
                                <li><div id="stars-green" data-rating="3"></div></li>
								<li style="float:right"><input class="btn blue review-submit" name="commit" type="submit" value="Send Review"></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>                       
                    </div>
		<?php }else{ ?>
                <div class="grid1">
                        <div class="col-md-12" style="background-color:whitesmoke; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="review_box_service">
                                <li class="module_left" style="padding:0 0 15px 0 !important"><p>Review</p><hr></li>
                                <li><p>To write a review, sign in to your account as a member</p></li>			
                                <div class="clearfix"> </div>
                            </ul>
                        </div>                       
                    </div>
                <?php }?>
                
                <?php if(isset($reviews) && !empty($reviews)){ 
                      foreach ($reviews as $rev) {
                    ?>
                <div class="grid1">
                <?php $user_info = $this->option->UsersData('user','user_id='.$rev->created_by);?>
                        <div class="col-md-12" style="background-color:white; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="website parent-container">
                                <li><?php foreach ($user_info as $user) {?>
                                <img src="<?php echo base_url('uploads/'.$user->user_image);?>" class="img-responsive featured-img avatar" alt=""/></li>
                                <?php }?>
			        <li><p><?php echo $rev->comment;?></p></li>
                                <div class="clearfix"> </div>
                            </ul>
                            <ul class="website parent-container">
                               
                                <li><a href=""><?php foreach ($user_info as $user) {
                                   echo $user->user_name;
                                   }?></a></li><span>.</span>
                                <li><?php date_default_timezone_set("Asia/Qatar"); echo date('M-d-Y',strtotime($rev->create_time));?></li><span>.</span>
                                <li><span>5/<?php  echo $rev->rating;?></span></li>
                            </ul>
                        </div>                       
                    </div>
                <?php } }?>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>					

        </div>
        <script>
            function initialize() {
                var myLatLng = {lat: <?php echo $company_detail->latitude; ?>, lng: <?php echo $company_detail->longitude; ?>};

                var map = new google.maps.Map(document.getElementById('googleMapUp12'), {
                    zoom: 4,
                    center: myLatLng
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                });
            }
            google.maps.event.addDomListener(window, 'load', initialize);

            $('.parent-container').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image'
                        // other options
            });

        </script>
	<script>	
		$(document).ready(function(){
	         $("#stars-green").rating('create',{coloron:'green',onClick:function(){ 
	         //alert('rating is ' + this.attr('data-rating')); 
			 //var rating = this.attr('data-rating'); //alert(rating);
			 //var review = $('textarea[name=review-text]').val(); //alert(review);
			 
		 }});	
		 $('.review-submit').click(function(){
		     var rating = $("#stars-green").attr('data-rating'); //alert(rating);
			 var review = $('textarea[name=review]').val(); //alert(review);
			 var baseurl = "<?php echo base_url();?>";
			 var company_id = "<?php echo $this->uri->segment(2); ?>";
			// var myurl = baseurl+'save_review/'+company_id; alert(myurl);
			 
			 $.ajax({
		         type: "post",
		         url: baseurl+'save_review/'+company_id,			
		         data: {review : review, rating : rating, company_id : company_id},
		         success: function(result){	
                    
					    location.reload();
								 
			
		        },
		        error: function(){						
			        alert('Error while request..');
		        }
            });
		 });
});
</script>