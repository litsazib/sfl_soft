
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	<label>Sub Catagory Code <sup><strong style="color:#F00">*</strong></sup></label>
                            <span class="field " ><input type="text" name="sub_cat_code"  id="sub_cat_code" class="input-small" placeholder="Exp: SUBCATA001" /></span>
                           
                        </p>
                        <p class="animate5 bounceIn">
   	<label>Sub Catagory Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input type="text" name="sub_cat_name" class="input-medium" placeholder="Name" id="sub_cat_name" /></span>
    </p>
    
 
                        
  <p class="animate6 bounceIn">
   	<label>Catagory Name</label>
       <span class="formwrapper">
                            	<select name="catagory_id" class="chzn-select" id="catagory_id" style="width:350px" tabindex="2" data-placeholder="Choose a Catagory...">
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
                        
                       
                        
                        
                        <p class="stdformbutton animate9 bounceIn" align="right">
                            <button id="registation" class="btn btn-primary">Submit Sub Catagory Registration</button>
                           
                        </p>
                        
                   
</div><!--widgetcontent-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
										 

	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.bordered').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	jQuery('#sub_cat_code,#sub_cat_name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	jQuery('#registation').click(function(){
		if(!jQuery.browser.msie) {
					if(jQuery('#sub_cat_code').val() == '' || jQuery('#sub_cat_name').val() == '') {
						if(jQuery('#sub_cat_code').val() == '') jQuery('#sub_cat_code').addClass('error'); else jQuery('#sub_cat_code').removeClass('error');
						if(jQuery('#sub_cat_name').val() == '') jQuery('#sub_cat_name').addClass('error'); else jQuery('#sub_cat_name').removeClass('error');
						jQuery('.widgetcontent').addClass('animate0 wobble').bind(anievent,function(){
							jQuery(this).removeClass('animate0 wobble');
						});
					}else{
											
						
						jQuery.post("<?php echo BASE_URL?>?ManageProduct_SubcataRegistration",{
							subCatarCode: jQuery('#sub_cat_code').val(),
							sub_cat_name: jQuery('#sub_cat_name').val(),
							catagory_id: jQuery('#catagory_id').val()
							},
						function(data){
							
							switch(data){
								case 'true':
								jQuery.jGrowl("Successfully Registered<br> Sub Catagory Code: "+jQuery('#sub_cat_code').val());
								window.location= "<?php echo BASE_URL?>?ManageProduct_subCatagory";
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