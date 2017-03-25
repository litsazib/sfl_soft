
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	<label>Catagory Code <sup><strong style="color:#F00">*</strong></sup></label>
                            <span class="field " ><input type="text" name="cat_code"  id="cat_code" class="input-small" placeholder="Exp: CAT001" /></span>
                           
                        </p>
                        
  <p class="animate5 bounceIn">
   	<label>Catagory Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input type="text" name="cat_name" class="input-medium" placeholder="Catagory Name" id="cat_name" /></span>
    </p>
                        
             
                     
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Submit Catagory Registration</button>
                           
                        </p>
                        
                   
</div><!--widgetcontent-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
										 

	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.bordered').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	jQuery('#cat_code,#cat_name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	jQuery('#registation').click(function(){
		if(!jQuery.browser.msie) {
					if(jQuery('#cat_code').val() == '' || jQuery('#cat_name').val() == '') {
						if(jQuery('#cat_code').val() == '') jQuery('#cat_code').addClass('error'); else jQuery('#cat_code').removeClass('error');
						if(jQuery('#cat_name').val() == '') jQuery('#cat_name').addClass('error'); else jQuery('#cat_name').removeClass('error');
						jQuery('.widgetcontent').addClass('animate0 wobble').bind(anievent,function(){
							jQuery(this).removeClass('animate0 wobble');
						});
					}else{
											
						
						jQuery.post("<?php echo BASE_URL?>?ManageProduct_cataRegistration",{
							CatagoryCode: jQuery('#cat_code').val(),
							CatagoryNme: jQuery('#cat_name').val()
							
							},
						function(data){
							
							switch(data){
								case 'true':
								jQuery.jGrowl("Successfully Registered<br> Catagory Code: "+jQuery('#cat_code').val());
								window.location= "<?php echo BASE_URL?>?ManageProduct_Catagory";
								break;
								case 'false':
								jQuery.jGrowl("Please Try Again");
								break;
								case 'current':
								jQuery.jGrowl("Catagory already exists");
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