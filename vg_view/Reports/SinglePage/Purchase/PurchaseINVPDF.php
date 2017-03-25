<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Purchase Invoice</title>
 <div id="printableArea" style="margin:center">
   <?php 
 
   $product_accounts=$this->sql("SELECT * FROM  `product_accounts` WHERE `osm_fulll_id`=".$this->DBH->quote($_GET['getID'])."");
   if(!$product_accounts){
	   exit();
	   }
	   $orderInfo=$this->sql("SELECT * FROM `product_osm_accounts` WHERE `osm_full_id`=".$this->DBH->quote($_GET['getID'])."");
  
 // var_dump( $orderInfo[0]);
   ?>

<table width="698" border="0">
  <tr>
    <td width="107" rowspan="3" align="center" valign="top" ><br />
      <img src="./img/logo.jpg" width="100" height="114" /></td>
    <td width="427"  align="center" valign="top"><h1 style="font-size:38px;">Solaiman Feeds Ltd</h1></td>
    <td width="150" rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000; padding:4px; font-size:18px;"><div style="margin-top:-75px;">Siraj Kandi Bazar, bhuapur, Tangail </div></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000;font-size:15px;"><div style="margin-top:-63px;">Mobile:01712-796563,01612-796563 <br />
      Email : solaimanfeedsltd@gmail.com</div></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="center"><strong>Purchase Report</strong></td>
  </tr>
  <tr>
    <td height="11" colspan="3" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="52%">Supplier Name:-
          <strong>
          <?php
	 
						 $SupplierName= $this->sql("SELECT * FROM  `vg_supplier` WHERE `id_supplier`=".$this->DBH->quote($orderInfo[0]['customer_supplier_id'])."");
						
						echo @$SupplierName[0]['name'];?>
          </strong></td>
        <td width="48%" align="right">Date:-<?php echo date("d-M-Y");?></td>
      </tr>
      <tr>
        <td>Address:   <?php echo @$SupplierName[0]['address'];?> </td>
        <td align="right"> Truck  No:<?php echo $orderInfo[0]['truck_no'];?></td>
      </tr>
      <tr>
        <td colspan="2">Phone:<?php echo @$SupplierName[0]['contact_number'];?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="64" colspan="3"><table border="1" cellspacing="0" cellpadding="0" width="100%">
      <tr>
        <td width="49" valign="top" bgcolor="#999999"><p><strong>Sl No</strong></p></td>
        <td width="133" valign="top" bgcolor="#999999"><p><strong> Product</strong></p></td>
        <td width="51" valign="top" bgcolor="#999999"><p><strong>Bag</strong></p></td>
        <td width="65" valign="top" bgcolor="#999999"><p><strong>Bag Size</strong></p></td>
        <td width="81" valign="top" bgcolor="#999999"><p><strong>Total Kg</strong></p></td>
        <td width="51" valign="top" bgcolor="#999999"><p><strong>Rate</strong></p></td>
        <td width="79" valign="top" bgcolor="#999999"><p><strong>Credit</strong></p></td>
        <td width="63" valign="top" bgcolor="#999999"><p><strong style="color:#FF0000;">Debit</strong></p></td>
        <td width="100" valign="top" bgcolor="#999999"><p><strong>Balance</strong></p></td>
        </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="7" valign="top"><strong>Previous Due Amount </strong></td>
        <td width="100" valign="top"><p><strong>
          <?php
		  
		$netAmountSupplier=$this->sql("	
SELECT IFNULL(SUM(`total_amount`-`payment_amount`),'0') AS 'netAmount' FROM `supplier_accounts` WHERE `supplier_id`=".$this->DBH->quote($orderInfo[0]['customer_supplier_id'])."  AND `ref_osm_full_id`!='".$orderInfo[0]['osm_full_id']."' AND `create_date` < '".$orderInfo[0]['create_date']."'");
		
		    $previousBlance=($SupplierName[0]['default_balance']+$netAmountSupplier[0]['netAmount']);
		  
		 echo @number_format($previousBlance,2);?>
        </strong></p></td>
        </tr>
      
      <?php
		$i=0;
		$stockBagT=0;
		$bagSizeT=0;
		$totalKGSUBT=0;
		$totalAmountBT=0;
			foreach($product_accounts as $productResult):
			$i++;
			
			?>  
      <tr>
        <td width="49" valign="top"><?php echo $i;?></td>
        <td width="133" valign="top"><?php $pdName= $this->sql("SELECT `pd_name` as pdname FROM  `product` WHERE `product_id`=".$this->DBH->quote($productResult['pd_id'])."");
				  echo $pdName[0]['pdname'];
				  
				  ?></td>
        <td width="51" valign="top"><?php
		 $stockBag= ($productResult['stock_bag']);
		 echo $stockBag;
		?></td>
        <td width="65" valign="top"><?php 
		$bagSize= ($productResult['bag_size']);
		echo $bagSize;
		?></td>
        <td width="81" valign="top"><?php echo $totalKGSUB=($stockBag*$bagSize);?></td>
        <td width="51" valign="top"><?php echo number_format($productResult['auto_sales_pursess_unit_price'],2);?></td>
        <td width="79" valign="top"><?php  $totalAmountB=($totalKGSUB*$productResult['auto_sales_pursess_unit_price']);
		echo  number_format($totalAmountB,2);
		
		
		?></td>
        <td width="63" valign="top"><p>-</p></td>
        <td width="100" valign="top"><?php echo number_format($totalAmountB,2);?></td>
        </tr>
      
      
      <?php
			  $stockBagT+=$stockBag; 
			   $bagSizeT+=$bagSize; 
			   $totalKGSUBT+=$totalKGSUB;
			   $totalAmountBT+=$totalAmountB;
			   endforeach;?>  
      <tr>
        <td valign="top"><p>&nbsp;</p></td>
        <td colspan="5" valign="top"><p><strong> Total</strong></p></td>
        <td valign="top"><p><strong><?php echo number_format($totalAmountBT,2);?></strong></p></td>
        <td width="63" valign="top"><p>&nbsp;</p></td>
        <td width="100" valign="top"><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td valign="top">&nbsp;</td>
        <td colspan="5" valign="top"><strong>Truk Fee</strong></td>
        <td width="79" valign="top"><strong><?php echo $orderInfo[0]['truck_rate'];?></strong></td>
        <td width="63" valign="top">&nbsp;</td>
        <td width="100" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><p>&nbsp;</p></td>
        <td valign="top"><p><strong>Grant Total</strong></p></td>
        <td valign="top"><p><strong><?php echo $stockBagT;?></strong></p></td>
        <td valign="top"><p><strong><?php echo $bagSizeT;?></strong></p></td>
        <td valign="top"><p><strong><?php echo $totalKGSUBT;?></strong></p></td>
        <td valign="top"><p><strong>&nbsp;</strong></p></td>
        <td valign="top"><p><strong><?php
		
		$totalCrAA=$totalAmountBT-$orderInfo[0]['truck_rate'];
		 echo number_format(($totalCrAA),2);?></strong></p></td>
        <td valign="top"><p><strong style="color:#FF0000;"><?php echo number_format($orderInfo[0]['payment_amount'],2);?></strong></p></td>
        <td valign="top"><p><strong><?php  $BBLX=(($totalCrAA-$orderInfo[0]['payment_amount'])+$previousBlance);
								echo number_format($BBLX,2)
		
		
		?></strong></p></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="90" colspan="3" align="center" valign="bottom">----------------------------------------------------------------------------------------------------------<br />
Supplier              Incharge        Manager                 Chairman            Managing Director </td>
  </tr>
</table>
</div><!--Result--> <script>
 window.print();
// window.close();
 </script>