<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");
	
	
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
            	<h4 class="widgettitle nomargin">User Profile <a class="btn" href="?User_ProfileUpdate">Update Profile</a></h4>
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                           <?php
                            $userProfile=$this->sql("SELECT * FROM `vg_employee` WHERE `id_employee`='".$_SESSION['LoginStatus'][0]['id_employee']."'");
						   ?> 	
                               
                         <img  src="<?php if($userProfile[0]['images_up']){echo $userProfile[0]['images_up'];}else{echo "./upload_image/EMPLOYEE/default.png";}?>" alt="" class="img-polaroid" style="width:160px; height:160px;" />
                            </div><!--profilethumb-->
                         
                        </div><!--span3-->
                      
                      <div class="span9 editprofileform">
                          
                            	<h4>Login Information</h4>
                                <p>
                                	<label>Username:</label>
                                	<?php echo $_SESSION['LoginStatus'][0]['firstname']." ".$_SESSION['LoginStatus'][0]['lastname'];?>
                                </p>
                                <p>
                                	<label>Email:</label>
                                    <?php echo $_SESSION['LoginStatus'][0]['email'];?>
                                </p>
                                <p>
                                	<label style="padding:0">Password</label>
                                    <a href="?User_ProfileUpdate">Change Password?</a>
                                </p>
                                
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                	 <?php echo $_SESSION['LoginStatus'][0]['firstname'];?>
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                    <?php echo $_SESSION['LoginStatus'][0]['lastname'];?>
                                </p>
                                <p>
                                	<label>Location:</label>
                                   <?php echo $_SESSION['LoginStatus'][0]['joindate'];?>
                                </p>
                               
                        
                        </div><!--span9-->
                      
                      
                      
                      
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
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


