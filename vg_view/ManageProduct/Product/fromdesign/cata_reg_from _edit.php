<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_POST["cataDLL"])!="" && isset($_POST["cat_name"])!=""){
		
	
				$this->updateData("catagory",array(
				  "cat_code"=>$_POST['cat_code'],
				  "cat_name"=>$_POST['cat_name']
				  ),"id_catagory=".$this->DBH->quote($_POST['cataDLL'])."");
				}
		
		 
		
	
	echo'<script>window.location="?ManageProduct_Catagory";</script>';
exit();
	
}

?>
<form action="" method="post">
<div class="widgetcontent bordered shadowed stdform  animate2 bounceInDown">
                           
                           
               	
                        <p class="animate4 bounceIn">
                        	
                            <span class="field " ><input type="hidden" name="cat_code"  id="cat_code" class="input-small" placeholder="Exp: CAT001" value="<?php echo $cataGoryInfo[0]['cat_code'];?>" /></span>
                           <input name="cataDLL" type="hidden" value="<?php echo $cataGoryInfo[0]['id_catagory'];?>" />
                        </p>
                        
  <p class="animate5 bounceIn">
   	<label>Catagory Name <sup><strong style="color:#F00">*</strong></sup></label>
      <span class="field"><input type="text" name="cat_name" class="input-medium" placeholder="Catagory Name" id="cat_name" value="<?php echo $cataGoryInfo[0]['cat_name'];?>" /></span>
    </p>
                        
             
                     
                        
                        <p class="stdformbutton animate9 bounceIn">
                            <button id="registation" class="btn btn-primary">Submit Catagory </button>
                           
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
	jQuery('#cat_code,#cat_name').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	
});
	</script>