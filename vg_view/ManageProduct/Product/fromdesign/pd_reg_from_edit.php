<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_POST["pdIDdell"])!="" && isset($_POST["pd_name"])!=""){
		
	
				$this->updateData("product",array(
				  "pd_code"=>$_POST['pd_code'],
				  "pd_name"=>$_POST['pd_name'],
				  	"catagory_id"=>$_POST['catagory_id'],
				   "sub_catagory_id"=>$_POST['sub_catagory_id'],
				   "pd_type"=>$_POST['pd_type']
				  ),"product_id=".$this->DBH->quote($_POST['pdIDdell'])."");
				}
		
		 
		
	
	echo'<script>window.location="?ManageProduct_Product";</script>';
exit();
	
}

?>


<form action="" method="post">

<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	
                    <span class="field " ><input type="hidden" name="pd_code"  id="pd_code" class="input-small" placeholder="Exp: PD001" value="<?php echo $pdINFO[0]['pd_code'];?>" /></span>
                           <input name="pdIDdell" type="hidden" value="<?php echo $pdINFO[0]['product_id'];?>" />
                        </p>
  <p class="animate5 bounceIn">
   	<label> Name <sup><strong style="color:#F00">*</strong></sup></label>
    <span class="field"><input name="pd_name" type="text" class="input-medium" id="pd_name" value="<?php echo $pdINFO[0]['pd_name'];?>" placeholder="Name" /></span>
    </p>
    
 
                        
  <p >
   	<label>Catagory </label>
       <span class="formwrapper">
                            	<select name="catagory_id" class="chzn-select"  id="catagory_id" style="width:350px;"  data-placeholder="Choose a Catagory...">
                                  <option value="0"></option> 
                                  <option value="<?php  echo ($pdINFO[0]['catagory_id']);?>">Please Select Catagory</option>
                                  
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
                                  <option value="<?php  echo ($pdINFO[0]['sub_catagory_id']);?>">Please Select Catagory</option>
                                  
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
                                 
                                 <option value="<?php  echo ($pdINFO[0]['pd_type']);?>"><?php  echo ($pdINFO[0]['pd_type']);?></option>
                                  <option value="Finish Good Product">Finish Good Product</option> 
                                  <option value="Raw material product">Raw Material Product</option>
                               
                                </select>
    </span>
  </p>
                        
                        
                        
                        <p class="stdformbutton animate9 bounceIn" align="right">
                            <button id="registation" class="btn btn-primary">Submit Product Registration</button>
                           
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
	jQuery('#pd_code,#pd_name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	
});
	</script>