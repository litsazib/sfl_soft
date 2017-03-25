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
                <li class="active">Purchase Product View</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Purchase Product View</h1> <span>This is a sample description for  Purchase Product View page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner">
            
                <div class="row-fluid">
                	<div class="span12">
                      <!--  <h4 class="widgettitle nomargin shadowed">Catagory Registation</h4>-->
                        
                      
                      
                      
<div class="contentinner">
            	
            	
 
   <div id="resultt">
   
   
   <?php 
  
   $product_accounts=$this->sql("SELECT * FROM  `product_accounts` WHERE `osm_fulll_id`=".$this->DBH->quote($_GET['getID'])."");
   if(!$product_accounts){
	   exit();
	   }
	   $orderInfo=$this->sql("SELECT * FROM `product_osm_accounts` WHERE `osm_full_id`=".$this->DBH->quote($_GET['getID'])."");
  
   ?>
   
    
                <div class="row-fluid">
                
              
            
				<div class="span6">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td class="width30">Purchase PD ID:</td>
                          
                          <td class="width70"><strong><?php echo $product_accounts[0]['osm_fulll_id'];?></strong></td>
                      </tr>
                      <tr>
                        <td class="width30">Truck Number</td>
                        <td class="width70"><?php echo $orderInfo[0]['truck_no'];?></td>
                      </tr>
                      <tr>
                        <td class="width30">Supplier Name</td>
                        <td class="width70"><?php 
						 $supplierName= $this->sql("SELECT CONCAT('[ ',`supplier_code`,' ] ',`name`) as supplierName FROM  `vg_supplier` WHERE `id_supplier`=".$this->DBH->quote($orderInfo[0]['customer_supplier_id'])."");
						
						echo $supplierName[0]['supplierName'];?></td>
                      </tr>
                      <tr>
                        <td>Issue Date:</td>
                        <td><strong><?php echo $product_accounts[0]['create_date'];?></strong></td>
                    </tr>
                  </table>
                </div><!--span6-->
                
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           
  <table width="100%" class="table table-bordered table-invoice-full">
          <colgroup>
              <col class="con0 width45" />
              <col class="con1 width10" />
              <col class="con0 width10" />
              <col class="con1 width10" />
              
          </colgroup>
          <thead>
              <tr>
                  <th width="74" class="head0">PD Code</th>
                  <th width="268" class="head1 right">Unit Bag KG</th>
                  <th width="96" class="head1 right">Total KG</th>
                  <th width="91" class="head1 right">Unit Price</th>
                  <th width="93" class="head1 right">Total Amount</th> 
                </tr>
          </thead>
          <tbody>
                    
            <?php
			$tKg=0;
			$tBag=0;
			$totalKGSUB_T=0;
			$tSub=0; 
			foreach($product_accounts as $productResult):
			 $corl=(substr($productResult['stock_kg'],0,1)=="-")?("style='color:#F00;'"):'';
			
			?>        
              <tr class="data-wrapper" <?php echo $corl;?>>
                  <td><?php $pdName= $this->sql("SELECT CONCAT('[ ',`pd_code`,' ] ',`pd_name`) as pdname FROM  `product` WHERE `product_id`=".$this->DBH->quote($productResult['pd_id'])."");
				  echo $pdName[0]['pdname'];
				  
				  ?></td>
                  <td align="center" class="right"><?php echo $productResult['stock_bag']." => ".$productResult['bag_size']." KG"?></td>
                  <td align="center" class="right"><?php echo $totalKGSUB=($productResult['stock_kg']+($productResult['bag_size']*$productResult['stock_bag']))?></td>
                  <td align="center" class="right"><?php echo $productResult['auto_sales_pursess_unit_price']?></td>
                  <td align="center" class="right"><?php echo $totalAmountB=($totalKGSUB*$productResult['auto_sales_pursess_unit_price']);?></td>
                </tr>
             
                        
               <?php
			   
			   $tKg+=$productResult['stock_kg'];
			   $tBag+=$productResult['stock_bag'];
			   $totalKGSUB_T+=$totalKGSUB;
			   $tSub+=$totalAmountB;
			   endforeach;?>   
               
                <tr class="data-wrapper" <?php echo $corl;?>>
                <td align="right"><strong>Total</strong></td>
                <td align="center" class="right"><strong><?php echo $tBag;?></strong></td>
                <td align="center" class="right"><strong><?php echo $totalKGSUB_T;?></strong></td>
                <td align="center" class="right"><strong>&macr;</strong></td>
                <td align="center" class="right"><?php echo $tSub;?></td>
                </tr>      
                       
          </tbody>
    </table>
  <table width="100%" class="table invoice-table">
               	<colgroup>
                    	<col class="con0 width60" />
                        <col class="con0 width20" />
                        <col class="con1 width20" />
           		  </colgroup>
                    <tbody>
                        <tr>
                        	<td width="92" class="msg-invoice">
          						<h4>Message:</h4>
          						<p>
                                 <span class="field " ><?php echo $product_accounts[0]['nots'];?></span>
                                
                              </p>
                            </td>
                        	<td width="331" class="msg-invoice"><table width="100%" align="right" class="table table-bordered table-invoice" >
                        	  <tr style="color:#060;">
                        	    <td width="343" ><strong>Truck Fee</strong></td>
                        	    <td width="489" ><span class="width70"><?php echo $orderInfo[0]['truck_rate'];?></span></td>
                      	    </tr>
                        	  <tr style="color:#060;">
                        	    <td ><strong>Discount</strong></td>
                        	    <td ><span class="width70"><?php echo $orderInfo[0]['discount_amount'];?></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td><strong>Total</strong></td>
                        	    <td><span class="width70"><?php echo $orderInfo[0]['final_amount'];?></span></td>
                      	    </tr>
                        	  <tr style="color:#060;">
                        	    <td><strong>Payment</strong></td>
                        	    <td><span class="width70"><?php echo $orderInfo[0]['payment_amount'];?></span></td>
                      	    </tr>
                        	  <tr>
                        	    <td><strong>Dues</strong></td>
                        	    <td><span class="width70"><?php echo ($orderInfo[0]['final_amount']-$orderInfo[0]['payment_amount']);?></span></td>
                      	    </tr>
                      	  </table></td>
                        </tr>
                    </tbody>
          </table>
          
           <a class="btn" href="<?php echo BASE_URL?>?SingelReport_PurchaseINVPDF&getID=<?php echo $product_accounts[0]['osm_fulll_id'];?>" target="_blank">Print</a>
    
   
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


