<?php echo @$msgSE;?>
<form action="<?php echo BASE_URL?>?Customer_ActionReg" method="post" enctype="multipart/form-data">

<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                         <?php 
						  $cusCode= $this->sql("SELECT MAX(`customer_code`)AS 'customer_code' FROM `customer`");
						    
						   ?>   
               	
                        <p class="animate4 bounceIn">
                        	
                            <span class="field " ><input type="hidden" name="customer_code"  id="customer_code" class="input-small"  value="<?php echo ($cusCode[0]['customer_code']+1);?>"  placeholder="Exp: CUS001" /></span>
                           <input name="sec_id" type="hidden" value="<?php echo time().session_id();?>" required />
                        </p>
                        
  <p class="animate5 bounceIn">
   	<label>Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input type="text" name="name" class="input-medium" placeholder="Name" id="name" /></span>
    </p>
                        
  <p class="animate6 bounceIn">
   	<label>E-mail</label>
      <span class="field"><input type="text" name="email" class="input-large" placeholder="Email" id="email" /></span>
    </p>
                        
                        <p class="animate7 bounceIn">
                        	<label>Contact</label>
                            <span class="field"><input type="text" name="contact" id="contact" class="input-large" placeholder="Mobile Number" /></span>
                        </p>
                        
                        <p class="animate8 bounceIn">
                        	<label>Address</label>
                            <span class="field"><input type="text" name="address" id="address" class="input-xxlarge" placeholder="Address" /></span>
                        </p>
                        <p class="animate9 bounceIn">
                        	<label>Customer Type</label>
                            <span class="field">
                            
                            <select name="cutomer_type" id="cutomer_type">
                              <option value="Dealer">Dealer</option>
                              <option value="Loyal Customer">Loyal Customer</option>
                              <option value="Regular">Regular</option>
                            </select>
                            
                            </span>
                        </p>
                        
                         <p class="animate10 bounceIn">
                        	<label>Company Name</label>
                            <span class="field">
                            
                           <input name="company_name" type="text" id="company_name" />
                            
                            </span>
                        </p>
                        
                           <p class="animate10 bounceIn">
                        	<label>Opening  Balance</label>
                            <span class="field">
                            
                           <input name="default_balance" type="text" id="default_balance" value="0" />
                            
                            </span>
                        </p>
                        
                         <p class="animate11 bounceIn">
                        	<label>Images</label>
                            <span class="field">
                            
                           <input name="images_up" type="file" />
                            
                            </span>
                        </p>
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Submit Customer Registration</button>
                           
                        </p>
                        
                   
</div><!--widgetcontent-->

</form>

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
										 

	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.bordered').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	jQuery('#customer_code,#name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	
});
	</script>