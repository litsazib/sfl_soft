<?php
class SMS extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	public function FromDesign($file=false){
			if($file){
				
			return View."sms/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
		
						public function Send(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
										
										if(isset($_POST['MESSAGECONTENT'])){
											
											if($_POST['SENDSTATUS']=="Customer"){
												
												$sql="SELECT `customer`.`name`, `customer`.`customer_id`, `customer`.`contact` , `customer`.`default_balance`
															, SUM(`customer_accounts`.`total_amount`) AS 'total_amount'
															, SUM(`customer_accounts`.`payment_amount`) AS 'payment_amount'
															, SUM((`customer_accounts`.`total_amount`)-(`customer_accounts`.`payment_amount`)) AS 'dues_amount'
														FROM
														   `customer`
															LEFT JOIN `customer_accounts` 
																ON (`customer`.`customer_id` = `customer_accounts`.`customer_id`) 
																WHERE `customer`.`contact`=".$this->DBH->quote($_POST['MOBILENUMBERL'])."";
												
												}else{
													$sql="SELECT `vg_supplier`.`name`, `vg_supplier`.`id_supplier`, `vg_supplier`.`contact_number`, `vg_supplier`.`default_balance`
															, SUM(`supplier_accounts`.`total_amount`) AS 'total_amount'
															, SUM(`supplier_accounts`.`payment_amount`) AS 'payment_amount'
															, SUM((`supplier_accounts`.`total_amount`)-(`supplier_accounts`.`payment_amount`)) AS 'dues_amount'
														FROM
														   `vg_supplier`
															LEFT JOIN `supplier_accounts` 
																ON (`vg_supplier`.`id_supplier` = `supplier_accounts`.`supplier_id`) 
																WHERE `vg_supplier`.`contact_number`=".$this->DBH->quote($_POST['MOBILENUMBERL'])."";
													
													}
													
													
													$res=$this->sql($sql);
													$totalDues=($res[0]['total_amount']+$res[0]['default_balance'])-$res[0]['payment_amount'];
													
												echo 	 "Dear ".$res[0]['name']."\n".
													"Your Total Amount: ".$res[0]['total_amount']."\n".
													"Opening Balance:  ".$res[0]['default_balance']."\n".
													"Payment Amount: ".$res[0]['payment_amount']."\n".
													"Total Dues Amount: ".$totalDues."\n".
													"Thanks Solaiman Feeds Ltd";
											
											
											exit();
											}else{
										
										
						    $this->msgSE=$this->SMSAPI($_POST['mobileNumber'],$_POST['Message'],$_POST['smsStatus']);		
									echo "<br>";
									echo "<a href='?SMS_Send'>Back</a>";					
												exit(0);		
													}
									}
													
									
									
									
									$this->smsM="active";
						
						//$this->PurchaseLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->smsSend=$this->FromDesign("send");
						
						
						$file=View."sms/".__FUNCTION__.'.php';
						if(file_exists($file)){
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		
		public function SendGroup(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
										
										if($_POST['smsStatus']=='Customer'){
											
											$customer=$this->sql("SELECT `contact` FROM `customer` WHERE `status`='Active'");
											foreach($customer as $mobilenumber):
									
											$this->msgSE=$this->SMSAPI($mobilenumber['contact'],$_POST['Message'],$_POST['smsStatus']);		
												echo "<br>";
											endforeach;
											
											
											}else if($_POST['smsStatus']=='Supplier'){
												
												$supplier=$this->sql("SELECT `contact_number` FROM `vg_supplier` WHERE `active`='Active'");
												foreach($supplier as $mobilenumber):
											
												$this->msgSE=$this->SMSAPI($mobilenumber['contact_number'],$_POST['Message'],$_POST['smsStatus']);
												echo "<br>";
												endforeach;
												}else{
												echo "Please Select Aneyone..";
												}
						 
									
									echo "<br>";
									echo "<a href='?SMS_SendGroup'>Back</a>";						
								exit(0);		
													
									}
													
									
									
									
									$this->GsmsM="active";
						
						//$this->PurchaseLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->smsSend=$this->FromDesign("sendGroup");
						
						
						$file=View."sms/".__FUNCTION__.'.php';
						if(file_exists($file)){
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		
		
		
		
		
		
		
			
				
	
	}



?>