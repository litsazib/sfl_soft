<?php
class Error{
	
	public function _404(){
		$css_header=array('css/style.default.css','prettify/prettify.css');
		$js_heaser=array('prettify/prettify.js','js/jquery-1.9.1.min.js','js/jquery-migrate-1.1.1.min.js','js/jquery-ui-1.9.2.min.js','js/jquery.flot.min.js','js/jquery.flot.resize.min.js','js/bootstrap.min.js','js/modernizr.min.js','js/detectizr.min.js','js/jquery.cookie.js','js/custom.js');
		 $this->title=get_class($this).".:.".__FUNCTION__;
		
		require_once(View.__FUNCTION__.'.php');
		
		
		$css_footer=array();
		$js_footer=array();
		}
	
	}
	


?>