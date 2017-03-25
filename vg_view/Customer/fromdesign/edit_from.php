<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_POST["customer_code"])!="" && isset($_POST["name"])!=""){
		
		if($_FILES['images_up']['tmp_name']){
			
			
			$this->updateData("customer",array(
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  	"email"=>$_POST['email'],
				   "contact"=>$_POST['contact'],
				   "company_name"=>$_POST['company_name'],
				   "default_balance"=>$_POST['default_balance'],
				   "cutomer_type"=>$_POST['cutomer_type'],
				  "images_up"=>$this->UploadeIMG('images_up',"./upload_image/CUSTOMER/",$_POST['sec_id'],true)
				  ),"customer_code=".$this->DBH->quote($_POST['customer_code'])."");
			}else{
				$this->updateData("customer",array(
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  	"email"=>$_POST['email'],
				   "contact"=>$_POST['contact'],
				   "company_name"=>$_POST['company_name'],
				    "cutomer_type"=>$_POST['cutomer_type'],
				   "default_balance"=>$_POST['default_balance']
				  ),"customer_code=".$this->DBH->quote($_POST['customer_code'])."");
				}
		
		 
		
		}
	
	echo'<script>window.location="?Customer_Profile&GETiD='.$_POST['customer_code'].'";</script>';
exit();
	
}

?>


<?php echo @$msgSE;?>
<form action="" method="post" enctype="multipart/form-data">

<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                            <?php 
					   
					   if (strpos($CustomerName[0]['images_up'], 'default.png') !== false){
   						 $imgCode="./upload_image/CUSTOMER/".time().session_id().'.png';
					   }else{
						   $imgCode=$CustomerName[0]['images_up'];
						   }
						   
						   
					   ?>   
                           
               	
                        <p class="animate4 bounceIn">
                       	
                            <span class="field " ><input name="customer_code" type="hidden" class="input-small"  id="customer_code" value="<?php echo  $CustomerName[0]['customer_code'];?>" readonly="readonly" placeholder="Exp: CUS001" /></span>
                           <input name="sec_id" type="hidden" value="<?php echo $imgCode;?>" required />
                        </p>
                        
  <p class="animate5 bounceIn">
   	<label>Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input name="name" type="text" class="input-medium" id="name" value="<?php echo  $CustomerName[0]['name'];?>" placeholder="Name" /></span>
    </p>
                        
  <p class="animate6 bounceIn">
   	<label>E-mail</label>
      <span class="field"><input name="email" type="text" class="input-large" id="email" value="<?php echo  $CustomerName[0]['email'];?>" placeholder="E-mail" /></span>
    </p>
                        
    <p class="animate7 bounceIn">
   	  <label>Contact</label>
        <span class="field"><input name="contact" type="text" class="input-large" id="contact" value="<?php echo  $CustomerName[0]['contact'];?>" placeholder="Mobile Number" /></span>
      </p>
                        
    <p class="animate8 bounceIn">
   	  <label>Address</label>
        <span class="field"><input name="address" type="text" class="input-xxlarge" id="address" value="<?php echo  $CustomerName[0]['address'];?>" placeholder="Address" /></span>
      </p>
                        <p class="animate9 bounceIn">
                        	<label>Customer Type</label>
                            <span class="field">
                            
                            <select name="cutomer_type" id="cutomer_type">
                              <option value="<?php echo $CustomerName[0]['cutomer_type'];?>"><?php echo $CustomerName[0]['cutomer_type'];?></option>
                              <option value="Dealer">Dealer</option>
                              <option value="Loyal Customer">Loyal Customer</option>
                              <option value="Regular">Regular</option>
                            </select>
                            
                            </span>
                        </p>
                        
    <p class="animate10 bounceIn">
   	  <label>Company Name</label>
       <span class="field">
                            
       <input name="company_name" type="text" id="company_name" value="<?php echo  $CustomerName[0]['company_name'];?>" />
                            
       </span>
      </p>
                        
    <p class="animate10 bounceIn">
   	  <label>Opening  Balance</label>
      <span class="field">
                            
      <input name="default_balance" type="text" id="default_balance" value="<?php echo  $CustomerName[0]['default_balance'];?>" />
                            
      </span>
      </p>
                        
                         <p class="animate11 bounceIn">
                        	<label>Images</label>
                            <span class="field">
                            
                           <input name="images_up" type="file" />
                            
                            </span>
                        </p>
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Update Customer</button>
                           
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