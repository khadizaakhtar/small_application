<div class="banner">
            <div class="container_wrap">
                <h1>What are you looking for?</h1>
                <div class="dropdown-buttons">   
                    <div class="dropdown-button">           			
                        <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                            <?php 
                            foreach($city as $v_city){
                            ?>
                            <option value="0"><?php echo $v_city->city_name; ?></option>	
                            <?php }?>
                        </select>
                    </div>
                    <div class="dropdown-button">
                        <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                            <?php 
                            foreach($all_category as $v_category){
                            ?>
                            <option value="0"><?php echo $v_category->category_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
                <form>
                    <input type="text" value="Keyword, name, date, ..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Keyword, name, date, ...';
                            }">
                    <div class="contact_btn">
                        <label class="btn1 btn-2 btn-2g"><input name="submit" type="submit" id="submit" value="Search"></label>
                    </div>
                </form>        		
                <div class="clearfix"></div>
            </div>
        </div>