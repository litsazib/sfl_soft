
<div class="contentinner">
            	
            	
 <div id="result">
   
    
                <div class="row-fluid">
                
              
            
				<div class="span12">
                
               	  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td width="91" class="width30">Issue Date:</td>
                          <?php
                          $invid=$this->sql("SELECT IFNULL(MAX(`recipt_code`),'0') AS 'invid' FROM `customer_accounts`");
						  $inID=$invid[0]['invid']+1;
						  
						  ?>
                          <td width="305" class="width70"><strong><?php echo date('M-D-Y');?>
                            
                          <input type="hidden" name="recipt_code" id="recipt_code" value="<?php echo $inID;?>" />
                          </strong></td>
                      </tr>
                      <tr>
                        <td class="width30">Customer Name</td>
                        <td width="305" class="width70"><select class="form-control required customer " id="CustomerID" name="SupplierNmae" style="width:100%;" aria-required="true">
                          <option value="0">Please Select Customer</option>
                          <?php
                  $res=$this->sql("SELECT `customer_id`,CONCAT('[ ',`customer_code`,' ] ',`name`) AS 'name' FROM `customer`");
								
								  foreach($res as $value){
								$netAmountSupplier=$this->sql("SELECT SUM(`total_amount`-`payment_amount`) AS 'netAmount' FROM `report_customer_accounts` WHERE `customer_id`='".$value['customer_id']."'");
								$defaultBalance=$this->sql("SELECT SUM(`default_balance`) AS 'defaultblance' FROM `customer` WHERE `customer_id`='".$value['customer_id']."'");
									  ?>
                          <option value="<?php  echo ($value['customer_id']);?>">
                            <?php  echo ($value['name'])." <b> [ Net Blance: ".number_format(($netAmountSupplier[0]['netAmount']+$defaultBalance[0]['defaultblance']),2)." ]</b>";?>
                          </option>
                          <?php
								  }
								  ?>
                        </select></td>
                      </tr>
                      <tr>
                        <td class="width30">Reference #</td>
                        <td class="width70"><input name="reference" type="text" id="reference" /></td>
                      </tr>
                      <tr style="color:#093;"> 
                        <td>Pay Amounts</td>
                        <td><input name="payamounts" type="text" id="payamounts" /></td>
                    </tr>
                      <tr style="color:#093;">
                        <td>Paying by *:</td>
                        <td> <select class="form-control required Paying " id="Paying" name="Paying" aria-required="true">
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
                                
                                <p id="checqShow" style="display:none;">
       						  <input name="bank_name" type="text" id="bank_name" placeholder="Bank Name" />
       						 
       						  <input name="cheque_number" type="text" id="cheque_number" placeholder="Cheque Number" />
       						  </p>
                                
                                
                                </td>
                      </tr>
                      <tr>
                        <td>Re.Mark</td>
                        <td><input name="Message" type="text" id="Message" /></td>
                      </tr>
                      <tr>
                        <td colspan="2"> 
                        <div align="right">
        <input type="submit" name="purchasePaymentbtn" class="btn btn-primary btn-large" id="SalesPaymentbtn" value="Sales Payment" />          
        		</div></td>
                      </tr>
                  </table>
                  
                  
                  
                </div><!--span6-->
                
                
                
				</div>
                
                
    </div><!--row-fluid-->
            
           
               
                
 </div><!--contentinner-->
      
<script type="text/javascript">
jQuery.noConflict();

				 jQuery(function($){ 
				 
		$('.customer').chosen();
	var clone = $("table tr.data-wrapper:first").clone(true);
	$('#delauto').hide();
    $('select.pdid').chosen({width: "350px"});
	$('body').on('click', '.add-new-data', function() {
		var ParentRow = $("table tr.data-wrapper").last();
		clone.clone(true).insertAfter(ParentRow);
		$('tr.data-wrapper:last select.pdid').chosen({width: "350px"});
	});
	
	
	
	
	
	$('body').on("change", "#Paying", function() {
		
		var cheque=parseInt($("#Paying").val());
		if(cheque==3){
			$("#checqShow").show();
			}else{
				$("#checqShow").hide();
				}
		
});
	
	
	
	$('body').on('click', '#SalesPaymentbtn', function() {
		
		
				
		var paymaount=parseInt($('#payamounts ').val());
		
		if($('#Message').val() == '' || $('#reference ').val() == '' || $('#CustomerID').val() == '0' || paymaount=='NaN' ){
			jAlert('Please Type Your Message for your Custome Field Manage!', 'Alert');
			}else{
				     
					 $.post("<?php echo BASE_URL?>?Payment_Sales",{
						 Message: $('#Message').val(),
						 reference: $('#reference').val(),
						 Paying: $('#Paying').val(),
						 CustomerID: $('#CustomerID').val(),
						 payamounts: $('#payamounts').val(),
						 bank_name: $('#bank_name').val(),
						 cheque_number: $('#cheque_number').val(),
						 recipt_code:$('#recipt_code').val()
						  },
						 function(data){
							
						
							 switch(data){
								
								 case 'Success':
								jConfirm('Do you want view payment receipt ?', 'Sales payment receipt View', function(r) {
    							   
									if(r){
								
			$('#result').load('<?php echo BASE_URL?>?SingelReport_paymentReceiptS&getID='+$('#recipt_code').val()+' #resultt');
										//
										}else{
										location.reload();
											}
  								 });
								 break;
								
								
								 case 'MissingData':
								 jAlert("Please check this your every input System & try again", 'Alert');
								 break;
								 case 'Existe':
								  jAlert("Data allready Existes", 'Alert');
								 break;
								 case 'Error':
								  jAlert("Please Try again", 'Alert');
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