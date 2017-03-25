<?php
class ManageProduct extends Crud{
	function __construct() {
		parent::  __construct();
		
		
	 }
	
	
		public function Product(){
		
					$this->LoginAllredy(true);
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
			$this->productData=$this->sql("SELECT `product_id`,`pd_code`,`pd_name`,`cat_name`,`sub_cat_name`,`pd_type`,`status`,DATE_FORMAT(`reg_date`,'%Y-%M-%D') AS 'joindate' FROM `product_view` WHERE `status`!='Delete' ORDER BY product_id DESC");
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
	
				public function productTempDelete(){
			
			$result=$this->DeleteIn('product','product_id',$_POST['myCheckboxes']);
			if($result){
				echo 'ture';
				}else{
					echo 'false';
					}
			
			}
				
				
				
				///////////////////////////////Catagory
				public function Catagory(){
		
					$this->LoginAllredy(true);
					
					
								
					
											
											$this->ManageProduct="active";
								
								$this->ManageProductLink='style="display: block"';
								
								$css_header=array("css/style.default.css","prettify/prettify.css");
							  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
								
								 $this->title=get_class($this).".:.".__FUNCTION__;
								 $bodyCalss=true;
								////////////******************************/////////////////////
									$this->catagory=$this->sql("SELECT `id_catagory`,`cat_code`,`cat_name`,DATE_FORMAT(`reg_date`,'%Y-%M-%D') AS 'joindate',status FROM `catagory` WHERE `status`!='Delete' ORDER BY `id_catagory` DESC");
								
								$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
								if(file_exists($file)){
									
									require_once($file);
									
									}else{
										header("Location: ./?error");
										}
								
								
								
								///////////*******************************/////////////////////
								$css_footer=array();
								$js_footer=array();
					
		
		}
	
				public function catagoryTempDelete(){
			
			$result=$this->DeleteIn('catagory','id_catagory',$_POST['myCheckboxes']);
			$result=$this->DeleteIn('catagory_sub','id_sub_catagory',$_POST['myCheckboxes']);
					
			if($result){
				echo 'ture';
				}else{
					echo 'false';
					}
			
			}
				//////////////eND 
				
				
				///////////////////////////////Catagory
				public function subCatagory(){
		
					$this->LoginAllredy(true);
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css");
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/jquery.dataTables.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.alerts.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
			$this->catagory_sub=$this->sql("SELECT `id_sub_catagory`,sub_cat_code,`cat_name`, `sub_cat_name`,`status`,DATE_FORMAT(`reg_date`,'%Y-%M-%D') AS 'joindate' FROM `sub_catagory_view` WHERE `status`!='Delete' ORDER BY `id_sub_catagory` DESC");
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
			
			require_once($file);
			
			}else{
				header("Location: ./?error");
				}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
	
				public function subcatagoryTempDelete(){
			
			$result=$this->DeleteIn('catagory_sub','id_sub_catagory',$_POST['myCheckboxes']);
					
			if($result){
				echo 'ture';
				}else{
					echo 'false';
					}
			
			}
				//////////////eND 
				
				public function FromDesign($file=false){
			if($file){
				
			return View."ManageProduct/Product/fromdesign/".$file.".php";
			
			}else{
				return false;
				}
			
			}
				
				public function pdRegistration(){
		
					$this->LoginAllredy(true);
					
					
					if ($_SERVER['REQUEST_METHOD'] === 'POST'){
										if(isset($_POST["pd_code"])!="" && isset($_POST["pd_name"])!=""){
											$check=$this->sql("SELECT * FROM `product` WHERE `pd_code`=".$this->DBH->quote($_POST["pd_code"])."");
											
												if(!$check):
												  $result=$this->insert("product",array("pd_code"=>$_POST['pd_code'],
												  "pd_name"=>$_POST['pd_name'],'catagory_id'=>$_POST['catagory_id'],
												  'sub_catagory_id'=>$_POST['sub_catagory_id'],
												  'pd_type'=>$_POST['pd_type']));
												if($result){
													echo 'true';
													}else{
														echo  'false';
														
													}
													else:
													echo 'current';
													endif;
											
											}
										
										
										exit(0);
									}
									
					
					
					
					
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.uniform.min.js","js/jquery.validate.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/forms.js","js/jquery.jgrowl.js","jquery-radiobutton-2.0");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("pd_reg_from");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		
		public function PDUpdate(){
		
					$this->LoginAllredy(true);
					
				
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.uniform.min.js","js/jquery.validate.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/forms.js","js/jquery.jgrowl.js","jquery-radiobutton-2.0");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
	if(!isset($_GET["GETiD"])){
		header("Location: ./?error");
		exit();
		}
		
		$this->pdUpdatedata=$this->FromDesign("pd_reg_from_edit");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
			$pdINFO=$this->sql("SELECT * FROM `product` WHERE `product_id`=".$this->DBH->quote($_GET["GETiD"])."");
			if($pdINFO){
			
		require_once($file);
			}else{
				echo "<h1>Product Not Founded</h1>";
				}
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		
		
		
		
		
		
		
		public function cataRegistration(){
		
					$this->LoginAllredy(true);
					
					
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
										if(isset($_POST["CatagoryCode"])!="" && isset($_POST["CatagoryNme"])!=""){
											$check=$this->sql("SELECT * FROM `catagory` WHERE `cat_code`=".$this->DBH->quote($_POST["CatagoryCode"])."");
											
												if(!$check):
												  $result=$this->insert("catagory",array("cat_code"=>$_POST['CatagoryCode'],
												  "cat_name"=>$_POST['CatagoryNme'] ));
												if($result){
													echo 'true';
													}else{
														echo  'false';
														
													}
													else:
													echo 'current';
													endif;
											
											}
										
										
										exit(0);
									}
									
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("cata_reg_from");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		
		public function catagoryUpdate(){
		
					$this->LoginAllredy(true);
					
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css",);
	  $js_heaser=array("js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.uniform.min.js","js/modernizr.min.js","js/detectizr.min.js","prettify/prettify.js","js/jquery.cookie.js","js/custom.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->catagoryUpdate=$this->FromDesign("cata_reg_from _edit");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
		$cataGoryInfo=$this->sql("SELECT * FROM `catagory` WHERE `id_catagory`=".$this->DBH->quote($_GET["GETiD"])."");
			if($cataGoryInfo){
			
		require_once($file);
			}else{
				echo "<h1>Catagory Not Founded</h1>";
				}
		}else{
			header("Location: ./?error");
			}
		
		
		
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		
		public function SubcataRegistration(){
		
					$this->LoginAllredy(true);
					
					
					if ($_SERVER['REQUEST_METHOD'] === 'POST'){
						
										if(isset($_POST["subCatarCode"])!="" && isset($_POST["sub_cat_name"])!=""){
											$check=$this->sql("SELECT * FROM `catagory_sub` WHERE `sub_cat_code`=".$this->DBH->quote($_POST["subCatarCode"])."");
											
												if(!$check):
												  $result=$this->insert("catagory_sub",array("sub_cat_code"=>$_POST['subCatarCode'],
												  "sub_cat_name"=>$_POST['sub_cat_name'],
												  "catagory_id"=>$_POST['catagory_id']
												   ));
												if($result){
													echo 'true';
													}else{
														echo  'false';
														
													}
													else:
													echo 'current';
													endif;
											
											}
										
										
										exit(0);
									}
					
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.uniform.min.js","js/jquery.validate.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/forms.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("Subcata_reg_from");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
		require_once($file);
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		public function SubcataUpdate(){
		
					$this->LoginAllredy(true);
					
					
					
					
					
					$this->ManageProduct="active";
		
		$this->ManageProductLink='style="display: block"';
		
		$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css");
	  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/bootstrap-fileupload.min.js","js/bootstrap-timepicker.min.js","js/jquery.uniform.min.js","js/jquery.validate.min.js","js/jquery.tagsinput.min.js","js/jquery.autogrow-textarea.js","js/charCount.js","js/ui.spinner.min.js","js/chosen.jquery.min.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/forms.js","js/jquery.jgrowl.js");
		
		 $this->title=get_class($this).".:.".__FUNCTION__;
		 $bodyCalss=true;
		////////////******************************/////////////////////
		
		$this->registationFrom=$this->FromDesign("Subcata_reg_from_edit");
		
		
		$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
		if(file_exists($file)){
		$ScataGoryInfo=$this->sql("SELECT * FROM `catagory_sub` WHERE `id_sub_catagory`=".$this->DBH->quote($_GET["GETiD"])."");
			if($ScataGoryInfo){
			
		require_once($file);
			}else{
				echo "<h1>Catagory Not Founded</h1>";
				}
		}else{
			header("Location: ./?error");
			}
				
		///////////*******************************/////////////////////
		$css_footer=array();
		$js_footer=array();
					
		
		}
		
		
		
		
		
						public function ManageProduct(){
						
									$this->LoginAllredy(true);
									
									
									if ($_SERVER['REQUEST_METHOD'] === 'POST'){
									if(isset($_POST["Message"])!="" && isset($_POST["osm_content_code"])!="" && isset($_POST["osm_id"])!=""){
	$check=$this->sql("SELECT * FROM `product_accounts` WHERE `osm_content_code`=".$this->DBH->quote($_POST["osm_content_code"])." and `osm_id`=".$this->DBH->quote($_POST["osm_id"])."");
														
														if(!$check){
															$i=0;	
															
															
															foreach($_POST["pd_id"] as $k=>$productId){
if(($productId!='0') && (($_POST['KG'][$k]!=null && $_POST['KG'][$k]!="0") || ($_POST['bagSize'][$k]!=null && $_POST['bagSize'][$k]!="0") || ($_POST['bagUnitNumber'][$k]!=null && $_POST['bagUnitNumber'][$k]!="0"))){
					
					if($_POST['MangeStatus'][$k]=="0"){$manageSing="-";}else{$manageSing="";}		
					
					$this->insert("product_accounts",array("pd_id"=>$productId,
												  "osm_content_code"=>$_POST["osm_content_code"],
												  "osm_id"=>$_POST['osm_id'],
												  "osm_fulll_id"=>$_POST["osm_content_code"].$_POST["osm_id"],
												  "stock_kg"=>$manageSing.$_POST['KG'][$k],
												  "stock_bag"=>$manageSing.$_POST['bagUnitNumber'][$k],
												  "bag_size"=>$manageSing.$_POST['bagSize'][$k],
												  "total_kg"=>$manageSing.($_POST['KG'][$k]+($_POST['bagSize'][$k]*$_POST['bagUnitNumber'][$k])),
												  "nots"=>$_POST['Message'],
												  "insert_id"=>$_SESSION['LoginStatus'][0]['id_employee']
												  
												   ));
												   
												   $i++;
																}//end IF
																
																}//foreach										
															
															if($i>0){
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
													
									
									
									
									
									
									
									$this->ManageProduct="active";
						
						$this->ManageProductLink='style="display: block"';
						
						$css_header=array("css/style.default.css","prettify/prettify.css","css/bootstrap-fileupload.min.css","css/bootstrap-timepicker.min.css","css/chosen.css");
					  $js_heaser=array("prettify/prettify.js","js/jquery-1.9.1.min.js","js/jquery-migrate-1.1.1.min.js","js/jquery-ui-1.9.2.min.js","js/bootstrap.min.js","js/jquery.tagsinput.min.js","js/ui.spinner.min.js","js/chosen.jquery.js","js/jquery.cookie.js","js/modernizr.min.js","js/detectizr.min.js","js/custom.js","js/jquery.jgrowl.js","js/jquery.alerts.js");
						
						 $this->title=get_class($this).".:.".__FUNCTION__;
						 $bodyCalss=true;
						////////////******************************/////////////////////
						
						$this->manageProductInvoice=$this->FromDesign("manageProductInvoice");
						
						
						$file=View."ManageProduct/Product/".__FUNCTION__.'.php';
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