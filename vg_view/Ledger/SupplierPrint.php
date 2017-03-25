<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ledger</title>
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
    <td rowspan="3" align="center" valign="top" ><br />
      <img src="./img/logo.jpg" width="100" height="114" /></td>
    <td  align="center" valign="top"><h1 style="font-size:38px;">Solaiman Feeds Ltd</h1></td>
    <td rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000; padding:4px; font-size:18px;"><div style="margin-top:-35px;">Siraj Kandi Bazar, bhuapur, Tangail </div></td>
  </tr>
  <tr>
    <td height="43" align="center" valign="top" style="color:#000;font-size:15px;"><div style="margin-top:-18px;">Mobile:01712-796563,01612-796563 <br />
      Email : solaimanfeedsltd@gmail.com</div></td>
  </tr>
  <tr>
    <td width="645" height="21" colspan="3" align="left" valign="top">Report of <?php echo $date->format('M-Y');?></td>
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
		error_reporting(0);
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

 <script>
 window.print();
 // window.close();
 </script>