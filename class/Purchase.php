<?php
class Purchase extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	public function FromDesign($file=false){
			if($file){
				
			return View."Purchase/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
		
						public function PurchasePD(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
									if(isset($_POST["Message"])!="" && isset($_POST["osm_content_code"])!="" && isset($_POST["osm_id"])!="" && isset($_POST['supplierID'])!=""){
	$check=$this->sql("SELECT * FROM `product_accounts` WHERE `osm_content_code`=".$this->DBH->quote($_POST["osm_content_code"])." and `osm_id`=".$this->DBH->quote($_POST["osm_id"])."");
														if(!$check){
															$i=0;
															$TotalKGUNIT=0;	
															$total_bag=0;
															$KGTOtal=0;
															
															foreach($_POST["pd_id"] as $k=>$productId){
if(($productId!='0') && (($_POST['KG'][$k]!=null && $_POST['KG'][$k]!="0") || 
($_POST['bagSize'][$k]!=null && $_POST['bagSize'][$k]!="0") || ($_POST['bagUnitNumber'][$k]!=null && $_POST['bagUnitNumber'][$k]!="0"))){
						
						$tBGKGST=$_POST['bagSize'][$k]*$_POST['bagUnitNumber'][$k];				
					$KGTOtal=($_POST['KG'][$k]+$tBGKGST);
					$this->insert("product_accounts",array("order_sales_manage_status"=>"PurchaseManage",
												  "pd_id"=>$productId,
												  "osm_content_code"=>$_POST["osm_content_code"],
												  "osm_id"=>$_POST['osm_id'],
												  "osm_fulll_id"=>$_POST["osm_content_code"].$_POST["osm_id"],
												  "supplier_customerid"=>$_POST['supplierID'],
												  "stock_kg"=>$_POST['KG'][$k],
												  "stock_bag"=>$_POST['bagUnitNumber'][$k],
												  "bag_size"=>$_POST['bagSize'][$k],
												  "auto_sales_pursess_unit_price"=>$_POST['auto_sales_pursess_unit_price'][$k],
												  "total_price"=>($KGTOtal*$_POST['auto_sales_pursess_unit_price'][$k]),
												  "total_kg"=>$KGTOtal,
												  "nots"=>$_POST['Message'],
												  "insert_id"=>$_SESSION['LoginStatus'][0]['id_employee']
												  
												   ));
												   $TotalKGUNIT+=$KGTOtal;
												   $total_bag+=$_POST['bagUnitNumber'][$k];
												   $i++;
																}//end IF
																
																}//foreach	
																		
															
															if($i>0){
																
															$this->insert("product_osm_accounts",array("osm_full_id"=>$_POST["osm_content_code"].$_POST["osm_id"],
												  "sales_purchase_status"=>"Purchase",
												  "customer_supplier_id"=>$_POST["supplierID"],
												  "truck_no"=>$_POST['truck_no'],
												  "truck_rate"=>$_POST["truck_rate"],
												  "totla_kg"=>$TotalKGUNIT,
												  "total_bag"=>$total_bag,
												  "subtotal"=>$_POST['subtotal'],
												  "discount_amount"=>$_POST['discount_amount'],
												  "final_amount"=>$_POST['final_amount'],
												  "payment_amount"=>$_POST['payment_amount']
												   ));	
												   
												   $netamount=$this->sql("SELECT SUM(`total_amount`-`payment_amount`) AS 'netamount' FROM `supplier_accounts` WHERE `supplier_id`=".$this->DBH->quote($_POST["supplierID"])."");
												   
												   $currentNeet=$_POST['final_amount']-$_POST['payment_amount'];
												   
												   $totalNet=$netamount[0]['netamount']+$currentNeet;
												   
								 $invid=$this->sql("SELECT IFNULL(MAX(`recipt_code`),'0') AS 'invid' FROM `supplier_accounts`");
								  $inID=$invid[0]['invid']+1;
												   
												   $this->insert("supplier_accounts",array(
												   "supplier_id"=>$_POST["supplierID"],
												    "reperence_status"=>"Purchase",
													 "ref_osm_full_id"=>$_POST["osm_content_code"].$_POST["osm_id"],
													  "total_amount"=>$_POST['final_amount'],
													   "payment_amount"=>$_POST['payment_amount'],
													    "net_blance"=>$totalNet,
														"accounts_id"=>$_POST["accounts_id"],
														"bank_name"=>$_POST["bank_name"],
														"cheque_number"=>$_POST["cheque_number"],
														"bkash_trans_id"=>$_POST['bkash_trans_id'],
														"recipt_code"=>$inID
												   ));	
																
															echo "Success";
															}else{
																echo "ProductSelect";
																}
															
														}else{
															echo "EXIST";
															}
															
															
															}else{
																
																echo 'MissingData';
																
																}
																
																
																
																
														
														exit(0);
													}
													
									
									
									
									
									
									
									$this->PurchaseM="active";
						
						//$this->PurchaseLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->Purchase_inv=$this->FromDesign("Purchase_inv");
						
						
						$file=View."Purchase/".__FUNCTION__.'.php';
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