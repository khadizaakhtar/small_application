<div class="content_middle">
    <div class="container">
        <div class="content_middle_box">
            <div class="top_grid">
                <div class="col-md-12">
                    <p><h3><?php echo $blog_detail->category_name; ?>-><span style="color:#0d4e8f;"><?php echo $blog_detail->blog_title; ?></span></h3></p>
                </div>
            </div>
            <div class="top_grid">
                <div class="col-md-8">
                    <div class="grid1">
                        <div class="index_img parent-container">
<a href="<?php echo base_url() . "blog_uploads/" . $blog_detail->image; ?>"><img src="<?php echo base_url() . "blog_uploads/" . $blog_detail->image; ?>" style="width:100%;height:365px;" alt=""/></a>     
<?php
if(empty($blog_detail->image)){
?>     
<a href="<?php echo base_url() . "blog_uploads/" . $blog_detail->image; ?>"><img src="<?php echo base_url();?>images/default_avatar.jpg" style="width:100%;height:365px;" alt=""/></a>  
<?php } ?>                
                        </div>                       
                    </div>
                    <div class="inner_wrap1">
                        <ul class="item_module">
                            <li class="module_left" style="padding:0 0 15px 0 !important"><p style="color:#788291;">POSTED BY: <?php echo $blog_detail->user_name;?></p></li>
                            <li class="module_right">
                              <p>POSTED DATE: <?php echo $blog_detail->publication_date;?></p>
                            </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">                
                    <div class="grid1">
                        <div class="inner_wrap1 my_wrap1_companydetail">
                            <div class="googlemap">
                                <div id="googleMapUp12" style="width:100%;height:350px;">
                                   LATEST BLOG
                                   <a href="<?php echo base_url() . "blog_uploads/" . $latest_blog_detail->image; ?>"><img src="<?php echo base_url() . "blog_uploads/" . $latest_blog_detail->image; ?>" style="width:100%;height:300px;" alt=""/><?php echo $latest_blog_detail->blog_title;?></a>
                                </div>
                            </div>
                        </div>
                        <div class="inner_wrap1 my_wrap1_address">
                            <ul class="item_module my_wrap1_website">
                            </ul>
                            <ul class="website">					 
                                <li></li>
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
                            <?php echo $blog_detail->blog_description; ?>
                        </p>   
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        
        <div class="middle_grid wow fadeInUp" data-wow-delay="0.4s">
            <div class="col-md-8">
                <?php if(($this->session->userdata('userid') != '') && ($this->session->userdata('usertype') != 2)) {?>
		<div class="grid1">
                        <div class="col-md-12" style="background-color:whitesmoke; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="review_box_service">
                                <li><p>comment</p><hr></li>
                            </ul>
                            <ul class="website parent-container">
                                 <li>
                                  <?php if(!empty($user_info->user_image)){?>
                                    <img src="<?php echo base_url('uploads/' . $user_info->user_image); ?>" class="img-responsive featured-img avatar" alt=""/>
                                    <?php } else{?>
                                     <img src="<?php echo base_url() . "images/default_avatar.jpg"?>" class="img-responsive featured-img avatar" alt=""/>
                                   <?php }?>
                                </li>
			        <li><textarea id="body" class="review-text" name="review" placeholder="Add a comment" required="required" rows="2"></textarea></li>
                                <div class="clearfix"> </div>
                            </ul>
			    <ul class="website parent-container">
                                <li><div id="stars-green" data-rating="3"></div></li>
		              <li style="float:right"><input class="btn blue review-submit" name="commit" type="submit" value="Send Comment"></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>                       
                    </div>
		<?php }else{ ?>
                <div class="grid1">
                        <div class="col-md-12" style="background-color:whitesmoke; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="review_box_service">
                                <li class="module_left" style="padding:0 0 15px 0 !important"><p>Review</p><hr></li>
                                <li><p>To write a comment, sign in to your account as a member</p></li>			
                                <div class="clearfix"> </div>
                            </ul>
                        </div>                       
                    </div>
                <?php }?>
             <div id="loadmore">   
                 <?php if(isset($comments) && !empty($comments)){ 
                      foreach ($comments as $v_comment) {
                    ?>                
                    <div class="grid1"> 
                        <?php $user_info = $this->option->UsersData('user','user_id='.$v_comment->user_id);?>
                        <div class="col-md-12" style="background-color:white; padding-bottom:10px; margin-bottom: 15px;">
                            <ul class="website parent-container">
                                <li>
                                    <?php foreach ($user_info as $user) {?>
                                 <?php if(!empty($user->user_image)){?>
                                <img src="<?php echo base_url('uploads/'.$user->user_image);?>" class="img-responsive featured-img avatar" alt=""/>
                                   <?php } else{?>
                                   <img src="<?php echo base_url() . "images/default_avatar.jpg"?>" class="img-responsive featured-img avatar" alt=""/>
<?php } }?>
                                </li>                           
			        <li><p><?php echo $v_comment->comments;?></p></li>
                                <div class="clearfix"> </div>
                            </ul>
                            <ul class="website parent-container">
                               <li><a href="">
                                        <?php foreach ($user_info as $user) {
                                   echo $user->user_name;
                                   }?>
                                   </a></li><span>.</span>
                                <li><?php date_default_timezone_set("Asia/Qatar"); echo date('M-d-Y',strtotime($v_comment->date));?></li><span>.</span>
                                <li><span></span></li>
                            </ul>
                        </div>                   
                    </div>
                  <?php } ?>
                <input type="button"  class="loadmorebtn" value="loadmore" style="padding:2px;"/>
                <input type="hidden" name="limit" id="limit" value="2"/>
                <input type="hidden" name="offset" id="offset" value="2"/>
                  <?php   }?>
           </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>					
    </div>
    <script>	
		     $(document).ready(function(){	              
		       $('.review-submit').click(function(){
			 var review = $('textarea[name=review]').val(); //alert(review);
			 var baseurl = "<?php echo base_url();?>";
			 var post_id = "<?php echo $this->uri->segment(2); ?>";
			 $.ajax({
		         type: "post",
		         url: baseurl+'save_comment/'+post_id,			
		         data: {review : review, post_id : post_id},
		         success: function(result){	
                        location.reload();
								 
			
		        },
		        error: function(){						
			        alert('Error while request..');
		        }
            });
		 });

              $('.loadmorebtn').click(function () {
                var lim =$('#limit').val(); //alert('limit:'+lim);
                var off = $('#offset').val(); //alert('start:'+off);
                var baseurl = "<?php echo base_url(); ?>";
                var company_id = "<?php echo $this->uri->segment(2); ?>";
                $.ajax({
                    type: "post",
                    url: baseurl + 'loadmore',
                    data: {
                        offset:$('#offset').val(),
                        limit: $('#limit').val(),
                        company_id: company_id
                    },
                    success: function (data) {
                       // var result = data.view;
                       var obj = jQuery.parseJSON(data);
                            console.log(obj.view);
 
                        $('#loadmore').append(obj.view);
                        $('#offset').val(obj.offset);
                        $('#limit').val(obj.limit);
                        
                        if(obj.view == ''){
                            $('.loadmorebtn').val('No more review to show');
                        }
                    }
                });
            });
});
</script>