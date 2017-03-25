<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard" title="Go Dashboard">Supplier</a> <span class="divider">/</span></li>
                <li class="active">Supplier Accounts</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Supplier Accounts Details</h1> <span>This is a sample description for  Supplier Accounts Details page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner">
            
                <div class="row-fluid">
                	<div class="span12">
                      <!--  <h4 class="widgettitle nomargin shadowed">Catagory Registation</h4>-->
                        
                      
                      
                      
<div class="contentinner">
            	
            	
 
   <div id="resultt">
   
   
   <?php 
  
   $supplier_accounts=$this->sql("SELECT * FROM  `customer_accounts` WHERE `customer_id`=".$this->DBH->quote($_GET['getID'])." ORDER BY `create_date` DESC");
   if(!$supplier_accounts){
	   exit();
	   }
  
   ?>
   
    
                <div class="row-fluid">
                
              
            
				
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           <?php $customerSWL= $this->sql("SELECT CONCAT('[ ',`customer_code`,' ] ',`name`) as customerName,default_balance FROM  `customer` WHERE `customer_id`=".$this->DBH->quote($_GET['getID'])."");
				  echo "<h3>".$customerSWL[0]['customerName']."</h3>";
				  
				  ?>
  <table width="100%" class="table table-bordered table-invoice-full">
          <colgroup>
              <col class="con0 width10" />
              <col class="con1 width33" />
              <col class="con0 width10" />
              <col class="con1 width33" />
              <col class="con0 width17" />
          </colgroup>
          <thead>
              <tr>
                  <th width="384" class="head0 right">Status</th>
                  <th width="218" class="head1 right">reference #</th>
                  <th width="164" class="head1 right">Amount</th>
                  <th width="117" class="head1 right">Payment</th>
                  <th width="117" class="head1 right">Net Blance</th>
                  <th width="85" class="head1 right">Date</th> 
                </tr>
          </thead>
          <tbody>
                    
            <?php 
			foreach($supplier_accounts as $supplierResult):
			 $corl=($supplierResult['reperence_status']=="Payment")?("style='color:#006666;'"):'';
			
			?>        
              <tr class="data-wrapper" <?php echo $corl;?>>
                  <td align="center" class="right"><?php echo $supplierResult['reperence_status'];?></td>
                  <td align="center" class="right"><?php echo $supplierResult['ref_osm_full_id'];?></td>
                  <td align="center" class="right"><?php echo $supplierResult['total_amount'];?></td>
                  <td align="center" class="right"><?php echo $supplierResult['payment_amount'];?></td>
                  <td align="center" class="right"><?php echo $customerSWL[0]['default_balance']+$supplierResult['net_blance'];?></td>
                  <td align="center" class="right"><?php echo $supplierResult['create_date']?></td>
                </tr>
                        
               <?php endforeach;?>  
                <?php 
			   if($customerSWL[0]['default_balance']!=0){
			   ?> 
                <tr class="data-wrapper">
                  <td align="center" class="right">Default Blance</td>
                  <td align="center" class="right">Defalult Amount</td>
                  <td align="center" class="right"><?php echo $customerSWL[0]['default_balance'];?></td>
                  <td align="center" class="right">------</td>
                  <td align="center" class="right"><?php echo $customerSWL[0]['default_balance'];?></td>
                  <td align="center" class="right">------</td>
                </tr>
               <?php }?>       
                       
          </tbody>
    </table>
  
          
          
    
   
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


