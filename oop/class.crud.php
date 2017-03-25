<?php

class Crud  extends Connection{
	
	 function __construct() {
		 if(i_key!='solaimanfeedsltd@gmail.com'){exit();}
		 
		parent::  __construct();
	 }
	
	
	public function LoginAllredy($ck=false){
					session_start();
					if($ck){
					if(!isset($_SESSION["LoginStatus"])){
					header("Location: ./?User_Login");
						exit();
					}
					
					}else{
						
						if(isset($_SESSION["LoginStatus"])){
					header("Location: ./?User_Profile");
						exit();
					}
						
						}
				
				}
	
	
					/////////sql//////////////
				   public function sql($sql){
					
				   $stmt = $this->DBH->prepare($sql);
  					$stmt->execute();
					if($stmt->rowCount()>0){
						
					  return $stmt->fetchAll(PDO::FETCH_ASSOC);
					
					
						}else{
							
							return false;
							}
						
				   }
				   
				   /////delete//////
				   public function delete($table,$field=array(),$method=false)
					 {
						$field_key=array_keys($field);
						$countArry=count($field_key);
						if($method){
							
							if($method=="and"){
								
									$key_code="";
									$i=0;
									foreach($field_key as $key){
										$i++;
										$method= ($i==$countArry) ? (""): $method;
										$key_code.=$key."=:".$key." ".$method." ";
										}
								
								 $stmt = $this->DBH->prepare("DELETE FROM ".$table." WHERE ".$key_code."");
										
										foreach($field as $key=>$value):
									
											$stmt->bindparam(":".$key."",$field[$key]);
											
										endforeach;
								
								}else{
									
									$key_code="";
									$i=0;
									foreach($field_key as $key){
										$i++;
												
										$method= ($i==$countArry) ? (""): " OR ";
										$key_code.=$key."=:".$key." ".$method." ";
										}
								
									 $stmt = $this->DBH->prepare("DELETE FROM ".$table." WHERE ".$key_code."");
										
										foreach($field as $key=>$value):
											$stmt->bindparam(":".$key."",$field[$key]);
										endforeach;
									}
							}else{
							
								$stmt = $this->DBH->prepare("DELETE FROM ".$table." WHERE ".$field_key[0]."=:".$field_key[0]."");
								$stmt->bindparam(":".$field_key[0]."",$field[$field_key[0]]);
								}
						//$stmt->debugDumpParams();
								if($stmt->execute()){ return true;}else{ return  false;}
						
					 }
   
   				public function DeleteIn($table,$fileNme,$value=array()){
					
							$sql = "DELETE FROM ".$table." WHERE ".$fileNme." IN (".implode(',',$value).")";
							$stmt = $this->DBH->prepare($sql);
										if($stmt->execute()){ return true;}else{ return  false;}
										return false;

					}
					
					public function DeleteTemp($table,$fileNme,$value=array(),$setDelete){
					
							 $sql = "UPDATE  ".$table." SET ".$setDelete." WHERE ".$fileNme." IN (".implode(',',$value).")";
							$stmt = $this->DBH->prepare($sql);
										if($stmt->execute()){ return true;}else{ return  false;}
										return false;

					}
   
   
									public function insert($table, $fields = array()) {
										$keys   = array_keys($fields);
										$values = null;
										$x      = 1;
								
										foreach($fields as $value) {
											$values .= $this->DBH->quote($value);
											if($x < count($fields)) {
												$values .= ', ';
											}
											$x++;
										}
								
										$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
										$stmt = $this->DBH->prepare($sql);
										if($stmt->execute()){ return true;}else{ return  false;}
										return false;
									}
									
									
									public function updateData($table, $fields = array(),$where) {
									$keyValue="";
									$i=0;
									$sep=", ";
									foreach($fields as $keys=>$value):
									$i++;
										if($i==count($fields)){
											$sep="";
											}
										$keyValue.='`'.$keys.'` ='.$this->DBH->quote($value).$sep;		
											
									endforeach;
										
							        	  $sql="UPDATE {$table} SET  {$keyValue}  WHERE {$where}";
										$stmt = $this->DBH->prepare($sql);
										if($stmt->execute()){ return true;}else{ return  false;}
										return false;
									}
									
									
									
									
									public function UploadeIMG($fileName,$up_path,$newFileName,$update=false){
										
										// $ImageName = $_FILES[$fileName]['tmp_name'];
										
										if($_FILES[$fileName]['tmp_name']){
										if($update){
											 $imgesNameNew=$newFileName;	
											}else{
									 $imgesNameNew=$up_path . $newFileName.".".substr($_FILES[$fileName]["type"],6,10);	
											}
										  if ((($_FILES[$fileName]["type"] == "image/gif")
								|| ($_FILES[$fileName]["type"] == "image/jpeg")
								|| ($_FILES[$fileName]["type"] == "image/pjpeg")
								|| ($_FILES[$fileName]["type"] == "image/jpg")
								|| ($_FILES[$fileName]["type"] == "image/png"))){
							 $up=@move_uploaded_file($_FILES[$fileName]["tmp_name"],$imgesNameNew);
							 			if($up){
										return   $imgesNameNew;
											}else{
											 return  $up_path."default.png";
											}
									
									}}else{
										 return  $up_path."default.png";
										
										}
										
										
										}
									//$url="http://implodeit.com/api/plain?sender=".$sender."&SMSText=".$msg."&GSM=88".$mobile."&datacoding=8";	
						public 	function SMSAPI($mobile=false,$msg=false,$sender=false){
 $url="http://api.bulksms.icombd.com/api/v3/sendsms/plain?user=roktim&password=roktim&sender=".$sender."&SMSText=".urlencode($msg)."&GSM=88".$mobile."&datacoding=8 ";	
					
					//$string = file_get_contents($url); 
					
											
					$curl_handle=curl_init();
				  curl_setopt($curl_handle,CURLOPT_URL,$url);
				  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
				  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
				  $buffer = curl_exec($curl_handle);
				  curl_close($curl_handle);
				  if (empty($buffer)){
					  print "Nothing returned from url.";
				  }
				  else{
					  print $buffer;
				  }
						
							
							}
										
}
?>