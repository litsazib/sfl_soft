<?php
class User extends Crud{
	
	
	private function LoginAction($userid,$pass){
		
		$result=$this->sql("SELECT * FROM `vg_employee` WHERE `email`=".$userid." AND `passwd`=".$pass."");
		if($result){
			return $result;
			}else{
				return false;
				}
		
		}
	
	
	public function Login(){
		
		$this->LoginAllredy(false);
		
		$css_header=array("css/style.default.css");
		$js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		require_once(View."user/".__FUNCTION__.'.php');
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
		
		
		
		}
		
		
	public function LoginOut(){
		session_start();
		session_destroy();
		header("Location: ./");
		
		
		}

		
			
			public function LoginCheck(){
				
				$this->LoginAllredy(false);
				
				if(isset($_POST["userID"])!="" && isset($_POST["PassWord"])!=""){
					
				 $res=$this->LoginAction($this->DBH->quote($_POST["userID"]),$this->DBH->quote($_POST["PassWord"]));
				if($res){
					session_start();
					$_SESSION["LoginStatus"]=$res;
					echo "true";
					}else{
						
						echo  'false';
						}
				}else{
						header("Location: ./?error");
						exit();
					}
					
				
				}
				
				
				public function Profile(){
					
					$this->LoginAllredy(true);
					
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js",
	 "js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/modernizr.min.js","js/detectizr.min.js","js/jquery.cookie.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		require_once(View."user/".__FUNCTION__.'.php');
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
					
					}
	
	
	public function ProfileUpdate(){
					
					$this->LoginAllredy(true);
					
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js",
	 "js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/modernizr.min.js","js/detectizr.min.js","js/jquery.cookie.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		require_once(View."user/".__FUNCTION__.'.php');
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
					
					}
	
				
	
	}



?>