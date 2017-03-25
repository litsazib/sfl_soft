<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Sales Invoice</title>
 <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 2px blue ;
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
    </style>
 <div id="printableArea" style="margin:center">
   <?php 
  
   $product_accounts=$this->sql("SELECT * FROM  `product_accounts` WHERE `osm_fulll_id`=".$this->DBH->quote($_GET['getID'])."");
   if(!$product_accounts){
	   exit();
	   }
	   $orderInfo=$this->sql("SELECT * FROM `product_osm_accounts` WHERE `osm_full_id`=".$this->DBH->quote($_GET['getID'])."");
  
 // var_dump( $orderInfo[0]);
   ?>

<table width="627" border="0">
  <tr>
    <td width="125" rowspan="3" align="center" valign="top" ><br />
      <img src="./img/logo.jpg" width="100" height="114" /></td>
    <td width="406"  align="center" valign="top"><h1 style="font-size:38px;">Solaiman Feeds Ltd</h1></td>
    <td width="82" rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000; padding:4px; font-size:18px;"><div style="margin-top:-35px;">Siraj Kandi Bazar, bhuapur, Tangail </div></td>
  </tr>
  <tr>
    <td height="43" align="center" valign="top" style="color:#000;font-size:15px;"><div style="margin-top:-18px;">Mobile:01712-796563,01612-796563 <br />
      Email : solaimanfeedsltd@gmail.com</div></td>
  </tr>
  <tr>
    <td height="10" colspan="3" align="center"><strong>Sales Report</strong></td>
  </tr>
  <tr>
    <td height="11" colspan="3" align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="54%">Customer Name:-
          <strong>
          <?php
	 
						 $customerName= $this->sql("SELECT * FROM  `customer` WHERE `customer_id`=".$this->DBH->quote($orderInfo[0]['customer_supplier_id'])."");
						
						echo @$customerName[0]['name'];?>
          </strong></td>
        <td width="46%" align="right"> Date:-<?php echo date("d-M-Y");?></td>
      </tr>
      <tr>
        <td>Address:   <?php echo @$customerName[0]['address'];?> </td>
        <td align="right"> Truck  No:<?php echo $orderInfo[0]['truck_no'];?></td>
      </tr>
      <tr>
        <td colspan="2">Phone:<?php echo @$customerName[0]['contact'];?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="64" colspan="3"><table border="1" cellspacing="0" cellpadding="0" width="100%">
      <tr>
        <td width="20" valign="top" bgcolor="#999999"><p><strong>Sl </strong></p></td>
        <td width="135" valign="top" bgcolor="#999999"><p><strong>Product</strong></p></td>
        <td width="37" valign="top" bgcolor="#999999"><p><strong>Bag</strong></p></td>
        <td width="63" valign="top" bgcolor="#999999"><p><strong>Bag Size</strong></p></td>
        <td width="63" valign="top" bgcolor="#999999"><p><strong>Total Kg</strong></p></td>
        <td width="55" valign="top" bgcolor="#999999"><p><strong>Rate</strong></p></td>
        <td width="80" valign="top" bgcolor="#999999"><p><strong>Credit</strong></p></td>
        <td width="72" valign="top" bgcolor="#999999"><p><strong style="color:#FF0000;">Debit</strong></p></td>
        <td width="91" valign="top" bgcolor="#999999"><p><strong>Balance</strong></p></td>
        </tr>
      <tr>
        <td valign="top"><p>&nbsp;</p></td>
        <td colspan="7" valign="top"><strong>Previous Amount due</strong></td>
        <td width="91" valign="top"><p>
          
          <strong>
          <?php
		$netAmountCustomer=$this->sql("	
SELECT IFNULL(SUM(`total_amount`-`payment_amount`),'0') AS 'netAmount' FROM `customer_accounts` WHERE `customer_id`=".$this->DBH->quote($orderInfo[0]['customer_supplier_id'])."  AND `ref_osm_full_id`!='".$orderInfo[0]['osm_full_id']."'");
		
		    $previousBlance=($customerName[0]['default_balance']+$netAmountCustomer[0]['netAmount']);
		  
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
        <td width="20" valign="top"><?php echo $i;?></td>
        <td width="135" valign="top"><?php $pdName= $this->sql("SELECT `pd_name` as pdname FROM  `product` WHERE `product_id`=".$this->DBH->quote($productResult['pd_id'])."");
				  echo $pdName[0]['pdname'];
				  
				  ?></td>
        <td width="37" valign="top"><?php
		 $stockBag= substr($productResult['stock_bag'],1);
		 echo $stockBag;
		?></td>
        <td width="63" valign="top"><?php 
		$bagSize= substr($productResult['bag_size'],1);
		echo $bagSize;
		?></td>
        <td width="63" valign="top"><?php echo $totalKGSUB=($stockBag*$bagSize);?></td>
        <td width="55" valign="top"><?php echo number_format($productResult['auto_sales_pursess_unit_price'],2)?></td>
        <td width="80" valign="top"><?php 
		 $totalAmountB=($totalKGSUB*$productResult['auto_sales_pursess_unit_price']);
		echo number_format($totalAmountB,2);
		 
		 ?></td>
        <td width="72" valign="top"><p style="color:#FF0000;">-</p></td>
        <td width="91" valign="top"><?php echo number_format($totalAmountB,2);?></td>
        </tr>
      
      
      <?php
			  $stockBagT+=$stockBag; 
			   $bagSizeT+=$bagSize; 
			   $totalKGSUBT+=$totalKGSUB;
			   $totalAmountBT+=$totalAmountB;
			   endforeach;?>  
      <tr>
        <td width="20" valign="top"><p>&nbsp;</p></td>
        <td colspan="5" valign="top"><p><strong> Total</strong></p></td>
        <td width="80" valign="top"><p><strong><?php echo number_format($totalAmountBT,2);?></strong></p></td>
        <td width="72" valign="top"><p>&nbsp;</p></td>
        <td width="91" valign="top"><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td width="20" valign="top">&nbsp;</td>
        <td colspan="5" valign="top"><strong>Truk Fee</strong></td>
        <td width="80" valign="top"><strong><?php echo number_format($orderInfo[0]['truck_rate'],2);?></strong></td>
        <td width="72" valign="top">&nbsp;</td>
        <td width="91" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><p>&nbsp;</p></td>
        <td valign="top"><p><strong>Grant Total</strong></p></td>
        <td valign="top"><p><strong><?php echo $stockBagT;?></strong></p></td>
        <td valign="top"><p><strong><?php echo $bagSizeT;?></strong></p></td>
        <td valign="top"><p><strong><?php echo $totalKGSUBT;?></strong></p></td>
        <td valign="top"><p><strong>&nbsp;</strong></p></td>
        <td valign="top"><p><strong>
          <?php
		
		$totalCrAA=$totalAmountBT-$orderInfo[0]['truck_rate'];
		 echo number_format(($totalCrAA),2);?>
          </strong></p></td>
        <td valign="top"><p><strong style="color:#FF0000;"><?php echo number_format($orderInfo[0]['payment_amount'],2);?></strong></p></td>
        <td valign="top"><p><strong><?php  $BBLX=(($totalCrAA-$orderInfo[0]['payment_amount'])+$previousBlance);
								echo number_format($BBLX,2)
		
		
		?></strong></p></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="90" colspan="3" align="center" valign="bottom">----------------------------------------------------------------------------------------------------------<br />
Customer              Incharge        Manager                 Chairman            Managing Director </td>
  </tr>
</table>
</div><!--Result--> <script>
 window.print();
  //window.close();
 </script>
