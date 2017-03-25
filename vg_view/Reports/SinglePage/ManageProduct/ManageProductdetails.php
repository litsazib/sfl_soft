<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?ManageProduct_Product" title="Go Dashboard">Product</a> <span class="divider">/</span></li>
                <li class="active">Manage Product View</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Manage Product Details</h1> <span>This is a sample description for  Manage Product Details page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner">
            
                <div class="row-fluid">
                	<div class="span12">
                      <!--  <h4 class="widgettitle nomargin shadowed">Catagory Registation</h4>-->
                        
                      
                      
                      
<div class="contentinner">
            	
            	
 
   <div id="resultt">
   
   
   <?php 
 
   $product_accounts=$this->sql("SELECT * FROM  `product_accounts` WHERE `pd_id`=".$this->DBH->quote($_GET['getID'])." ORDER BY `create_date` DESC");
   if(!$product_accounts){
	   exit();
	   }
  
   ?>
   
    
                <div class="row-fluid">
                
              
            
				
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           <?php $pdName= $this->sql("SELECT CONCAT('[ ',`pd_code`,' ] ',`pd_name`) as pdname FROM  `product` WHERE `product_id`=".$this->DBH->quote($_GET['getID'])."");
				  echo "<h3>".$pdName[0]['pdname']."</h3>";
				  
				  ?>
  <table width="100%" class="table table-bordered table-invoice-full">
          <colgroup>
              <col class="con0 width10" />
              <col class="con1 width10" />
              <col class="con0 width10" />
              <col class="con1 width10" />
              <col class="con0 width17" />
          </colgroup>
          <thead>
              <tr>
                  <th width="382" class="head0 right">Date</th>
                  <th width="143" class="head1 right"> Bag Size</th>
                  <th width="81" class="head1 right">Bag Unit</th>
                  <th width="72" class="head1 right">Total KG</th>
                  <th width="116" class="head1 right">Nots</th>
                  <th width="88" class="head1 right">Status</th> 
                </tr>
          </thead>
          <tbody>
                    
            <?php 
			foreach($product_accounts as $productResult):
			 $corl=(substr($productResult['stock_kg'],0,1)=="-")?("style='color:#009900;'"):'';
			
			?>        
              <tr class="data-wrapper" <?php echo $corl;?>>
                  <td align="center" class="right"><?php echo $productResult['create_date']?></td>
                  <td align="center" class="right"><?php echo $productResult['bag_size']?> KG</td>
                  <td align="center" class="right"><?php echo $productResult['stock_bag']?></td>
                  <td align="center" class="right"><?php echo ($productResult['total_kg']);?></td>
                  <td align="center" class="right"><?php echo $productResult['nots'];?></td>
                  <td align="center" class="right"><?php 
				  
				  if($productResult['order_sales_manage_status']=="CustomManage")
				  {echo "Manually manage Product";}
				  elseif($productResult['order_sales_manage_status']=="SalesManage"){
					  
					  $CustomerName= $this->sql("SELECT CONCAT('[ ',`customer_code`,' ] ',`name`) as CustomerName FROM  `customer` WHERE `customer_id`=".$this->DBH->quote($productResult['supplier_customerid'])."");
					  
					  
					   echo "Sales by Customer =>".$CustomerName[0]['CustomerName'];
					  }else{
						  
						  $supplierName= $this->sql("SELECT CONCAT('[ ',`supplier_code`,' ] ',`name`) as supplierName FROM  `vg_supplier` WHERE `id_supplier`=".$this->DBH->quote($productResult['supplier_customerid'])."");
						  echo "Purchase by Supplier =>".$supplierName[0]['supplierName'];
						  }
				  
				  
				  ?></td>
                </tr>
                        
               <?php endforeach;?>         
                       
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


