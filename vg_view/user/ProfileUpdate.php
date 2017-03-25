<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");
	
	
	?>

   
    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	
	if(isset($_SESSION['LoginStatus'][0]['id_employee'])!="" && isset($_POST["email"])!="" && isset($_POST["passwd"])!="") {
		
		if($_FILES['images_up']['tmp_name']){
			
			
			$this->updateData("vg_employee",array(
				  "lastname"=>$_POST['lastname'],
				  "firstname"=>$_POST['firstname'],
				  	"email"=>$_POST['email'],
				   "passwd"=>$_POST['passwd'],
				  "images_up"=>$this->UploadeIMG('images_up',"./upload_image/EMPLOYEE/",$_POST['sec_id'],true)
				  ),"id_employee=".$this->DBH->quote($_SESSION['LoginStatus'][0]['id_employee'])."");
			}else{
				$this->updateData("vg_employee",array(
				  "lastname"=>$_POST['lastname'],
				  "firstname"=>$_POST['firstname'],
				  	"email"=>$_POST['email'],
				   "passwd"=>$_POST['passwd']
				  ),"id_employee=".$this->DBH->quote($_SESSION['LoginStatus'][0]['id_employee'])."");
				}
		
		 
		
		}
	
	echo'<script>window.location="?User_Profile";</script>';
exit();
	
}

?>
   
        
        
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard">Home</a> <span class="divider">/</span></li>
                <li class="active">User Profile</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>User Profile</h1> <span>This is a sample description for  profile page...</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-editprofile">
            	<h4 class="widgettitle nomargin">User Profile</h4>
                
                 
                <form action="" method="post" enctype="multipart/form-data">
                
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<!--span3-->
                      
                      <div class="span9 editprofileform">
                          
                          <?php
                          $userProfile=$this->sql("SELECT * FROM `vg_employee` WHERE `id_employee`='".$_SESSION['LoginStatus'][0]['id_employee']."'");
						  
						  ?>
                          
                          <?php 
					   
					   if (strpos($userProfile[0]['images_up'], 'default.png') !== false){
   						 $imgCode="./upload_image/EMPLOYEE/".time().session_id().'.png';
					   }else{
						   $imgCode=$userProfile[0]['images_up'];
						   }
						   
						   
					   ?> 
                            <input name="sec_id" type="hidden" value="<?php echo $imgCode;?>" required />
                            	<h4>Login Information</h4>
                              
                               <p>
                                	<label>E-mail/Login ID:</label>
                                	<input name="email" type="text" value="<?php echo $userProfile[0]['email'];?>" />
                                </p>
                                
                                
                                <p>
                                	<label>Password:</label>
                                	<input name="passwd" type="text" value="<?php echo $userProfile[0]['passwd'];?>" />
                                </p>
                                
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                    <input name="firstname" type="text" value="<?php echo $userProfile[0]['firstname'];?>" />
                                	 
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                   <input name="lastname" type="text" value="<?php echo $userProfile[0]['lastname'];?>" />
                                </p>
                              
                                  <p class="animate3 bounceIn">
                        	<label>Images</label>
                            <span class="field">
                            
                           <input name="images_up" type="file" />
                            
                            </span>
                        </p>
                               <p class="stdformbutton bounceIn">
                            <button id="registation" class="btn btn-primary">Update Profile</button>
                           
                        </p>
                        
                        </div><!--span9-->
                      
                      
                      
                      
                    </div><!--row-fluid-->
                </div>
                
                </form>
                
                <!--widgetcontent-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
   <?php require_once(View."footer_content.php");?>
    
</div>

<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>
<?php require_once(View."footer.php");?>


