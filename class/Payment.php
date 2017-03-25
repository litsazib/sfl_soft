<?php
class Payment extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	public function FromDesign($file=false){
			if($file){
				
			return View."Payment/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
		
						public function Purchase(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
									

														
				if(isset($_POST["Message"])!="" && isset($_POST["reference"])!="" && isset($_POST["Paying"])!="0" && isset($_POST['supplierID'])!="0" && isset($_POST['payamounts'])!=""){
										
									
											
		$check=$this->sql("SELECT * FROM `supplier_accounts` WHERE `recipt_code`=".$this->DBH->quote($_POST["recipt_code"])."");
														if(!$check){	
												
											$netamount=$this->sql("SELECT SUM(`total_amount`-`payment_amount`) AS 'netamount' FROM `supplier_accounts` WHERE `supplier_id`=".$this->DBH->quote($_POST["supplierID"])."");
											 
											 $totalNet=($netamount[0]['netamount']-$_POST['payamounts']);
											$insert=$this->insert("supplier_accounts",array("supplier_id"=>$_POST['supplierID'],
											"reperence_status"=>"Payment",
											"ref_osm_full_id"=>$_POST['reference'],
											"payment_amount"=>$_POST['payamounts'],
											"net_blance"=>$totalNet,
											"accounts_id"=>$_POST['Paying'],
											"bank_name"=>$_POST["bank_name"],
											"cheque_number"=>$_POST["cheque_number"],
											"recipt_code"=>$_POST["recipt_code"],
											"remarks"=>$_POST["Message"]
											));
														if($insert){
															echo "Success";
															}else{
																echo "Error";
																}		
														}else{
															echo "Existe";
															}
														
														}else{
															echo "MissingData";
															}			
													
														exit(0);
													}
													
									
									
									
									
						$this->PurchasePayment="active";
						
						//$this->PurchaseLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->Paymentfrom=$this->FromDesign("Paymentfrom");
						
						
						$file=View."Payment/".__FUNCTION__.'.php';
						if(file_exists($file)){
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		
		
		
		public function Sales(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
									

														
				if(isset($_POST["Message"])!="" && isset($_POST["reference"])!="" && isset($_POST["Paying"])!="0" && isset($_POST['CustomerID'])!="0" && isset($_POST['payamounts'])!=""){
										
									
											
		$check=$this->sql("SELECT * FROM `customer_accounts` WHERE `recipt_code`=".$this->DBH->quote($_POST["recipt_code"])."");
														if(!$check){	
												
											$netamount=$this->sql("SELECT SUM(`total_amount`-`payment_amount`) AS 'netamount' FROM `customer_accounts` WHERE `customer_id`=".$this->DBH->quote($_POST["CustomerID"])."");
											 
											 $totalNet=($netamount[0]['netamount']-$_POST['payamounts']);
											$insert=$this->insert("customer_accounts",array("customer_id"=>$_POST['CustomerID'],
											"reperence_status"=>"Payment",
											"ref_osm_full_id"=>$_POST['reference'],
											"payment_amount"=>$_POST['payamounts'],
											"net_blance"=>$totalNet,
											"accounts_id"=>$_POST['Paying'],
											"bank_name"=>$_POST["bank_name"],
											"cheque_number"=>$_POST["cheque_number"],
											"recipt_code"=>$_POST["recipt_code"],
											"remarks"=>$_POST["Message"]
											));
														if($insert){
															echo "Success";
															}else{
																echo "Error";
																}		
														}else{
															echo "Existe";
															}
														
														}else{
															echo "MissingData";
															}			
													
														exit(0);
													}
													
									
									
									
									
						$this->SalesPayment="active";
						
						//$this->PurchaseLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->Paymentfrom=$this->FromDesign("salesrecipt");
						
						
						$file=View."Payment/".__FUNCTION__.'.php';
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