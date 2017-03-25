<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");
	
	error_reporting(0);
	?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard" title="Go Dashboard">Ledger</a> <span class="divider">/</span></li>
                <li class="active">Supplier Ledger Report</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Reports Supplier Ledger  List</h1> 
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
       	 <div class="contentinner">
            
       	   <form action="" method="post">
           
           <h4 class="widgettitle">Supplier Name { 
       	     <select class="form-control required supplier " id="supplierID" name="SupplierNmae" aria-required="true">
       	       <option value="0">Please Select Supplier</option>
       	       <?php
                                $res=$this->sql("SELECT `id_supplier`,CONCAT('[ ',`supplier_code`,' ] ',`name`) AS 'name' FROM `vg_supplier`");
								
								  foreach($res as $value){
									  ?>
       	       <option value="<?php  echo ($value['id_supplier']);?>">
       	         <?php  echo ($value['name']);?>
   	           </option>
       	       <?php
								  }
								  ?>
   	         </select>
} Date: { <input id="datepicker" type="text" name="date" value="<?php echo date("m/d/Y");?>" class="input-small" /> } <input name="btnSerce" class="btn" value="Search" type="submit" /></h4>
           
           </form>
            	
             
             
             
             <?php
             
			 if(isset($_POST['SupplierNmae']) && $_POST['SupplierNmae']!="0"){
				 
				  $searchDate=$_POST['date'];
				 
				 $date = new DateTime($searchDate);
                  $new_date_format = $date->format('Y-m-d');
				
			?>
            <?php
if(count($_POST)>0){
	
	 if(isset($_POST['SupplierNmae']) && $_POST['SupplierNmae']!="0"){
				 
				  $searchDate=$_POST['date'];
				 
				 $date = new DateTime($searchDate);
                  $new_date_format = $date->format('Y-m-d');
				  
				   $sqlData="SELECT
    `vg_supplier`.`id_supplier`
    , `vg_supplier`.`name`
	, `vg_supplier`.`default_balance`
    , `vg_supplier`.`address`
    , `supplier_accounts`.`recipt_code`
    , `supplier_accounts`.`supplier_id`
    , `supplier_accounts`.`reperence_status`
    , `supplier_accounts`.`ref_osm_full_id`
    , `supplier_accounts`.`total_amount`
    , `supplier_accounts`.`payment_amount`
    , `supplier_accounts`.`net_blance`
    , `supplier_accounts`.`create_date`
    , `supplier_accounts`.`accounts_id`
    , `supplier_accounts`.`bank_name`
    , `supplier_accounts`.`cheque_number`
    , `supplier_accounts`.`bkash_trans_id`
    , `supplier_accounts`.`remarks`
FROM
    `supplier_accounts`
    INNER JOIN `vg_supplier` 
        ON (`supplier_accounts`.`supplier_id` = `vg_supplier`.`id_supplier`) 
        WHERE  `supplier_accounts`.`supplier_id`='".$_POST['SupplierNmae']."' AND DATE_FORMAT(`supplier_accounts`.`create_date`,'%Y-%m')='".$date->format('Y-m')."'
        ORDER BY `supplier_accounts`.`create_date` ASC";
	}else{
	echo "<script>window.close();</script>";
	}	
		
	$squpplier_AC=$this->sql($sqlData);			  
				  
?>


<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td width="185" rowspan="3" align="center" valign="top" ><br><img src="./img/logo.jpg" width="100" height="114" /></td>
    <td width="348"  align="center" valign="top"><h1 style="font-size:38px;">Solaiman Feeds Ltd</h1></td>
    <td width="112" rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000; padding:4px; font-size:18px;">Siraj Kandi Bazar, bhuapur, Tangail </td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000;font-size:15px;">Mobile:01712-796563,01612-796563 <br> Email : solaimanfeedsltd@gmail.com</td>
  </tr>
  <tr>
    <td height="21" colspan="3" align="left" valign="top">Report of <?php echo $date->format('M-Y');?></td>
  </tr>
  <tr>
    <td height="6" colspan="3" align="left" valign="top">Supplier Name: <?php echo $squpplier_AC[0]['name'];?></td>
  </tr>
  <tr>
    <td height="2" colspan="3" align="left" valign="top">Adress: <?php echo $squpplier_AC[0]['address'];?></td>
  </tr>
  <tr>
    <td height="3" colspan="3" align="left" valign="top"><strong>Opening Balance: <?php echo $squpplier_AC[0]['default_balance'];?></strong></td>
  </tr>
  <tr>
    <td height="13" colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr style="background-color:#CCC;">
        <td width="61" height="21" ><strong>Date</strong></td>
        <td width="128" ><strong>Discription</strong></td>
        <td width="79" ><strong>Truck No</strong></td>
        <td width="50" align="right" ><strong>Rate</strong></td>
        <td width="80" align="right" ><strong>Total Kg</strong></td>
        <td width="71" align="right" ><strong>Credit</strong></td>
        <td width="71" align="right"><strong>Debit </strong></td>
        <td width="93" align="right" ><strong>Balance</strong></td>
      </tr>
      
      <?php 
		
	if(!$squpplier_AC){
		echo "<script>window.close();</script>";
		 }
		
		$totalBalnce=0;
		$debid=0;
		$Credit=0;
		$VtotalRate=0;
		$VtotalKG=0;
		foreach($squpplier_AC as $sup_accounts):
		$create = new DateTime($sup_accounts['create_date']);
		
		
		if($sup_accounts['reperence_status']=="Purchase"){
			
			
	$productORder=$this->sql("SELECT `truck_no`,truck_rate,totla_kg FROM product_osm_accounts where `osm_full_id`='".$sup_accounts['ref_osm_full_id']."'");
			$trackNo=$productORder[0]['truck_no'];
			$totalKG=$productORder[0]['totla_kg'];
			$totlRate=$productORder[0]['truck_rate'];
			}else{
				
				$acName=$this->sql("SELECT `accounts_name` FROM accounts_name where `acc_id`='".$sup_accounts['accounts_id']."'");
				$trackNo="Payment By: ".$acName[0]['accounts_name'];
				$totalKG="0.00";
				$totlRate="0.00";
				}
		
		
		?>
      <tr>
        <td><?php echo $create->format('Y-m-d');?></td>
        <td><?php echo $sup_accounts['ref_osm_full_id'].". ".$sup_accounts['reperence_status'];?></td>
        <td><?php echo $trackNo;?></td>
        <td align="right"><?php echo $totlRate;?></td>
        <td align="right"><?php echo $totalKG;?></td>
        <td align="right"><?php echo $sup_accounts['total_amount'];?></td>
        <td align="right"><?php echo $sup_accounts['payment_amount'];?></td>
        <td align="right"><?php echo $balance=($sup_accounts['total_amount']-$sup_accounts['payment_amount']);?></td>
      </tr>
      <?php 
	  $totalBalnce+=$balance;
	  $debid+=$sup_accounts['payment_amount'];
	  $Credit+=$sup_accounts['total_amount'];
	  $VtotalRate+=$totlRate;
	  $VtotalKG+=$totalKG;
	  endforeach;
	  
	}
	
	
	  ?>
      <tr>
        <td colspan="3" align="right"><strong>Total</strong></td>
        <td align="right"><strong><?php echo number_format($VtotalRate,2);?></strong></td>
        <td align="right"><strong><?php echo number_format($VtotalKG,2);?></strong></td>
        <td align="right"><strong><?php echo number_format($Credit,2);?></strong></td>
        <td align="right"><strong><?php echo number_format($debid,2);?></strong></td>
        <td align="right"><strong><?php echo number_format($totalBalnce,2);?></strong></td>
      </tr>
      <tr>
        <td colspan="7" align="right"><strong>Opening Balance: </strong></td>
        <td align="right"><strong><?php echo $squpplier_AC[0]['default_balance'];?></strong></td>
      </tr>
      <tr>
        <td colspan="7" align="right"><strong>Grant Total</strong></td>
        <td align="right"><strong><?php echo ($squpplier_AC[0]['default_balance']+$totalBalnce) ?></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
           <form action="./?Ledger_SupplierPrint" target="_blank" method="post">
           <p align="right"><input type="submit" class="btn" value="Print" /></p>
           <input type="hidden" value="<?php echo $_POST['SupplierNmae'];?>" name="SupplierNmae" />
            <input type="hidden" value="<?php echo $_POST['date'];?>" name="date" />
           
           </form>   
            
            
          <?php 
			
			 
			 }else{
				 echo "<h2>Please Select Supplier and Date....</h2>";
				 }
			 
			 ?>
             
             
                
                
               
                
                
             <?php // print_r($this->vg_supplier);?>
               
               
           </div><!--contentinner-->
        </div>
       
        <!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
 	
   
		
	
   
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>

