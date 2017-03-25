<div class="contentinner">
            	
            	
 <div id="result">
   
    
                <div class="row-fluid">
                
              
            
				<div class="span6">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td width="91" class="width30">Sales  ID:</td>
                          <?php
                          $invid=$this->sql("SELECT IFNULL(MAX(`osm_id`),'0') AS 'invid' FROM `product_accounts` where order_sales_manage_status='SalesManage'");
						   $inID=$invid[0]['invid']+1;
						  $str = ($inID < 10000000) ? 0 . $inID : $inID;
						  $osm_CustomCode="Sales-".date("mYd");
						  ?>
                          <td width="271" class="width70"><strong><?php echo $refull=$osm_CustomCode.$str;?>
                            <input type="hidden" name="osm_content_code" id="osm_content_code" value="<?php echo $osm_CustomCode;?>" />
                            <input type="hidden" name="osm_id" id="osm_id" value="<?php echo $str;?>" />
                            <input type="hidden" name="osmIDFULLL" id="osmIDFULLL" value="<?php echo $refull;?>" />
                          </strong></td>
                      </tr>
                      <tr>
                        <td>Customer Name</td>
                        <td><select class="form-control required customer " id="CustomerID" name="CustomerName" aria-required="true">
                          <option value="0">Please Select Customer</option>
                          <?php
                                $res=$this->sql("SELECT `customer_id`,CONCAT('[ ',`customer_code`,' ] ',`name`) AS 'name' FROM `customer`");
								
								  foreach($res as $value){
									  ?>
                          <option value="<?php  echo ($value['customer_id']);?>">
                            <?php  echo ($value['name']);?>
                          </option>
                          <?php
								  }
								  ?>
                        </select></td>
                    </tr>
                      <tr>
                        <td>Truck Number</td>
                        <td><input name="trucknumber" type="text" id="trucknumber" value="NULL" /></td>
                      </tr>
                      <tr>
                        <td>Issue Date:</td>
                        <td><strong><?php echo date('m/d/Y');?></strong></td>
                      </tr>
                  </table>
                  
                  
                  
                </div><!--span6-->
                
                
                
				<div class="span6">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td width="91" class="width30"> KG:</td>
                         
                          <td width="271" class="width70"><strong id="totlaKg">0.00</strong></td>
                      </tr>
                      <tr>
                        <td> A/C Bag:</td>
                        <td>Total Size: <strong id="bagSize">0.00</strong><strong> KG </strong>    Total Bag: <strong id="totalBagUNIT">0.00</strong><strong> KG</strong></td>
                    </tr>
                      
                  </table>
                  
                  
                  
                </div><!--span6-->
                
                
    </div><!--row-fluid-->
            
            <div class="clearfix"><br /></div>
          
           
  <table width="100%" class="table table-bordered table-invoice-full">
          <colgroup>
              <col class="con0 width6" />
              <col class="con1 width20" />
              <col class="con0 width10" />
              <col class="con1 width10" />
              <col class="con0 width16" />
          </colgroup>
          <thead>
              <tr>
                  <th width="53" class="head0">&nbsp;</th>
                  <th width="53" class="head0">PD Code</th>
                  <th width="107" class="head1 right">Bag Size</th>
                  <th width="53" class="head1 right">Unit Bag</th>
                  <th width="53" class="head1 right">Total KG</th>
                  <th width="80" class="head1 right">KG Price</th>
                  <th width="80" class="head1 right">Total Amount</th>
              </tr>
          </thead>
          <tbody>
                    
                    
              <tr class="data-wrapper">
                  <td ><button id="delauto" type="button" class="btn delete-new-data" ><i class="icon-trash"> </i> </button></td>
                <td><select class="form-control required chosen-select-width name pdid" name="pd_id[]" id="pd_id" aria-required="true">
                  <option value="0">Please Select Product</option>
                  <?php
                                $res=$this->sql("SELECT `product_id`,CONCAT('[ ',`pd_code`,' ] ',`pd_name`) AS 'pd_name' FROM `product`");
								
								  foreach($res as $value){
									  ?>
                  <option value="<?php  echo ($value['product_id']);?>">
                    <?php  echo ($value['pd_name']);?>
                  </option>
                  <?php
								  }
								  ?>
                </select></td>
                  <td align="center" class="right">
                  
                  
                  <input name="kg[]" type="hidden" class="input-small KG"  id="kg[]" placeholder="Unit KG" value="0" />
<input  name="bagsize[]" type="number" class="bagSize" id="bagsize[]" style="width:100px;" value="0"/>
                  <?php /*?><select name="bagsize[]" class="bagSize" style="width:100px;" id="bagsize[]">
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
                  <td align="center" class="right"><input readonly="readonly" name="totalKGUNIT[]" type="number" class="input-small totalKGUNIT"  id="totalKGUNIT[]" placeholder="Unit Bag" value="0" /></td>
                  <td align="center" class="right"><span class="field ">
                    <input name="kgPrice[]" type="number" class="input-small unitPriceKG"  id="kgPrice[]" placeholder="KG Price" value="0" />
                  </span></td>
                  <td align="center" class="right"><span class="field ">
                    <input name="amount[]" type="number" class="input-small SingleAmount"  id="amount[]" placeholder="Amount" value="0" readonly="readonly" />
                  </span></td>
              </tr>
                        
                        
                       
          </tbody>
    </table>
                         
             <button type="button" class="btn add-new-data"><i class="icon-plus"> </i> Add More Product</button>
                          
                  
    <table width="100%" class="table invoice-table">
                	
                    <tbody>
                        <tr>
                       	  <td width="524" class="msg-invoice">
       						<h4>Message:</h4>
       						  <p><span class="field ">
       						  <input type="text" name="Message"  id="Message" class="input-xlarge" placeholder="Message" required="required" />
       						  </span></p>
                              
                            <h4>Paying by *:</h4>
       						  <p>
       						    <select class="form-control required Paying " id="Paying" name="Paying" aria-required="true">
       						      <?php
                                $res=$this->sql("SELECT `acc_id`,accounts_name FROM `accounts_name`");
								
								  foreach($res as $value){
									  ?>
       						      <option value="<?php  echo ($value['acc_id']);?>">
       						        <?php  echo ($value['accounts_name']);?>
   						          </option>
       						      <?php
								  }
								  ?>
   						        </select>
       						  </p>
                              
                              <p id="checqShow" style="display:none;">
       						  <input name="bank_name" type="text" id="bank_name" placeholder="Bank Name" />
       						 
       						  <input name="cheque_number" type="text" id="cheque_number" placeholder="Cheque Number" />
       						  </p>
                              
                               <p id="bKash" style="display:none;">
       						  <input name="bkash_trans_id" type="text" id="bkash_trans_id" placeholder="Transection ID" />
       						 
       						 
       						  </p>
                              
                              
                            </td>
                            <td width="558" valign="top" >
                            <table width="100%" align="right" class="table table-bordered table-invoice" >
                              <tr>
                                <td width="338" class="width30"><strong>Subtotal</strong>:</td>
                               
                                <td width="238" align="right" class="width70"><input name="subtotal" type="number" id="subtotal" value="0" readonly="readonly" /></td>
                              </tr>
                              <tr style="color:#060;">
                                <td ><strong>Truck Fee</strong></td>
                                <td align="right" ><input name="trakFee" type="number" id="trakFee" value="0" /></td>
                              </tr>
                              <tr style="color:#060;">
                                <td ><strong>Discount</strong></td>
                                <td align="right" ><input name="discount" type="number" id="discount" value="0" /></td>
                              </tr>
                              <tr>
                                <td><strong>Total</strong></td>
                                <td align="right"><input name="totalAmount" type="number" id="totalAmount" value="0" readonly="readonly" /></td>
                              </tr>
                              <tr style="color:#060;">
                                <td><strong>Payment</strong></td>
                                <td align="right"><input name="paymenttotal" type="number" id="paymenttotal" value="0" /></td>
                              </tr>
                              <tr>
                                <td><strong>Dues</strong></td>
                                <td align="right"><input name="duestotal" type="number" id="duestotal" value="0" readonly="readonly" /></td>
                              </tr>
                            </table>
                            <strong><br /><br />
                            </strong></td>
                        </tr>
                    </tbody>
          </table>
          
          <div align="right">
    <input type="submit" name="purchasebtn" class="btn btn-primary btn-large" id="purchasebtn" value="Sales" />          </div>
 </div><!--Result-->
    
               
                
 </div><!--contentinner-->
      
<script type="text/javascript">


jQuery.noConflict();

				 jQuery(function($){ 
				 
				 
				 
		$('.customer').chosen();
	var clone = $("table tr.data-wrapper:first").clone(true);
	$('#delauto').hide();
    $('select.pdid').chosen({width: "250px"});
	$('body').on('click', '.add-new-data', function() {
		var ParentRow = $("table tr.data-wrapper").last();
		clone.clone(true).insertAfter(ParentRow);
		$('tr.data-wrapper:last select.pdid').chosen({width: "250px"});
	});
	
	
	$('body').on('click', '.delete-new-data', function() {
		
		var res=$(this).parents('tr').find('.KG').val();
		var totalBag=$("#bagSize").html();
		var totalKG=$("#totlaKg").html();
		var resbag=$(this).parents('tr').find('.bagSize').val();
		var totalUNITNUMBER=$("#totalBagUNIT").html();
		var resNumber=$(this).parents('tr').find('.bagUnitNumber').val();
		var subtotal=$("#subtotal").val();
		var ressubt=$(this).parents('tr').find('.SingleAmount').val();
		var totalamount=parseInt(subtotal-ressubt);
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totlaKg").html((totalKG-res));
			<!--KG-->
	
		$("#bagSize").html((totalBag-resbag));
			<!--totalBag-->
			
		
		$("#totalBagUNIT").html((totalUNITNUMBER-resNumber));
			<!--totalUNITNUMBER-->
		
		$("#subtotal").val((subtotal-ressubt));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
		
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
			<!--SingleAmount-->
			
			
	  $(this).parents('tr').remove();
		
	});
	
	
	
	
	
	
	$('body').on("keyup", ".KG", function() {
		var sum = 0;
    $(".KG").each(function(){
        sum += +$(this).val();
    });
		
    $("#totlaKg").html(sum);
	
	var totalSiz=parseInt($("#bagSize").html());
	var totalBagUNIT=parseInt($("#totalBagUNIT").html());
	$("#TotalKGBG").html((totalSiz*totalBagUNIT));
	
	var tSubBgKG=parseInt($("#TotalKGBG").html());
	var totlaKg=parseInt($("#totlaKg").html());
	
	
	
	<!--``````````````````````````````````````````````````````-->
	var TotalKGSingle=parseFloat($(this).parents('tr').find('.KG').val());
	
	var BagSize=$(this).parents('tr').find('.bagSize').val();
	var UnitBag=$(this).parents('tr').find('.bagUnitNumber').val();
	var BGKGTOTL=parseFloat((BagSize*UnitBag));
	var TOtalKGPD=(BGKGTOTL+TotalKGSingle);
	var UnitPriceKG=parseFloat($(this).parents('tr').find('.unitPriceKG').val());
    $(this).parents('tr').find('.SingleAmount').val((TOtalKGPD*UnitPriceKG));
	
		var sum = 0;
    $(".SingleAmount").each(function(){
        sum += +$(this).val();
    });
		
    $("#subtotal").val(sum);
	    var totalamount=parseInt(sum);
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
		
<!--```````````````````````````````````````````````````````````````````-->		

	
	
	
});



	$('body').on("change", ".bagSize", function() {
		
		var BagSize=$(this).parents('tr').find('.bagSize').val();
					var bagUnitNumber=$(this).parents('tr').find('.bagUnitNumber').val();
					$(this).parents('tr').find('.totalKGUNIT').val((BagSize*bagUnitNumber));
		
		var sum = 0;
    $(".bagSize").each(function(){
        sum += +$(this).val();
    });
    $("#bagSize").html((sum));
	var totalSiz=parseInt($("#bagSize").html());
	var totalBagUNIT=parseInt($("#totalBagUNIT").html());
	$("#TotalKGBG").html((totalSiz*totalBagUNIT));
	
	var tSubBgKG=parseInt($("#TotalKGBG").html());
	var totlaKg=parseInt($("#totlaKg").html());
	
	
	
	
	<!--``````````````````````````````````````````````````````-->
	var TotalKGSingle=parseFloat($(this).parents('tr').find('.KG').val());
	
	var BagSize=$(this).parents('tr').find('.bagSize').val();
	var UnitBag=$(this).parents('tr').find('.bagUnitNumber').val();
	var BGKGTOTL=parseFloat((BagSize*UnitBag));
	var TOtalKGPD=(BGKGTOTL+TotalKGSingle);
	var UnitPriceKG=parseFloat($(this).parents('tr').find('.unitPriceKG').val());
    $(this).parents('tr').find('.SingleAmount').val((TOtalKGPD*UnitPriceKG));
	
		var sum = 0;
    $(".SingleAmount").each(function(){
        sum += +$(this).val();
    });
		
    $("#subtotal").val(sum);
	    var totalamount=parseInt(sum);
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
		
<!--```````````````````````````````````````````````````````````````````-->		

	
});




$('body').on("keyup", ".bagUnitNumber", function() {
	
	var BagSize=$(this).parents('tr').find('.bagSize').val();
					var bagUnitNumber=$(this).parents('tr').find('.bagUnitNumber').val();
					$(this).parents('tr').find('.totalKGUNIT').val((BagSize*bagUnitNumber));
	
		var sum = 0;
    $(".bagUnitNumber").each(function(){
        sum += +$(this).val();
    });
		
    $("#totalBagUNIT").html(sum);
	var totalSiz=parseInt($("#bagSize").html());
	var totalBagUNIT=parseInt($("#totalBagUNIT").html());
	$("#TotalKGBG").html((totalSiz*totalBagUNIT));
	
	var tSubBgKG=parseInt($("#TotalKGBG").html());
	var totlaKg=parseInt($("#totlaKg").html());
	
	

	<!--``````````````````````````````````````````````````````-->
	var TotalKGSingle=parseFloat($(this).parents('tr').find('.KG').val());
	
	var BagSize=$(this).parents('tr').find('.bagSize').val();
	var UnitBag=$(this).parents('tr').find('.bagUnitNumber').val();
	var BGKGTOTL=parseFloat((BagSize*UnitBag));
	var TOtalKGPD=(BGKGTOTL+TotalKGSingle);
	var UnitPriceKG=parseFloat($(this).parents('tr').find('.unitPriceKG').val());
    $(this).parents('tr').find('.SingleAmount').val((TOtalKGPD*UnitPriceKG));
	
		var sum = 0;
    $(".SingleAmount").each(function(){
        sum += +$(this).val();
    });
		
    $("#subtotal").val(sum);
	    var totalamount=parseInt(sum);
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
		
<!--```````````````````````````````````````````````````````````````````-->		

	
	
});




$('body').on("keyup", ".unitPriceKG", function() {
	
	<!--``````````````````````````````````````````````````````-->
	var TotalKGSingle=parseFloat($(this).parents('tr').find('.KG').val());
	
	var BagSize=$(this).parents('tr').find('.bagSize').val();
	var UnitBag=$(this).parents('tr').find('.bagUnitNumber').val();
	var BGKGTOTL=parseFloat((BagSize*UnitBag));
	var TOtalKGPD=(BGKGTOTL+TotalKGSingle);
	var UnitPriceKG=parseFloat($(this).parents('tr').find('.unitPriceKG').val());
    $(this).parents('tr').find('.SingleAmount').val((TOtalKGPD*UnitPriceKG));
	
		var sum = 0;
    $(".SingleAmount").each(function(){
        sum += +$(this).val();
    });
		
    $("#subtotal").val(sum);
	    var totalamount=parseInt(sum);
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
		
<!--```````````````````````````````````````````````````````````````````-->		
	
});




	
	
	$('body').on("keyup", "#trakFee", function() {
		
		var totalamount=parseInt($("#subtotal").val());
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
});
	
	
	$('body').on("keyup", "#discount", function() {
		
		var totalamount=parseInt($("#subtotal").val());
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		$("#totalAmount").val(((totalamount-trakfee)-Discounts));
		$("#paymenttotal").val(((totalamount-trakfee)-Discounts));
});
	
	$('body').on("keyup", "#paymenttotal", function() {
		
		var totalamount=parseInt($("#subtotal").val());
		var trakfee=parseInt($("#trakFee").val());
		var Discounts=parseInt($("#discount").val());
		var paymenttotal=parseInt($("#paymenttotal").val());
		var cal=((totalamount-trakfee)-Discounts);
		$("#duestotal").val(cal-paymenttotal);
		
});
	
	$('body').on("change", "#Paying", function() {
		
		var cheque=parseInt($("#Paying").val());
		if(cheque==3){
			$("#checqShow").show();
			$("#bKash").hide();
			}else if(cheque==2){
				$("#checqShow").hide();
				$("#bKash").show();
				}else{
				$("#checqShow").hide();
				$("#bKash").hide();
				}
		
});
	
	
	$('body').on('click', '#purchasebtn', function() {
		
		
				
		
		if($('#Message').val() == '' || $('#osm_content_code').val() == '' || $('#CustomerID').val() == '0'){
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
							
							var unitPriceKG = [];
					$.each($('.unitPriceKG'), function() {
								unitPriceKG.push($(this).val());
							});
							
							
							
							var SingleAmount = [];
					$.each($('.SingleAmount'), function() {
								SingleAmount.push($(this).val());
							});
				
				
					 
					 $.post("<?php echo BASE_URL?>?Sales_SalesPD",{
						 Message: $('#Message').val(),
						 osm_content_code: $('#osm_content_code').val(),
						 osm_id: $('#osm_id').val(),
						 CustomerID: $('#CustomerID').val(),
						'pd_id[]': Product,
						'KG[]': KG,
						'bagSize[]': bagSize,
						'bagUnitNumber[]':bagUnitNumber,
						'auto_sales_pursess_unit_price[]':unitPriceKG,
						
						'truck_no':$('#trucknumber').val(),
						'truck_rate':$('#trakFee').val(),
						'subtotal':$('#subtotal').val(),
						'discount_amount':$('#discount').val(),
						'final_amount':$('#totalAmount').val(),
						'payment_amount':$('#paymenttotal').val(),
						 accounts_id:$('#Paying').val(),
						 bank_name:$('#bank_name').val(),
						 bkash_trans_id:$('#bkash_trans_id').val(),
						 cheque_number:$('#cheque_number').val()
						  }, 
						 function(data){
							
							 switch(data){
								 
								 case 'Success':
								
								jConfirm('Do you want view repot ?', 'Sales Report View', function(r) {
    							   
									if(r){
								
			$('#result').load('<?php echo BASE_URL?>?SingelReport_SalesPDinv&getID='+$('#osmIDFULLL').val()+' #resultt');
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