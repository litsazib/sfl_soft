<?php echo @$msgSE;?>
<form action="<?php echo BASE_URL?>?Supplier_ActionReg" method="post" enctype="multipart/form-data">
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           <?php 
						  $supcode= $this->sql("SELECT MAX(`supplier_code`)AS 'supplier_code' FROM `vg_supplier`");
						    
						   ?>
               	
<p class="animate4 bounceIn">
                        	
        <span class="field " ><input name="supplier_code" type="hidden" class="input-small"  id="supplier_code" value="<?php echo ($supcode[0]['supplier_code']+1);?>" placeholder="Exp: SUP001" required/></span></p>
                        <input name="sec_id" type="hidden" value="<?php echo time().session_id();?>" required />
  <p class="animate5 bounceIn">
   	<label>Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input type="text" name="name" class="input-medium" placeholder="Name" id="name" required /></span>
    </p>
                        
  <p class="animate6 bounceIn">
   	<label>E-mail</label>
      <span class="field"><input type="text" name="email" class="input-large" placeholder="Email" id="email" /></span>
    </p>
                        
                        <p class="animate7 bounceIn">
                        	<label>Contact</label>
                            <span class="field"><input type="text" name="contact" id="contact" class="input-large" placeholder="Mobile Number" required /></span>
                        </p>
                        
                        <p class="animate8 bounceIn">
                        	<label>Address</label>
                            <span class="field"><input type="text" name="address" id="address" class="input-xxlarge" placeholder="Address" /></span>
                        </p>
                        <p class="animate9 bounceIn">
                        	<label>Company Name</label>
                            <span class="field">
                            
                           <input name="company_name" type="text" id="company_name" />
                            
                            </span>
                        </p>
                        
                        <p class="animate9 bounceIn">
                        	<label>Opening  Balance</label>
                            <span class="field">
                            
                           <input name="default_balance" type="text" id="default_balance" value="0" />
                            
                            </span>
                        </p>
                        
                         <p class="animate10 bounceIn">
                        	<label>Images</label>
                            <span class="field">
                            
                           <input name="images_up"  type="file" id="images_up" />
                            
                            </span>
                        </p>
                        
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Submit  Registration</button>
                           
                        </p>
                        
                   
</div>

</form><!--widgetcontent-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
										 

	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.bordered').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	jQuery('#supplier_code,#name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	
});
	</script>