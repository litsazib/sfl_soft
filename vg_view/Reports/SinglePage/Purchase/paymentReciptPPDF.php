<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Sales Invoice</title>
 <style type="text/css" media="print">
    @page 
    {
      
	
    }

    html
    {
        background-color: #FFFFFF;  
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 2px #FFFFFF ;
        margin: 5mm 1mm 5mm 1mm; /* margin you want for the content */
    }
    </style>
 <div id="printableArea" style="margin:center">
   
   <?php 
  
   $supplier_accounts=$this->sql("SELECT * FROM `supplier_accounts` WHERE `recipt_code`=".$this->DBH->quote($_GET['getID'])."");
   if(!$supplier_accounts){
	   exit();
	   }
   ?>
   

<table width="642" border="0">
  <tr>
    <td width="107" rowspan="3" align="center" valign="top" ><br />
      <img src="./img/logo.jpg" width="100" height="114" /></td>
    <td width="427"  align="center" valign="top"><h1 style="font-size:38px;">Solaiman Feeds Ltd</h1></td>
    <td width="79" rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="color:#000; padding:4px; font-size:18px;"><div style="margin-top:-75px;">Siraj Kandi Bazar, bhuapur, Tangail </div></td>
    </tr>
  <tr>
    <td align="center" valign="top" style="color:#000;font-size:15px;"><div style="margin-top:-63px;">Mobile:01712-796563,01612-796563 <br />
      Email : solaimanfeedsltd@gmail.com</div></td>
    </tr>
  <tr>
    <td height="10" colspan="3" align="center"><strong>Payment Recipt</strong></td>
  </tr>
  <tr>
    <td height="11" colspan="3" align="center"><table width="95%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="51%" height="24"><span class="width30">Supplier Name</span>:-<span class="width70">
        <?php
                   $vg_supplier=$this->sql("SELECT CONCAT('[ ',`supplier_code`,' ] ',`name`) AS 'name' FROM `vg_supplier` where id_supplier=".$this->DBH->quote($supplier_accounts[0]['supplier_id'])."");
							echo $vg_supplier[0]['name'];	
						?>
        </span></td>
        <td width="49%" align="right">Print Date:-<?php echo date("d-M-Y");?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="4" colspan="3"><span class="width30">Issue Date:<?php echo $supplier_accounts[0]['create_date'];?></span></td>
  </tr>
  <tr>
    <td height="5" colspan="3"><table width="100%" border="0">
      <tr>
        <td width="19%"><span class="width30">Reference #</span></td>
        <td width="40%"><span class="width70"><?php echo $supplier_accounts[0]['ref_osm_full_id'];?></span></td>
        <td width="21%">Dues Amounts</td>
        <td width="20%"><?php 
		
		$netAmountSupplier=$this->sql("SELECT SUM(`total_amount`-`payment_amount`) AS 'netAmount' FROM `report_supplier_accounts` WHERE `id_supplier`='".$supplier_accounts[0]['supplier_id']."'");
		
		$defaultBalance=$this->sql("SELECT SUM(`default_balance`) AS 'default_balance' FROM `vg_supplier` WHERE `id_supplier`='".$supplier_accounts[0]['supplier_id']."'");
								
		
		echo number_format((($netAmountSupplier[0]['netAmount']+$supplier_accounts[0]['payment_amount'])+$defaultBalance[0]['default_balance']),2);
		
		?></td>
      </tr>
      <tr>
        <td width="19%">Paying by *:</td>
        <td><span class="width70">
          <?php 
						
						if($supplier_accounts[0]['accounts_id']==3){
							echo "Cheque => ".$supplier_accounts[0]['bank_name']." => ".$supplier_accounts[0]['cheque_number'];
							}else{
								$acName=$this->sql("SELECT `accounts_name` FROM `accounts_name` WHERE `acc_id`=".$this->DBH->quote($supplier_accounts[0]['accounts_id'])."");
								echo $acName[0]['accounts_name'];
								}
						?>
        </span></td>
        <td>Pay Amounts</td>
        <td><span class="width70"><?php echo number_format($supplier_accounts[0]['payment_amount'],2);?></span></td>
        </tr>
      <tr>
        <td width="19%" height="21">Re.Mark</td>
        <td><span class="width70"><?php echo $supplier_accounts[0]['remarks'];?></span></td>
        <td><strong>Total Dues</strong></td>
        <td><strong><?php echo number_format($netAmountSupplier[0]['netAmount']+$defaultBalance[0]['default_balance'],2);?></strong></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="90" colspan="3" align="center" valign="bottom">----------------------------------------------------------------------------------------------------------<br />
      <span class="width30">Supplier</span>              Incharge        Manager                 Chairman            Managing Director </td>
  </tr>
</table>
</div><!--Result--> <script>
 window.print();
  //window.close();
 </script>
