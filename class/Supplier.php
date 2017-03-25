<?php
class Supplier extends Crud{
	
	
	public function ActionReg(){
		
					$this->LoginAllredy(true);
					
					
		////////////******************************/////////////////////
		
		if(isset($_POST["supplier_code"])!="" && isset($_POST["name"])!=""){
					
						///////////////////Check
					$check=$this->sql("SELECT * FROM `vg_supplier` WHERE `supplier_code`=".$this->DBH->quote($_POST["supplier_code"])."");
					
						////////////////////////////////////
				if(!$check):
				
				
				
				//print_r($_POST);
				
				  $result=$this->insert("vg_supplier",array("supplier_code"=>$_POST['supplier_code'],
				  "name"=>$_POST['name'],
				  "address"=>$_POST['address'],
				  "email_"=>$_POST['email'],
				   "contact_number"=>$_POST['contact'],
				   "company_name"=>$_POST['company_name'],
				   "default_balance"=>$_POST['default_balance'],
				  "images_up"=>$this->UploadeIMG('images_up',"./upload_image/SUPPLIER/",$_POST['sec_id'])
				  ));
				  
				header("Location: ./?Supplier_Profile&GETiD=".$_POST['supplier_code']."");
						exit();
					endif;
				  
				  
				}else{
						header("Location: ./?error");
						exit();
					}
				
		
		}
			
	public function AllSupplier(){
		
					$this->LoginAllredy(true);
					
					
					$this->Supplier="active";
		
		$this->SupplierLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			$this->vg_supplier=$this->sql("SELECT `id_supplier`,supplier_code,`name`,`address`,`email_`,`contact_number`,DATE_FORMAT(`date_add`,'%Y-%M-%D') AS 'joindate',`active` FROM `vg_supplier` ORDER BY `id_supplier` DESC");
		
		$file=View."Supplier/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		///*********************************************
		public function supplierDelete(){
			
			$result=$this->DeleteIn('vg_supplier','id_supplier',$_POST['myCheckboxes']);
			if($result){
				echo 'ture';
				}else{
					echo 'false';
					}
			
			}
			
			
			/***************************************/
			
			public function FromDesign($file=false){
			if($file){
				
			return View."Supplier/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
			
			/***************************************/
			
			
			public function Registration(){
		
					$this->LoginAllredy(true);
					
					$this->Supplier="active";
		
		$this->SupplierLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("reg_from");
		
		
		$file=View."Supplier/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
	
	
	
	public function Profile(){
					
					$this->LoginAllredy(true);
						
					$this->Supplier="active";
		
		$this->SupplierLink='style="display: block"';
					
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js",
	 "js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/modernizr.min.js","js/detectizr.min.js","js/jquery.cookie.js","js/custom.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		if(isset($_GET["GETiD"])){
			
		$supplierName=$this->sql("SELECT * FROM `vg_supplier` WHERE `supplier_code`=".$this->DBH->quote($_GET["GETiD"])."");
		
		
		
		$file=View."Supplier/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			if($supplierName){
			
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
					
					$this->Supplier="active";
		
		$this->SupplierLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->updateFrom=$this->FromDesign("edit_from");
		if(isset($_GET["GETiD"])){
			
		$supplierName=$this->sql("SELECT * FROM `vg_supplier` WHERE `supplier_code`=".$this->DBH->quote($_GET["GETiD"])."");
		
		
		
		$file=View."Supplier/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			if($supplierName){
			
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