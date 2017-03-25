<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Purchase_PurchasePD" title="Go Dashboard">Purchase</a> <span class="divider">/</span></li>
                <li class="active">Purchase Payment</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Purchase Payment</h1> 
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner">
            
                <div class="row-fluid">
                	<div class="span12">
                      <!--  <h4 class="widgettitle nomargin shadowed">Catagory Registation</h4>-->
                        
                        
                     <?php
                     
					 require($this->Paymentfrom);
					 
					 ?>
                     
                    </div><!--span6-->
                  
                
                </div><!--row-fluid-->
          
                
            </div><!--contentinner-->
        </div>
       
        <!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
   <?php require_once(View."footer_content.php");?>
    
</div>

<?php require_once(View."footer.php");?>


