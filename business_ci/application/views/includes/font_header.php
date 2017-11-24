<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Duhoot Bootstarp Website Template | Home :: w3layouts</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <link href="<?php echo base_url() ?>css/full-slider.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="<?php echo base_url() ?>css/style.css" rel='stylesheet' type='text/css' />

        <link href="<?php echo base_url() ?>css/business.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url() ?>css/blog.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url() ?>assets/smooth_notification_plugin/css/css.css" rel='stylesheet' type='text/css' />

        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.11.1.min.js"></script>
<!--        <script type="text/javascript" src="<?php echo base_url() ?>js/jssor.slider.debug.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/jssor.slider.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url() ?>js/jssor.slider.mini.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>js/login.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url() ?>js/jquery.easydropdown.js"></script>
        
                        <script src="<?php echo base_url() ?>js/dropzone.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/smooth_notification_plugin/js/manhua_msgTips.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <!--Animation-->
        <script src="<?php echo base_url() ?>js/wow.min.js"></script>
        <link href="<?php echo base_url() ?>css/animate.css" rel='stylesheet' type='text/css' />
        
        <link href="<?php echo base_url() ?>lightbox/magnific-popup.css" rel='stylesheet' type='text/css' />
        <script src="<?php echo base_url() ?>lightbox/jquery.magnific-popup.min.js"></script>
		

        <script src="<?php echo base_url() ?>star_rating/bootstrap-star-rating.js"></script>

         
        <script>
            jQuery(document).ready(function ($) {

                var jssor_1_SlideoTransitions = [
                    [{b: 5500, d: 3000, o: -1, r: 240, e: {r: 2}}],
                    [{b: -1, d: 1, o: -1, c: {x: 51.0, t: -51.0}}, {b: 0, d: 1000, o: 1, c: {x: -51.0, t: 51.0}, e: {o: 7, c: {x: 7, t: 7}}}],
                    [{b: -1, d: 1, o: -1, sX: 9, sY: 9}, {b: 1000, d: 1000, o: 1, sX: -9, sY: -9, e: {sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1, r: -180, sX: 9, sY: 9}, {b: 2000, d: 1000, o: 1, r: 180, sX: -9, sY: -9, e: {r: 2, sX: 2, sY: 2}}],
                    [{b: -1, d: 1, o: -1}, {b: 3000, d: 2000, y: 180, o: 1, e: {y: 16}}],
                    [{b: -1, d: 1, o: -1, r: -150}, {b: 7500, d: 1600, o: 1, r: 150, e: {r: 3}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: 10000, d: 2000, x: -379, e: {x: 7}}],
                    [{b: -1, d: 1, o: -1, r: 288, sX: 9, sY: 9}, {b: 9100, d: 900, x: -1400, y: -660, o: 1, r: -288, sX: -9, sY: -9, e: {r: 6}}, {b: 10000, d: 1600, x: -200, o: -1, e: {x: 16}}]
                ];

                var jssor_1_options = {
                    $AutoPlay: true,
                    $SlideDuration: 800,
                    $SlideEasing: $Jease$.$OutQuint,
                    $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                //responsive code begin
                //you can remove responsive code if you don't want the slider scales while window resizing
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 1920);
                        jssor_1_slider.$ScaleWidth(refSize);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                //responsive code end
            });
        </script>
        <style>
            .rs_header{
			   background-color: rgb(233, 78, 56);
			   margin-left: 0em;
			   padding-left: 80px;
			}
                        .logoutBox{
                    
                            background-color: white;
                            height: auto;
                            width: 250px;
                            
                        }
                        
                      
                        .logoutBox_diff{
                            background-color: rgb(233, 78, 56) !important;
                            color: white !important;
                            
                        }
                       
            .jssorb05 {
                position: absolute;
            }
            .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                position: absolute;
                width: 16px;
                height: 16px;
                background: url('images/b05.png') no-repeat;
                overflow: hidden;
                cursor: pointer;
            }
            .jssorb05 div { background-position: -7px -7px; }
            .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
            .jssorb05 .av { background-position: -67px -7px; }
            .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }


            .jssora22l, .jssora22r {
                display: block;
                position: absolute;
                width: 40px;
                height: 58px;
                cursor: pointer;
                background: url('images/a22.png') center center no-repeat;
                overflow: hidden;
            }
            .jssora22l { background-position: -10px -31px; }
            .jssora22r { background-position: -70px -31px; }
            .jssora22l:hover { background-position: -130px -31px; }
            .jssora22r:hover { background-position: -190px -31px; }
            .jssora22l.jssora22ldn { background-position: -250px -31px; }
            .jssora22r.jssora22rdn { background-position: -310px -31px; }
        </style>
        <style>
            .slid ul li{
                display:inline;
            }
            .slid ul{
                display:inline;
            }
        </style>
        <script>
            new WOW().init();
        </script>
    </head>
    <body>
	<?php if(($this->uri->segment(1) == 'company_detail') || ($this->uri->segment(1)=='show_company') || ($this->uri->segment(1)=='search') || ($this->uri->segment(1)=='blog_detail') || ($this->uri->segment(1)=='view_blog') || ($this->uri->segment(1)=='verify_company')) { ?>
        <div class="header rs_header">
    <?php } ?>		
            <div class="col-sm-8 header-left">
                <!-- <div class="logo">
                     <a href="index.html"><img src="images/logo.png" alt=""/></a>
                 </div> -->
                <div class="menu my_menu">
                    <a class="toggleMenu" href="#"><img src="images/nav.png" alt="" /></a>
                    <ul class="nav" id="nav">
                           <li ><a href="<?php echo base_url(); ?>home">Company Logo</a></li>
                        <li class="active"><a href="<?php echo base_url(); ?>home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>view_blog">Blog</a></li>
                        <?php if ($this->session->userdata('userid') == '') { ?>  
                            <li><a href="<?php echo base_url(); ?>listbusiness">LIST A BUSINESS</a></li>
                            <?php
                        } else {
                            if ($this->session->userdata('usertype') == 2) {
                                ?>    <!--service provider-->
                                <li><a href="<?php echo base_url(); ?>listbusiness">LIST A BUSINESS</a></li>
                                <?php
                            }
                        }
                        ?>    
                        <div class="clearfix"></div>
                    </ul>
                    <script type="text/javascript" src="js/responsive-nav.js"></script>
                </div>	
                <!-- start search-->
                <!-- <div class="search-box">
                     <div id="sb-search" class="sb-search">
                         <form>
                             <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                             <input class="sb-search-submit" type="submit" value="">
                             <span class="sb-icon-search"> </span>
                         </form>
                     </div>
                 </div>-->
                <!----search-scripts---->
                <script src="js/classie.js"></script>
                <script src="js/uisearch.js"></script>
                <script>
            new UISearch(document.getElementById('sb-search'));
                </script>
                <!----//search-scripts---->						
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-4 header_right">
                 <div id="loginContainer"> 
				  <?php if ($this->session->userdata('userid') == '') { ?>  
                    <a href="<?php echo base_url(); ?>joinnow" style="color:white; margin-right:15px; text-decoration: none;">JOIN NOW</a>
                  <?php } ?>                  
				  <?php if ($this->session->userdata('userid') == '') { ?>  
                        <a href="#" id="loginButton"><img style="height:25px;width:25px" src="<?php echo base_url('uploads/logout.jpg');?>"><span>Login</span></a>
                        <div id="loginBox" class="login_view">                
                            <form id="loginForm" method="post">
                                <fieldset id="body">
                                 <span class="msg"></span>
                                    <fieldset>
                                        <?php
                                        if (validation_errors() || $this->session->flashdata('err')) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <i class="fa fa-ban"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <b>Error!</b> <?php echo validation_errors(); ?>
                                                <?php echo $this->session->flashdata('loginerr'); ?>

                                            </div>
                                        <?php } ?>

                                    </fieldset>
                                    <fieldset>
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="email" id="email">
                                    </fieldset>
                                    <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="password" id="password">
                                    </fieldset>
                                    <input type="button" class="loginajax" id="login" value="Log in">
                                </fieldset>
                                <span><a href="#">Forgot your password?</a></span>
                            </form>
                        </div>
                    <?php } else { 
                         $user_info = $this->option->get_by_id('user','user_id',$this->session->userdata('userid'));
                        ?>
                    <a href="#" id="loginButton" style="text-decoration: none;">
                    <?php if(!empty($user_info->user_image)){?>
                    <img style="height:25px;width:25px" src="<?php echo base_url('uploads/'.$user_info->user_image);?>">
                    <?php }else{?>
                    <img style="height:25px;width:25px" src="<?php echo base_url('uploads/logout.jpg');?>">
                    <?php }?>
                    <span><?php echo $this->session->userdata('username');?></span></a>
                    <?php if($this->uri->segment(1) == 'company_detail') { ?>   
                        <div id="loginBox" class="logoutBox logoutBox_diff">  
                    <?php } else{?>  
                         <div id="loginBox" class="logoutBox logoutBox_diff"> 
                    <?php } ?>
                                    <fieldset>
                                     <span class="msg"></span>
                                        <label>
                                             <?php if($this->session->userdata('usertype') == 0){?>
                                                <a href="<?php echo base_url(); ?>user_activities/<?php echo $this->session->userdata('userid'); ?>"><span>Activities</span></a>
                                             <?php }else{ ?>   
                                                 <a href="<?php echo base_url(); ?>business_listing/<?php echo $this->session->userdata('userid'); ?>"><span>Listings</span></a>
                                             <?php }?>  
                                        </label>
                                    </fieldset>
                                    <fieldset> 
                                      <label><a href="<?php echo base_url(); ?>user_settings/<?php echo $this->session->userdata('userid'); ?>"><span>Settings</span></a></label>
                                    </fieldset>
  
                                    <fieldset>
                                       <label><a href="<?php echo base_url() ?>user/logout"><span>Logout</span></a></label>
                                    </fieldset>
                        </div>
                    <?php } ?>  
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        
          <script>
                $(document).ready(function () {

                    $('.loginajax').click(function () {
                        $('.msg').hide();
                        var email = $(".email").val();
                        //alert(email);
                        var password = $(".password").val();
                        //alert(password);
                        var baseurl = "<?php echo base_url(); ?>";
                        var company_id = "<?php echo $this->uri->segment(2); ?>";
                        // var myurl = baseurl+'save_review/'+company_id; alert(myurl);

                        $.ajax({
                            type: "post",
                            url: baseurl + 'login',
                            data: {email: email, password: password},
                            success: function (result) {
                                //alert(result);
                                var obj = jQuery.parseJSON(result); //alert(obj.success);
                                if (obj.success == 'success') { //alert('sumaya');
                                    $('.msg').html('');
                                    $('.msg').text('You are successfully logged in!!!').css('color','green');
                                    $('.msg').show();
                                    setTimeout("location.reload()",1000);
                                } else { //alert('khadiza');
                                    $('.msg').html('');
                                    $('.msg').text('Wrong Email and Password . Try Again!').css('color','red');
                                    $('.msg').show();
                                }
                                //location.reload();


                            },
                            error: function () {
                                alert('Error while request..');
                            }
                        });
                    });
                });
            </script>