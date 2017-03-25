<?php
class Customer extends Crud{
	
	
	
			
	public function AllCustomer(){
		
					$this->LoginAllredy(true);
					
					$this->Customer="active";
		
		$this->CustomerLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		$this->customer=$this->sql("SELECT `customer_id`,customer_code,`name`,`address`,`email`,`contact`,DATE_FORMAT(`reg_date`,'%Y-%M-%D') AS 'joindate',`status` FROM `customer` ORDER BY `customer_id` DESC");
		$file=View."Customer/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		public function FromDesign($file=false){
			if($file){
				
			return View."Customer/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
		
		public function Registration(){
		
					$this->LoginAllredy(true);
					
					$this->Customer="active";
		
		$this->CustomerLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("reg_from");
		
		
		$file=View."Customer/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
	
	
				
		public function ActionReg(){
		
					$this->LoginAllredy(true);
					
					
		////////////******************************/////////////////////
		
		if(isset($_POST["customer_code"])!="" && isset($_POST["customer_code"])!=""){
					
						///////////////////Check
					$check=$this->sql("SELECT * FROM `customer` WHERE `customer_code`=".$this->DBH->quote($_POST["customer_code"])."");
					
						////////////////////////////////////
				if(!$check):
				  $result=$this->insert("customer",array("customer_code"=>$_POST['customer_code'],
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  "email"=>$_POST['email'],
				   "contact"=>$_POST['contact'],
				   "cutomer_type"=>$_POST['cutomer_type'],
				   "company_name"=>$_POST['company_name'],
				   "default_balance"=>$_POST["default_balance"],
				    "images_up"=>$this->UploadeIMG('images_up',"./upload_image/CUSTOMER/",$_POST['sec_id'])
				   
				  ));
				 
				  
				  
				  				header("Location: ./?Customer_Profile&GETiD=".$_POST['customer_code']."");
						exit();
					endif;
				  
				  
				}else{
						header("Location: ./?error");
						exit();
					}
				
		
		}
		///////////*******************************/////////////////////
		
		///*********************************************
		public function CustomerDelete(){
			if(isset($_POST['myCheckboxes'])){
			$result=$this->DeleteIn('customer','customer_id',$_POST['myCheckboxes']);
			if($result){
				echo 'ture';
				}else{
					echo 'false';
					}
					
			}else{
				echo "false";
				}
			
			}
			
			
			
			public function Profile(){
					
					$this->LoginAllredy(true);
						
					$this->Customer="active";
		
		$this->CustomerLink='style="display: block"';
					
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js",
	 "js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/modernizr.min.js","js/detectizr.min.js","js/jquery.cookie.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		if(isset($_GET["GETiD"])){
			
		$CustomerName=$this->sql("SELECT * FROM `customer` WHERE `customer_code`=".$this->DBH->quote($_GET["GETiD"])."");

		$file=View."Customer/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			if($CustomerName){
			
		require_once($file);
			}else{
				header("Location: ./?error");
				}
		
		
		}else{
			header("Location: ./?error");
			}
		}else{
			header("Location: ./?error");
			}
					
					
					}
	
		/***************************************/
			
			
			public function Update(){
		
					$this->LoginAllredy(true);
					
					$this->Customer="active";
		
		$this->CustomerLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->updateFrom=$this->FromDesign("edit_from");
		if(isset($_GET["GETiD"])){
			
		$CustomerName=$this->sql("SELECT * FROM `customer` WHERE `customer_code`=".$this->DBH->quote($_GET["GETiD"])."");
		
		
		
		$file=View."Customer/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			if($CustomerName){
			
		require_once($file);
			}else{
				header("Location: ./?error");
				}
		
		
		}else{
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