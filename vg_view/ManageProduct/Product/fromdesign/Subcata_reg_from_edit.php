<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_POST["ScataDLL"])!="" && isset($_POST["sub_cat_name"])!=""){
		
	
				$this->updateData("catagory_sub",array(
				  "sub_cat_code"=>$_POST['sub_cat_code'],
				  "sub_cat_name"=>$_POST['sub_cat_name'],
				   "catagory_id"=>$_POST['catagory_id']
				  ),"id_sub_catagory=".$this->DBH->quote($_POST['ScataDLL'])."");
				}
		
		 
		
	
	echo'<script>window.location="?ManageProduct_subCatagory";</script>';
exit();
	
}

?>
<form action="" method="post">
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	
                            <span class="field " ><input type="hidden" name="sub_cat_code"  id="sub_cat_code" class="input-small" placeholder="Exp: SUBCATA001" value="<?php echo $ScataGoryInfo[0]['sub_cat_code'];?>" /></span>
                            <input  name="ScataDLL" type="hidden" value="<?php echo $ScataGoryInfo[0]['id_sub_catagory'];?>" />
                        </p>
                        <p class="animate5 bounceIn">
   	<label>Sub Catagory Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input name="sub_cat_name" type="text" class="input-medium" id="sub_cat_name" value="<?php echo $ScataGoryInfo[0]['sub_cat_name'];?>" placeholder="Name" /></span>
    </p>
    
 
                        
  <p class="animate6 bounceIn">
   	<label>Catagory Name</label>
       <span class="formwrapper">
                            	<select name="catagory_id" class="chzn-select" id="catagory_id" style="width:350px" tabindex="2" data-placeholder="Choose a Catagory...">
                                  <option value="0"></option> 
                                  <option value="<?php echo $ScataGoryInfo[0]['catagory_id'];?>">Please Select Catagory</option>
                                  
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
</form>
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
	
	
});
	</script>