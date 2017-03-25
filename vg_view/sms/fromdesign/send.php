
<div class="contentinner">
            	
            	
 <div id="result">
   
    
                <div class="row-fluid">
                
              
            
				<div class="span12">
               
               	  
                
                  
                  <form action="" method="post">
                  
                  <table class="table table-bordered table-invoice" >
                      <tr>
                          <td width="121" class="width30">SMS Status: </td>
                         
                          <td width="284" class="width70">
                          
                           <select name="smsStatus" id="smsStatus">
                         <option value="Custome">Custome</option>
                         <option value="Customer">Customer</option>
                         <option value="Supplier">Supplier</option>
                         </select>
                          </td>
                      </tr>
                      <tr id="CustomeN">
                        <td width="121" class="width30">Custome Number</td>
                        <td class="width70"><input name="mobileNumber" type="text" id="mobileNumber" maxlength="11" /></td>
                      </tr>
                      <tr id="CustomerN"  style="display:none;">
                        <td class="width30" >Customer Number</td>
                        <td width="284" >
                        <select class="form-control required mobiNUM " id="mobileNumber" name="mobileNumber" style="width:100%;" aria-required="true">
                          <option value="0">Please Select Customer</option>
                          <?php
                  $res=$this->sql("SELECT `contact`,CONCAT('[ ',`customer_code`,' ] ',`name`) AS 'name' FROM `customer`");
								
								  foreach($res as $value){
									
									?>
                          <option value="<?php  echo ($value['contact']);?>">
                            <?php  echo ($value['name'])." <b> [ Mobile: ".$value['contact']." ]</b>";?>
                          </option>
                          <?php
								  }
								  ?>
                        </select></td>
                      </tr>
                      <tr id="SupplierN" style="display:none;">
                        <td class="width30">Supplier Number</td>
                        <td ><select class="form-control required mobiNUM " id="mobileNumber" name="mobileNumber"  aria-required="true">
                          <option value="0">Please Select Supplier</option>
                          <?php
                  $sup=$this->sql("SELECT `contact_number`,CONCAT('[ ',`supplier_code`,' ] ',`name`) AS 'name' FROM `vg_supplier`");
								
								  foreach($sup as $value){
									  ?>
                          <option value="<?php  echo ($value['contact_number']);?>">
                            <?php  echo ($value['name'])." <b> [ Mobile Number: ".$value['contact_number']." ]</b>";?>
                          </option>
                          <?php
								  }
								  ?>
                        </select></td>
                      </tr>
                      <tr>
                        <td>MESSAGE</td>
                        <td><textarea name="Message" cols="44" rows="6" id="Message"></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="2"> 
                        <div align="right">
        <input type="submit" name="sendSMS" class="btn btn-primary btn-large" id="sendSMS" value="Send SMS" />          
        		</div></td>
                      </tr>
                  </table>
                  
                  
                  </form>
                  
                 
                  
                  
                  
                </div><!--span6-->
                
                
                
				</div>
                
                
    </div><!--row-fluid-->
            
           
               
                
 </div><!--contentinner-->
      
<script type="text/javascript">
jQuery.noConflict();

				 jQuery(function($){ 
				 
				 
				 $('.mobiNUM').chosen({width: "100%"});
	
				 
		
	$('body').on("change", "#smsStatus", function() {
		
		
		
		var smsStatus=$("#smsStatus").val();
		//alert(smsStatus);
		if(smsStatus=="Custome"){
			$("#CustomeN").show();
			$("#CustomerN").hide();
			$("#SupplierN").hide();
			}else if(smsStatus=="Customer"){
				$("#CustomeN").hide();
				$("#CustomerN").show();
				$("#SupplierN").hide();
				
				
				}else{
					$("#CustomeN").hide();
				$("#CustomerN").hide();
				$("#SupplierN").show();
					}
		
		
});

$('body').on("change", "#mobileNumber", function() {
		
		
		var smsStatus=$("#smsStatus").val();
		var mobi=$(this).parents('tr').find('.mobiNUM').val();
		
		//$(".mobiNUM").val();
		
				
				 $.post("<?php echo BASE_URL?>?SMS_Send",{
					  MESSAGECONTENT: 'true',
					  SENDSTATUS:$("#smsStatus").val(),
					  MOBILENUMBERL: mobi
					 },function(data){
					 
					 $("#Message").val(data);
					 });
				 
				
		
		
		
});
	
	

	
});
			

</script>