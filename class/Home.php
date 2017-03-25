<?php
class Home extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	
	
		public function Dashboard(){
		
					$this->LoginAllredy(true);
					
					$this->DashboardM="active";
		
		
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/jquery.flot.min.js","js/jquery.flot.resize.min.js","js/bootstrap.min.js","js/modernizr.min.js","js/detectizr.min.js","js/jquery.cookie.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		$file=View."Dashboard/".__FUNCTION__.'.php';
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