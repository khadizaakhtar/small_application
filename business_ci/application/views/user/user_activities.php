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
                <div class="regform" style="padding-bottom: 20px;">
                    <h3 style="text-align:center; padding-top:50px;">User's Activities</h3><hr>
                      <ul style="list-style: none; display:inline-block;">
                        <li>
                           <span style="width:50px; padding-left:168px">
                               <?php //echo $user_info->user_name;?>
                               <?php //echo $user_info->first_name.' '.$user_info->last_name;?>
                               <span style="padding-left: 555px;"><button class="lis-button" type="button" id="publish"><div class="review"></div></button> 
                                <br style="clear:both" /></span>
                           </span>
                           <span style="padding:25px;"><img align="center" id="blah" alt="" style="height:110px; width:110px;padding:20px;"  name="image" class="msg-img" src="<?php echo base_url('uploads/'.$user_info->user_image);?>"/></span>
                           <span style="width:50px;">
                               <?php echo $user_info->first_name." ".$user_info->last_name;?>
                               <?php //echo $user_info->first_name.' '.$user_info->last_name;?>
                               <span style="padding-left: 500px; color:red;"><?php echo $count_review->total; ?>&nbsp;&nbsp;<button class="lis-button" type="button" id="publish">REVIEWS</button> 
                                <br style="clear:both" /></span>
                            </span>
                        </li>
                        <li>
                            
                        </li>
                      </ul>
                </div>  
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




