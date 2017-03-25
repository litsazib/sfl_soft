<?php
class Ledger extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	public function FromDesign($file=false){
			if($file){
				
			return View."Ledger/fromdesing/".$file.".php";
			
			}else{
				return false;
				}
			
			}
		
						public function Supplier(){
						
									$this->LoginAllredy(true);
									
									
									$this->ledgerM="active";
						
						$this->ledgerMLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						

						$this->supplier_statement=$this->FromDesign("supplier_statement");
						$file=View."Ledger/".__FUNCTION__.'.php';
						if(file_exists($file)){
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		
		
		
		
		
		
		public function SupplierPrint(){
						
									$this->LoginAllredy(true);
									
						$file=View."Ledger/".__FUNCTION__.'.php';
						if(file_exists($file)){
							
							
							
							
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		
		
		
		
		public function Customer(){
						
									$this->LoginAllredy(true);
									
									
									$this->ledgerM="active";
						
						$this->ledgerMLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						

						$this->customer_statement=$this->FromDesign("supplier_statement");
						$file=View."Ledger/".__FUNCTION__.'.php';
						if(file_exists($file)){
						require_once($file);
						}else{
							header("Location: ./?error");
							}
						
						
						
						///////////*******************************/////////////////////
						$css_footer=array();
						$js_footer=array();
									
						
						}
		
		public function CustomerPrint(){
						
									$this->LoginAllredy(true);
									
						$file=View."Ledger/".__FUNCTION__.'.php';
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