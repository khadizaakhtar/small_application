<div class="content_middle">
    <div class="container">
        <div class="col-sm-10">
            <div class="main-content">
                <?php
                if (validation_errors() || $this->session->flashdata('failed')) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Error!</b> <?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('failed'); ?>
                    </div>
                <?php } ?>
                <?php
                if ($this->session->flashdata('success')) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Success!</b> 
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?> 
                <div class="regform">
                    <h3 style="text-align:center; padding-top:50px;">Registration or <span class="login"><a>Login</a></span></h3><hr>
                    <form  action="<?php echo base_url(); ?>joinnow" method="post" class="registration-form">
                        <div class="form-group full-width">
                            <label style="font-size:16px;">Select User Type:</label>
                            <span><input type="radio" name="access_level" value="0" checked>User</span>
                            <span><input type="radio" name="access_level" value="2">Business</span>
                        </div>
                        <div class="member">
                            <div class="member_name">    
                                <div class="form-group full-width">
                                    <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" id="tenantName" class="form-control" placeholder="First Name"/>
                                </div>	                   	                   
                                <div class="form-group full-width">
                                    <input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control" placeholder="Last Name"/>
                                </div>
                            </div>  

                            <div class="business">    
                                <div class="form-group full-width">
                                    <input type="text" name="business_name" value="<?php echo set_value('business'); ?>" id="tenantName" class="form-control" placeholder="Business Name"/>
                                </div>  
                            </div>   
                            
                            <div class="form-group full-width">
                                <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email Address"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="password" name="re_pass" value="<?php echo set_value('re_pass'); ?>"  class="form-control" placeholder="Password Confirmation"/>
                            </div>
                            <div class="form-group full-width">
                                <input type="checkbox" name="terms" class="terms-check" value="1"><span class="terms-text">I have read and accept terms and conditions</span>
                            </div>


                            <div class="form-group full-width">
                                <button class="reg-btn" type="submit" id="publish">Create My Account</button> 
                                <br style="clear:both" />
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
             $('.business').css('display','none');
             $('.member_name').css('display','block');
             $(".member").show();
             
            $("input[name='access_level']").click(function () { 
                var usertype = $(this).val(); //alert(usertype);
                if(usertype == 0){
                    $('.business').css('display','none');
                    $('.member_name').css('display','block');
                    $(".member").show();
                }else{
                    $('.member_name').css('display','none');
                    $('.business').css('display','block');
                    $(".member").show();
                }
            });
        });

    </script>
<script>
      $(".login").click(function () { 
          $('#login').css('active');
          $('.login_view').show();
           window.scrollTo(500, 0);
    });    
    </script>    
  




