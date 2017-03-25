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
        	<h1>Manage Product View</h1> <span>This is a sample description for  Manage Product View page...</span>
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
  
   ?>
   
    
                <div class="row-fluid">
                
              
            
				<div class="span6">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td class="width30">Manage PD ID:</td>
                          
                          <td class="width70"><strong><?php echo $product_accounts[0]['osm_fulll_id'];?></strong></td>
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
              <col class="con0 width10" />
          </colgroup>
          <thead>
              <tr>
                  <th width="53" class="head0">PD Code</th>
                  <th width="107" class="head1 right"> Bag Size</th>
                  <th width="53" class="head1 right">Bag Unit</th>
                  <th width="53" class="head1 right">Total KG</th> 
                </tr>
          </thead>
          <tbody>
                    
            <?php 
			foreach($product_accounts as $productResult):
			 $corl=(substr($productResult['stock_kg'],0,1)=="-")?("style='color:#F00;'"):'';
			
			?>        
              <tr class="data-wrapper" <?php echo $corl;?>>
                  <td><?php $pdName= $this->sql("SELECT CONCAT('[ ',`pd_code`,' ] ',`pd_name`) as pdname FROM  `product` WHERE `product_id`=".$this->DBH->quote($productResult['pd_id'])."");
				  echo $pdName[0]['pdname'];
				  
				  ?></td>
                  <td align="center" class="right"><?php echo $productResult['bag_size']?> KG</td>
                  <td align="center" class="right"><?php echo $productResult['stock_bag']?></td>
                  <td align="center" class="right"><?php echo ($productResult['total_kg']);?></td>
                </tr>
                        
               <?php endforeach;?>         
                       
          </tbody>
    </table>
  <table class="table invoice-table">
               	<colgroup>
                    	<col class="con0 width60" />
                        <col class="con0 width20" />
                        <col class="con1 width20" />
           		  </colgroup>
                    <tbody>
                        <tr>
                        	<td class="msg-invoice">
          						<h4>Message:</h4>
          						<p>
                                 <span class="field " ><?php echo $product_accounts[0]['nots'];?></span>
                                
                              </p>
                            </td>
                        </tr>
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


