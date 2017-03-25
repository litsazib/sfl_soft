
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	<label> Code <sup><strong style="color:#F00">*</strong></sup></label>
                            <span class="field " ><input type="text" name="pd_code"  id="pd_code" class="input-small" placeholder="Exp: PD001" /></span>
                           
                        </p>
  <p class="animate5 bounceIn">
   	<label> Name <sup><strong style="color:#F00">*</strong></sup></label>
    <span class="field"><input type="text" name="pd_name" class="input-medium" placeholder="Name" id="pd_name" /></span>
    </p>
    
 
                        
  <p >
   	<label>Catagory </label>
       <span class="formwrapper">
                            	<select name="catagory_id" class="chzn-select"  id="catagory_id" style="width:350px;"  data-placeholder="Choose a Catagory...">
                                  <option value="0"></option> 
                                  <option value="0">Please Select Catagory</option>
                                  
                                  <?php
                                $res=$this->sql("SELECT `id_catagory`,CONCAT('[ ',`cat_code`,' ] ',`cat_name`) AS 'cat_name' FROM `catagory` WHERE `status`='Active'");
								
								  foreach($res as $value){
									  ?>
                                      <option value="<?php  echo ($value['id_catagory']);?>"><?php  echo ($value['cat_name']);?></option> 
                                      <?php
								  }
								  ?>
                                  
                                 
                                </select>
    </span>
  </p>
  <p >
   	<label>Sub Catagory </label>
       <span class="formwrapper">
                            	<select name="sub_catagory_id" class="chzn-select" id="sub_catagory_id" style="width:350px" tabindex="2" data-placeholder="Choose a Sub Catagory...">
                                  <option value="0"></option> 
                                  <option value="0">Please Select Catagory</option>
                                  
                                  <?php
                                $res=$this->sql("SELECT `id_sub_catagory`,CONCAT('[ ',`sub_cat_code`,' ] ',`sub_cat_name`) AS 'sub_cat_name' FROM `catagory_sub` WHERE `status`='Active'");
								
								  foreach($res as $value){
									  ?>
                                      <option value="<?php  echo ($value['id_sub_catagory']);?>"><?php  echo ($value['sub_cat_name']);?></option> 
                                      <?php
								  }
								  ?>
                                  
                                 
                                </select>
    </span>
  </p>
                        
                       <p >
   	<label>Product Type </label>
       <span class="formwrapper">
                            	<select name="pd_type"  id="pd_type" style="width:350px" tabindex="2" data-placeholder="Choose a Product Type...">
                                  <option value="Finish Good Product">Finish Good Product</option> 
                                  <option value="Raw material product">Raw Material Product</option>
                               
                                </select>
    </span>
  </p>
                        
                        
                        
                        <p class="stdformbutton animate9 bounceIn" align="right">
                            <button id="registation" class="btn btn-primary">Submit Product Registration</button>
                           
                        </p>
                        
                   
</div><!--widgetcontent-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
										 

	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.bordered').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	jQuery('#pd_code,#pd_name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	jQuery('#registation').click(function(){
		if(!jQuery.browser.msie) {
					if(jQuery('#pd_code').val() == '' || jQuery('#pd_name').val() == '') {
						if(jQuery('#pd_code').val() == '') jQuery('#pd_code').addClass('error'); else jQuery('#pd_code').removeClass('error');
						if(jQuery('#pd_name').val() == '') jQuery('#pd_name').addClass('error'); else jQuery('#pd_name').removeClass('error');
						jQuery('.widgetcontent').addClass('animate0 wobble').bind(anievent,function(){
							jQuery(this).removeClass('animate0 wobble');
						});
					}else{
											
						
						jQuery.post("<?php echo BASE_URL?>?ManageProduct_pdRegistration",{
							pd_code: jQuery('#pd_code').val(),
							pd_name: jQuery('#pd_name').val(),
							catagory_id: jQuery('#catagory_id').val(),
							sub_catagory_id: jQuery('#sub_catagory_id').val(),
							pd_type: jQuery('#pd_type').val()
							},
						function(data){
							
							switch(data){
								case 'true':
								jQuery.jGrowl("Successfully Registered<br> Product Code: "+jQuery('#pd_code').val());
								
								window.location= "<?php echo BASE_URL?>?ManageProduct_pdRegistration";
								break;
								case 'false':
								jQuery.jGrowl("Please Try Again");
								break;
								case 'current':
								jQuery.jGrowl("Customer already exists");
								break;
								default :
								
								jQuery.jGrowl("Please Try Again");
							}
								
								}
							
						
						);
						
											
						
						}
						
			
			}
		
		});
	
});
	</script>