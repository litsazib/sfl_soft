<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

define('BASE_URL', $root);
define('CLASS_Module','class/'); ///Folder Name
define('View','vg_view/');//View Foler
define('i_key','solaimanfeedsltd@gmail.com');

$bodyCalss=false;
require_once("oop/vg_utility.php");
require_once("oop/class.crud.php");


$key=array_keys($_GET);

if(isset($key[0])){
	$page_=explode("_",$key[0]);
	   $Page=$page_[0].'.php';
	  $GLOBALS['PageMethode']=@$page_[1];
		
	if(file_exists(CLASS_Module.$Page))	{
		
		
			require_once(CLASS_Module.$Page);
			
			if(method_exists($page_[0],$GLOBALS['PageMethode'])){
				 $Methode=new $page_[0]();
				 
				 $GLOBALS['PRIVATE_METHODE']=@$page_[0]; 

					$Methode->$GLOBALS['PageMethode']();//True Methode Call
									
				}else{
					require_once(CLASS_Module."Error.php");
					$Error=new Error();
					$Error->_404();
					
					}
					
					
			
		
		}else{
			require_once(CLASS_Module."Error.php");
			$Error=new Error();
			$Error->_404();
			
			}
	
	
	}else{
		
		header("Location: ./?User_Login");
		}


?>