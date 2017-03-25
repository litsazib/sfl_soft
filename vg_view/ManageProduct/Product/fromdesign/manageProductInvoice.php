

<div class="contentinner">
            	
            	
 <div id="result">
   
    
                <div class="row-fluid">
                
              
            
				<div class="span6">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td class="width30">Manage PD ID:</td>
                          <?php
                          $invid=$this->sql("SELECT IFNULL(MAX(`osm_id`),'0') AS 'invid' FROM `product_accounts` where order_sales_manage_status='CustomManage'");
						  $inID=$invid[0]['invid']+1;
						  $str = ($inID < 10000000) ? 0 . $inID : $inID;
						  $osm_CustomCode="Custom-".date("mYd");
						  ?>
                          <td class="width70"><strong><?php echo $refull=$osm_CustomCode.$str;?>
                            <input type="hidden" name="osm_content_code" id="osm_content_code" value="<?php echo $osm_CustomCode;?>" />
                            <input type="hidden" name="osm_id" id="osm_id" value="<?php echo $str;?>" />
                            <input type="hidden" name="osmIDFULLL" id="osmIDFULLL" value="<?php echo $refull;?>" />
                          </strong></td>
                      </tr>
                      <tr>
                        <td>Issue Date:</td>
                        <td><strong><?php echo date('M-D-Y');?></strong></td>
                    </tr>
                  </table>
                </div><!--span6-->
                
            </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           
  <table width="100%" class="table table-bordered table-invoice-full">
          <colgroup>
              <col class="con0 width9" />
              <col class="con1 width45" />
              <col class="con0 width10" />
              <col class="con1 width10" />
              <col class="con0 width16" />
          </colgroup>
          <thead>
              <tr>
                  <th width="53" class="head0">&nbsp;</th>
                  <th width="53" class="head0">PD Code</th>
                  <th width="107" class="head1 right">Bag Size KG</th>
                  <th width="53" class="head1 right">Unit Bag</th>
                  <th width="53" class="head1 right">Total KG</th> 
                  
                  <th width="162" class="head1 right">Manage Status</th>
              </tr>
          </thead>
          <tbody>
                    
                    
              <tr class="data-wrapper">
                  <td ><button id="delauto" type="button" class="btn delete-new-data" ><i class="icon-trash"> </i> </button></td>
                <td><select class="form-control required chosen-select-width name pdid" name="pd_id[]" id="pd_id" aria-required="true">
                  <option value="0">Please Select Product</option>
                  <?php
                                $res=@$this->sql("SELECT `product_id`,CONCAT('[ ',`pd_code`,' ] ',`pd_name`) AS 'pd_name' FROM `product`");
								if($res){
								  foreach($res as $value){
									  ?>
                  <option value="<?php  echo ($value['product_id']);?>">
                    <?php  echo ($value['pd_name']);?>
                  </option>
                  <?php
								  }}
								  ?>
                </select></td>
                  <td align="center" class="right">
                  <input name="kg[]" type="hidden" class="input-small KG"  id="kg[]" placeholder="Unit KG" value="0" />
                  
                  <input  name="bagsize[]" type="number" class="bagSize" id="bagsize[]" style="width:100px;" value="0" placeholder="KG"/>
                  
                  
                 <?php /*?> <select name="bagsize[]" class="bagSize" style="width:100px;" id="bagsize[]">
                  
                  <option value="0">Bag Size</option>
                    <?php 
					$uom=$this->sql("SELECT `szie_unit` FROM `uom_bag_size` ORDER BY `szie_unit` DESC");
					foreach($uom as $uom):
					?>
                    <option value="<?php echo $uom['szie_unit'];?>"><?php echo $uom['szie_unit'];?> KG</option>
                    <?php endforeach;?>
                    
                  </select><?php */?></td>
                  <td align="center" class="right"><span class="field ">
                    <input name="bagUnitNumber[]" type="number" class="input-small bagUnitNumber"  id="bagUnitNumber[]" placeholder="Unit Bag" value="0" />
                  </span></td>
                  <td align="center" class="right"> <input readonly="readonly" name="totalKGUNIT[]" type="number" class="input-small totalKGUNIT"  id="totalKGUNIT[]" placeholder="Unit Bag" value="0" /></td>
                  <td align="center" class="right">
                           
                    <select name="manageStatus[]" class="MangeStatus" style="width:100px;" id="manageStatus[]">
                      <option value="1">Stock In</option>
                      <option value="0">Stock Out</option>
                    </select>
                      
                </td>
              </tr>
                        
                        
                       
          </tbody>
    </table>
                         
             <button type="button" class="btn add-new-data"><i class="icon-plus"> </i> Add More Line</button>
                          
                  
                                
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
                                 <span class="field " ><input type="text" name="Message"  id="Message" class="input-xlarge" placeholder="Message" required="required" /></span>
                                
                              </p>
                            </td>
                            <td class="right">
                            <div class="amountdue">
          <!--	<h1><span>Amount Due:</span> $6,550.00</h1> <br />-->
           <input type="submit" name="actionPage" class="btn btn-primary btn-large" id="manageCustomProduct" value="Custome Manage Product" />
          </div>
                            <!--	<strong>Subtotal</strong> <br />
                                <strong>Tax (5%)</strong> <br />
                                <strong>Discount</strong>-->
                            </td>
                            <td class="right"><!--<strong>$6,000 <br />$600 <br />$50</strong>--></td>
                        </tr>
                    </tbody>
          </table>
          
          
    
   </div><!--Result-->
    
               
                
 </div><!--contentinner-->
  
<script type="text/javascript">
jQuery.noConflict();



				 jQuery(function($){ 
				 
				 
				
				 
				 
	var clone = $("table tr.data-wrapper:first").clone(true);
	$('#delauto').hide();
    $('select.pdid').chosen({width: "350px"});
	$('body').on('click', '.add-new-data', function() {
		var ParentRow = $("table tr.data-wrapper").last();
		clone.clone(true).insertAfter(ParentRow);
		$('tr.data-wrapper:last select.pdid').chosen({width: "350px"});
	});
	
	
	$('body').on("keyup", ".bagSize", function() {
					var BagSize=$(this).parents('tr').find('.bagSize').val();
					var bagUnitNumber=$(this).parents('tr').find('.bagUnitNumber').val();
					$(this).parents('tr').find('.totalKGUNIT').val((BagSize*bagUnitNumber));
    					});
						
						$('body').on("keyup", ".bagUnitNumber", function() {
					var BagSize=$(this).parents('tr').find('.bagSize').val();
					var bagUnitNumber=$(this).parents('tr').find('.bagUnitNumber').val();
					$(this).parents('tr').find('.totalKGUNIT').val((BagSize*bagUnitNumber));
    					});
	
	
	$('body').on('click', '.delete-new-data', function() {
		
		$(this).parents('tr').remove();
		
	});
	
	
	$('body').on('click', '#manageCustomProduct', function() {
		
			
		
		if($('#Message').val() == '' || $('#osm_content_code').val() == ''){
			jAlert('Please Type Your Message for your Custome Product Manage!', 'Alert');
			}else{
				     
					
					var Product = [];
					$.each($('.pdid'), function() {
								Product.push($(this).val());
							});
							
							var KG = [];
					$.each($('.KG'), function() {
								KG.push($(this).val());
							});
				
				var bagSize = [];
					$.each($('.bagSize'), function() {
								bagSize.push($(this).val());
							});
							var bagUnitNumber = [];
					$.each($('.bagUnitNumber'), function() {
								bagUnitNumber.push($(this).val());
							});
							
							var totalKGUNIT=[];
							
					$.each($('.totalKGUNIT'), function() {
								totalKGUNIT.push($(this).val());
							});
							
						
				var MangeStatus = [];
					$.each($('.MangeStatus'), function() {
								MangeStatus.push($(this).val());
							});
					 
					 
					 
					 
					 
					 $.post("<?php echo BASE_URL?>?ManageProduct_ManageProduct",{
						 Message: $('#Message').val(),
						 osm_content_code: $('#osm_content_code').val(),
						 osm_id: $('#osm_id').val(),
						'pd_id[]': Product,
						'KG[]': KG,
						'bagSize[]': bagSize,
						'bagUnitNumber[]':bagUnitNumber,
						'MangeStatus[]':MangeStatus
						
						  },
						 function(data){
							
							 switch(data){
								 
								 case 'Success':
								
								jConfirm('Do you want view repot ?', 'Manage Product Report View', function(r) {
    							   
									if(r){
								
			$('#result').load('<?php echo BASE_URL?>?SingelReport_ManageProductInv&getID='+$('#osmIDFULLL').val()+' #resultt');
										//
										}else{
										location.reload();
											}
  								 });
								
								
								 break;
								 case 'ProductSelect':
								 jAlert("Please Select your Product and UNIT Measure.", 'Alert');
								 break;
								 case 'EXIST':
								 jAlert("Data already exists Please reload page and try again.", 'Alert');
								 break;
								 case 'MissingData':
								 jAlert("Please check this your every input System & try again", 'Alert');
								 break;
								 default:
								 jAlert("Please check this your every input System & try again", 'Alert');
								 }
							 
							 
							 }
						 
						 
						);
					 
					 
				}
		
	});
	
	
	
	
	
});
			

</script>