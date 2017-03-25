<?php
class SingelReport extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	
		public function ManageProductInv(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/ManageProduct/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		}
		
		
		public function ManageProductdetails(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/ManageProduct/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}
	
				
		
		public function PurchasePDinv(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Purchase="active";
		
		//$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Purchase/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		}
		
		public function SalesPDinv(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Sales="active";
		
		//$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Sales/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		}
		
		
		public function salesINVPDF(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Sales="active";
		
		//$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Sales/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		}
		
		
		
		
		
		public function PurchaseINVPDF(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Sales="active";
		
		//$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Purchase/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		}
		
		
		
		
		
		
		public function supplierACdetails(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Purchase/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}
	
			
		public function customerACdetails(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->Reports="active";
		
		$this->ReportsLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Sales/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}	
		
		
		
		public function paymentReceiptP(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->PurchasePayment="active";
		
		
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Purchase/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}	
		
		
		public function paymentReciptPPDF(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->PurchasePayment="active";
		
		
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Purchase/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}	
		
		
		
		
		public function paymentReceiptS(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->SalesPayment="active";
		
		
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Sales/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}	
			
			
			
			public function paymentReciptPDF(){
		
					$this->LoginAllredy(true);
					
					
		
				$this->SalesPayment="active";
		
		
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		 $file=View."Reports/SinglePage/Sales/".__FUNCTION__.'.php';
		if(file_exists($file)){
			if(isset($_GET['getID'])){
			
		require_once($file);
			}	else{
				header("Location: ./?error");
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
	
		
		}	
			
	
	}



?>