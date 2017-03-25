<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard" title="Go Dashboard">Dashboard</a> <span class="divider">/</span></li>
                <li class="active">Home</li>
            </ul>
        </div><!--breadcrumbs-->
       
       
       
       
      <div class="contentinner content-dashboard">
            	
                <?php
                
				$totalUser=$this->sql("SELECT COUNT(`id_employee`) AS 't_user' FROM `vg_employee`");
				$vg_supplier=$this->sql("SELECT COUNT(`id_supplier`) AS 'vg_supplier' FROM `vg_supplier`");
				$customer=$this->sql("SELECT COUNT(`customer_id`) AS 'customer' FROM `customer`");
				$Purchase=$this->sql("SELECT COUNT(`id`) AS 't_p_inv' FROM `supplier_accounts` WHERE `reperence_status`='Purchase'");
				$Sales=$this->sql("SELECT COUNT(`id`) AS 't_s_inv' FROM `customer_accounts` WHERE `reperence_status`='Sales'");
				
				
				?>
                
                <div class="row-fluid">
                	<div class="span11">
                    	<ul class="widgeticons row-fluid">
                        	<?php /*?><li class="one_fifth"><a href="#"><img src="img/gemicon/users.png" alt="" /><span>User: <?php echo $totalUser[0]['t_user']?></span></a></li><?php */?>
                            <li class="one_fifth"><a href="./?Supplier_AllSupplier"><img src="img/gemicon/users.png" alt="" /><span>Supplier: <?php echo $vg_supplier[0]['vg_supplier']?></span></a></li>
                            <li class="one_fifth"><a href="./?Customer_AllCustomer"><img src="img/gemicon/users.png" alt="" /><span>Customer: <?php echo $customer[0]['customer']?></span></a></li>
                            
                            <li class="one_fifth last"><a href="#"><img src="img/gemicon/purchase.png" alt="" /><span>P.INV: <?php echo $Purchase[0]['t_p_inv']?></span></a></li>
                        	<li class="one_fifth last"><a href="#"><img src="img/gemicon/sales.png" alt="" /><span>S.INV: <?php echo $Sales[0]['t_s_inv']?></span></a></li>
                        	
                        </ul>
                        
                     
                      <!--  <br />
                        
                        <h4 class="widgettitle">Report Summary</h4>
                        <div class="widgetcontent">
                        	<div id="chartplace2" style="height:300px;"></div>
                        </div><!--widgetcontent-->
                      
                        
                    </div><!--span11-->
                    
                    
                    
                </div><!--row-fluid-->
            </div>
       
        <!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
 	
  
    
    <script type="text/javascript">
jQuery(document).ready(function(){
								
		// basic chart
		var Purchase = [[0, 2], [1, 6], [2,3], [3, 8], [4, 5], [5, 13], [6, 8]];
		var Sales = [[0, 4], [1, 3], [2,3], [3, 1], [4, 8], [5, 9], [6, 18]];
		
		var PurchasePayment = [[0, 3], [1, 4], [2,5], [3, 8], [4, 9], [5, 13], [6, 8]];
		
		var SalesPayment = [[0, 5], [1, 4], [2,4], [3, 1], [4, 9], [5, 10], [6, 13]];
		
		function showTooltip(x, y, contents) {
			jQuery('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5
			}).appendTo("body").fadeIn(200);
		}
	
			
		var plot = jQuery.plot(jQuery("#chartplace2"),
			   [ { data: Purchase, label: "Purchase", color: "#fb6409"}, { data: Sales, label: "Sales", color: "#096afb"},{ data: PurchasePayment, label: "Purchase Payment", color: "#06AB9B"} ,{ data: SalesPayment, label: "Sales Payment", color: "#FFAE00"} ], {
				   series: {
					   lines: { show: true, fill: true, fillColor: { colors: [ { opacity: 0.05 }, { opacity: 0.15 } ] } },
					   points: { show: true }
				   },
				   legend: { position: 'nw'},
				   grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10 },
				   yaxis: { min: 0, max: 15 }
				 });
		
		
		


});
</script>
    
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>


