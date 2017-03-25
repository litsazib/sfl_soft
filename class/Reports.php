<?php
class Reports extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	
		public function ProductStock(){
		
					$this->LoginAllredy(true);
					
					
					$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/chosen.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js","js/chosen.jquery.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		if(isset($_POST['search'])){
			
			if($_POST['pd_type']!='0' && $_POST['catagory_id']!='0' && $_POST['pd_id']!='0'){
				
				$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE  `pd_type`='".$_POST['pd_type']."' and `catagory_id`='".$_POST['catagory_id']."' and `product_id`='".$_POST['pd_id']."'");
				
				}elseif($_POST['pd_type']!='0' && $_POST['catagory_id']=='0' && $_POST['pd_id']=='0'){
					
					$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE  `pd_type`='".$_POST['pd_type']."'");
					
					}elseif($_POST['pd_type']!='0' && $_POST['catagory_id']!='0' && $_POST['pd_id']=='0'){
					
					$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE  `pd_type`='".$_POST['pd_type']."' and `catagory_id`='".$_POST['catagory_id']."'");
					
					}
					elseif($_POST['pd_type']=='0' && $_POST['catagory_id']!='0' && $_POST['pd_id']=='0'){
					
					$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE   `catagory_id`='".$_POST['catagory_id']."'");
					
					}elseif($_POST['pd_type']=='0' && $_POST['catagory_id']!='0' && $_POST['pd_id']!='0'){
					
					$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE   `catagory_id`='".$_POST['catagory_id']."' and `product_id`='".$_POST['pd_id']."'");
					
					}elseif($_POST['pd_type']=='0' && $_POST['catagory_id']=='0' && $_POST['pd_id']!='0'){
					
					$this->product=$this->sql("SELECT * FROM `report_product_stock` WHERE   `product_id`='".$_POST['pd_id']."'");
					
					}
					else{
								
			
			$this->product=$this->sql("SELECT `product_id`,`pd_code`,`pd_name`,catagory_id,cat_name,pd_type,`stock_kg`,`stock_bag`,`unit_number`,`total_kg` FROM `report_product_stock` ORDER BY product_id DESC");
						
						}
			
	
			}else{
			$this->product=$this->sql("SELECT `product_id`,`pd_code`,`pd_name`,catagory_id,cat_name,pd_type,`stock_kg`,`stock_bag`,`unit_number`,`total_kg` FROM `report_product_stock` ORDER BY product_id DESC");
			}
		
		$file=View."Reports/fullFrom/product/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
	
	
	public function Purchase(){
		
					$this->LoginAllredy(true);
					
					
					$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			
			if(isset($_POST['btnSerce'])){
				 $fDate=$_POST['fdate'];
				 $datef = new DateTime($fDate);
                  $FdateSerc = $datef->format('Y-m-d');
				  
				  $Tadate=$_POST['Tadate'];
				 $dateT = new DateTime($Tadate);
                  $TdateSerc = $dateT->format('Y-m-d');
				
				if($_POST['SupplierNmae']=="0"){
			$this->Purchase=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Purchase'  AND DATE(`create_date`) BETWEEN '".$FdateSerc."' AND '".$TdateSerc."' ORDER BY id DESC");  
				}else{
					$this->Purchase=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Purchase'  AND DATE(`create_date`) BETWEEN '".$FdateSerc."' AND '".$TdateSerc."' and customer_supplier_id='".$_POST['SupplierNmae']."' ORDER BY id DESC");  
					
					}
				
				}else{
			
			$this->Purchase=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Purchase' ORDER BY id DESC");
				}
			
		
		$file=View."Reports/fullFrom/product/".__FUNCTION__.'.php';
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
					
					
					$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			
			if(isset($_POST['btnSerce'])){
				 $fDate=$_POST['fdate'];
				 $datef = new DateTime($fDate);
                  $FdateSerc = $datef->format('Y-m-d');
				  
				  $Tadate=$_POST['Tadate'];
				 $dateT = new DateTime($Tadate);
                  $TdateSerc = $dateT->format('Y-m-d');
				
				if($_POST['Customer']=="0"){
			$this->Sales=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Sales'  AND DATE(`create_date`) BETWEEN '".$FdateSerc."' AND '".$TdateSerc."' ORDER BY id DESC");  
				}else{
					$this->Sales=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Sales'  AND DATE(`create_date`) BETWEEN '".$FdateSerc."' AND '".$TdateSerc."' and customer_supplier_id='".$_POST['Customer']."' ORDER BY id DESC");  
					
					}
					
				
				}else{
			
			
			$this->Sales=$this->sql("SELECT * FROM `product_osm_accounts` where sales_purchase_status='Sales' ORDER BY id DESC");
				}
		$file=View."Reports/fullFrom/product/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}	
		
		
		
		public function SupplierAC(){
		
					$this->LoginAllredy(true);
					
					
					$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			$this->SupplierAC=$this->sql("SELECT * FROM `report_supplier_accounts`  ORDER BY id_supplier DESC");
		
		$file=View."Reports/fullFrom/accounts/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}	
				
	
	public function CustomerAC(){
		
					$this->LoginAllredy(true);
					
					
					$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			$this->CustomerAC=$this->sql("SELECT * FROM `report_customer_accounts`  ORDER BY customer_id DESC");
		
		$file=View."Reports/fullFrom/accounts/".__FUNCTION__.'.php';
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