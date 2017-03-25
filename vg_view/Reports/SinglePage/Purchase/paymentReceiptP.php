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
                <li class="active">Purchase Payment Receipt View</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Purchase Payment Receipt View</h1> <span>This is a sample description for Purchase Payment Receipt page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner">
            
                <div class="row-fluid">
                	<div class="span12">
                      <!--  <h4 class="widgettitle nomargin shadowed">Catagory Registation</h4>-->
                        
                      
                      
                      
<div class="contentinner">
            	
            	
 
   <div id="resultt">
   
   
   <?php 
  
   $supplier_accounts=$this->sql("SELECT * FROM `supplier_accounts` WHERE `recipt_code`=".$this->DBH->quote($_GET['getID'])."");
   if(!$supplier_accounts){
	   exit();
	   }
   ?>
   
    
                <div class="row-fluid">
                
              
            
				<div class="span11">
                
               	  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td width="91" class="width30">Issue Date:</td>
                        
                          <td width="305" class="width70"><strong><?php echo $supplier_accounts[0]['create_date'];?></strong></td>
                      </tr>
                      <tr>
                        <td class="width30">Supplier Name</td>
                        <td width="305" class="width70">
                        
                         <?php
                   $vg_supplier=$this->sql("SELECT CONCAT('[ ',`supplier_code`,' ] ',`name`) AS 'name' FROM `vg_supplier` where id_supplier=".$this->DBH->quote($supplier_accounts[0]['supplier_id'])."");
							echo $vg_supplier[0]['name'];	
						?>
                        
                        </td>
                      </tr>
                      <tr>
                        <td class="width30">Reference #</td>
                        <td class="width70"><?php echo $supplier_accounts[0]['ref_osm_full_id'];?></td>
                      </tr>
                      <tr style="color:#093;"> 
                        <td>Pay Amounts</td>
                        <td><span class="width70"><?php echo $supplier_accounts[0]['payment_amount'];?></span></td>
                    </tr>
                      <tr style="color:#093;">
                        <td>Paying by *:</td>
                        <td><span class="width70"><?php 
						
						if($supplier_accounts[0]['accounts_id']==3){
							echo "Cheque => ".$supplier_accounts[0]['bank_name']." => ".$supplier_accounts[0]['cheque_number'];
							}else{
								$acName=$this->sql("SELECT `accounts_name` FROM `accounts_name` WHERE `acc_id`=".$this->DBH->quote($supplier_accounts[0]['accounts_id'])."");
								echo $acName[0]['accounts_name'];
								}
						?></span>
                             
                                </td>
                      </tr>
                      <tr>
                        <td>Re.Mark</td>
                        <td><span class="width70"><?php echo $supplier_accounts[0]['remarks'];?></span></td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                  </table>
                  
                </div><!--span6-->
                
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           
  
  
          
           
          <a target="new" href="<?php echo BASE_URL?>?SingelReport_paymentReciptPPDF&getID=<?php echo $_GET['getID']; ?>"><strong>Print</strong></a> 
    
   
    </div><!--Result-->
               
                
 </div><!--contentinner-->
                      
                      
                      
                      
                      
                        
                     
                     
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


