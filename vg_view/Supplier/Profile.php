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
                <li class="active">Supplier Profile</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Supplier Profile</h1> 
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner content-editprofile">
            	<h4 class="widgettitle nomargin">Supplier Profile</h4>
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Supplier Profile Photo</h4>
                            
                            <div class="profilethumb">
                            	
                               
                         <img  src="<?php echo $supplierName[0]['images_up'];?>" alt="" class="img-polaroid" style="width:160px; height:160px;" />
                            </div><!--profilethumb-->
                         
                        </div><!--span3-->
                      
                      <div class="span9 editprofileform">
                          
                            	<h4>Basic Information</h4>
                              
                                <p>
                                	<label>Name:</label>
                                    <?php echo  $supplierName[0]['name'];?>&nbsp;
                                </p>
                                <p>
                                	<label style="padding:0">Email</label>
                                    <a href="#"><?php echo  $supplierName[0]['email_'];?></a>&nbsp;
                                </p>
                                
                                
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Name:</label>
                                    
                                	<?php echo  $supplierName[0]['name'];?>&nbsp;
                                </p>
                                
                                <p>
                                	<label>Contact :</label>
                                    
                                   <?php echo  $supplierName[0]['contact_number'];?>&nbsp;
                                </p>
                               
                                <p>
                                	<label style="padding:0">Address:</label>
                                    
                                   <?php echo  $supplierName[0]['address'];?>&nbsp;
                                </p>
                                <p>
                                	<label style="padding:0">Company Name:</label>
                                    
                                   <?php echo  $supplierName[0]['company_name'];?>&nbsp;
                                </p>
                                 <p>
                                	<label style="padding:0">Opening  Balance:</label>
                                    <?php echo  $supplierName[0]['default_balance'];?>&nbsp;
                                </p>
                                 <p>
                                	<label style="padding:0">Registation Date:</label>
                                    
                                   <?php echo  $supplierName[0]['date_add'];?>&nbsp;
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


