<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_POST["supplier_code"])!="" && isset($_POST["name"])!=""){
		
		if($_FILES['images_up']['tmp_name']){
			
			
			$this->updateData("vg_supplier",array(
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  	"email_"=>$_POST['email'],
				   "contact_number"=>$_POST['contact'],
				   "company_name"=>$_POST['company_name'],
				   "default_balance"=>$_POST['default_balance'],
				  "images_up"=>$this->UploadeIMG('images_up',"./upload_image/SUPPLIER/",$_POST['sec_id'],true)
				  ),"supplier_code=".$this->DBH->quote($_POST['supplier_code'])."");
			}else{
				$this->updateData("vg_supplier",array(
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  	"email_"=>$_POST['email'],
				   "contact_number"=>$_POST['contact'],
				   "company_name"=>$_POST['company_name'],
				   "default_balance"=>$_POST['default_balance']
				  ),"supplier_code=".$this->DBH->quote($_POST['supplier_code'])."");
				}
		
		 
		
		}
	
	echo'<script>window.location="?Supplier_Profile&GETiD='.$_POST['supplier_code'].'";</script>';
exit();
	
}

?>


<form action="" method="post" enctype="multipart/form-data">
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                       <?php 
					   
					   if (strpos($supplierName[0]['images_up'], 'default.png') !== false){
   						 $imgCode="./upload_image/SUPPLIER/".time().session_id().'.png';
					   }else{
						   $imgCode=$supplierName[0]['images_up'];
						   }
						   
						   
					   ?>    
               	
                        <p class="animate4 bounceIn">
                        
                            <span class="field " ><input name="supplier_code" type="hidden" class="input-small"  id="supplier_code" value="<?php echo $supplierName[0]['supplier_code'];?>" readonly="readonly" placeholder="Exp: SUP001" required/></span></p>
                        <input name="sec_id" type="hidden" value="<?php echo $imgCode;?>" required />
  <p class="animate5 bounceIn">
   	<label>Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input name="name" type="text" class="input-medium" id="name" value="<?php echo $supplierName[0]['name'];?>" placeholder="Name" required /></span>
    </p>
                        
  <p class="animate6 bounceIn">
   	<label>E-mail</label>
      <span class="field"><input name="email" type="text" class="input-large" id="email" value="<?php echo $supplierName[0]['email_'];?>" placeholder="E-Mail" /></span>
    </p>
                        
                        <p class="animate7 bounceIn">
                        	<label>Contact</label>
                            <span class="field"><input name="contact" type="text" class="input-large" id="contact" value="<?php echo $supplierName[0]['contact_number'];?>" placeholder="Mobile Number" required /></span>
                        </p>
                        
                        <p class="animate8 bounceIn">
                        	<label>Address</label>
                            <span class="field"><input name="address" type="text" class="input-xxlarge" id="address" value="<?php echo $supplierName[0]['address'];?>" placeholder="Address" /></span>
                        </p>
                        <p class="animate9 bounceIn">
                        	<label>Company Name</label>
                            <span class="field">
                            
                           <input name="company_name" type="text" id="company_name" value="<?php echo $supplierName[0]['company_name'];?>" />
                            
                            </span>
                        </p>
                        
                         <p class="animate9 bounceIn">
                        	<label>Opening  Balance</label>
                            <span class="field">
                            
                           <input name="default_balance" type="text" id="default_balance" value="<?php echo $supplierName[0]['default_balance'];?>" />
                            
                            </span>
                        </p>
                        
                         <p class="animate10 bounceIn">
                        	<label>Images</label>
                            <span class="field">
                            
                           <input name="images_up"  type="file" id="images_up" />
                            
                            </span>
                        </p>
                        
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Submit  Update</button>
                           
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