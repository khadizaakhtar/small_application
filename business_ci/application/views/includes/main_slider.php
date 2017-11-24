<?php $this->load->model('business_model');
$city = $this->business_model->get_allcity();
$all_category = $this->business_model->get_all_category();
?>
<div class="banner">
            <div class="container_wrap">
                <h1>What are you looking for?</h1>
               <form method="post" action="<?php echo base_url()?>search/highestrate">  
                <div class="dropdown-buttons">   
                    <div class="dropdown-button">           			
                        <select class="dropdown" name="city" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                            <option value="">Select City</option>
                            <?php 
                            foreach($city as $v_city){
                            ?>
                            <option value="<?php echo $v_city->city_id?>"><?php echo $v_city->city_name; ?></option>	
                            <?php }?>
                        </select>
                    </div>
                    <div class="dropdown-button">
                        <select class="dropdown" name="category" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                            <option value="">Select Catagory</option>
                            <?php 
                            foreach($all_category as $v_category){
                            ?>
                             <option value="<?php echo  $v_category->category_id;?>"><?php echo $v_category->category_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
                   <input type="text" name="name" value="" placeholder="company name">
                   <!-- <input type="text" value="Keyword, name, date, ..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Keyword, name, date, ...';
                            }">-->
                    <div class="contact_btn">
                        <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Search"></label>
                    </div>
                </form>        		
                <div class="clearfix"></div>
            </div>
        </div>