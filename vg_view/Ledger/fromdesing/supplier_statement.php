<div id="printableArea" style="margin:center">

<table width="76%" border="0" align="center" cellpadding="1" cellspacing="1">

  
  <tr>
    <td width="259" rowspan="3" valign="top" ><table width="234" border="4">
      <tr>
        <td height="104">&nbsp;</td>
      </tr>
    </table></td>
    <td width="377"  align="center" valign="top"><h2>Solaiman Feeds Ltd</h2></td>
    <td width="198" rowspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="18" align="center" valign="top">Siraj Kandi Bazar, bhuapur, Tangail </td>
  </tr>
  <tr>
    <td height="71" align="center" valign="top">Email : solaimanfeedsltd@gmail.com</td>
  </tr>
  <tr>
    <td height="21" colspan="3" align="left" valign="top">Report of <?php echo $date->format('M-Y');?> </td>
  </tr>
  <tr>
    <td height="6" colspan="3" align="left" valign="top">Supplier Name: </td>
  </tr>
  <tr>
    <td height="6" colspan="3" align="left" valign="top">Adress:</td>
  </tr>
  <tr>
    <td height="13" colspan="3" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
     
      <tr>
        <td width="74"></td>
        <td width="113"></td>
        <td width="160"></td>
        <td width="86"></td>
        <td width="72"></td>
        <td width="80"></td>
        <td width="72"></td>
        <td width="72"></td>
        <td width="91"></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td bgcolor="#999999"><strong>Date</strong></td>
        <td bgcolor="#999999"><strong>Discription</strong></td>
        <td bgcolor="#999999"><strong>Truck No</strong></td>
        <td align="right" bgcolor="#999999"><strong>Total Kg</strong></td>
        <td align="right" bgcolor="#999999"><strong>Rate</strong></td>
        <td align="right" bgcolor="#999999"><strong>Truck Fare</strong></td>
        <td align="right" bgcolor="#999999"><strong>Credit</strong></td>
        <td align="right" bgcolor="#999999"><strong>Debit </strong></td>
        <td align="right" bgcolor="#999999"><strong>Balance</strong></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        </tr>
        <?php 
		$squpplier_AC=$this->sql("SELECT * FROM `supplier_accounts` WHERE DATE_FORMAT(`create_date`,'%m/%d/%Y')=".$this->DBH->quote($searchDate)." AND `supplier_id`=".$this->DBH->quote($_POST['SupplierNmae'])." ORDER BY `create_date` DESC");
	if($squpplier_AC){
		foreach($squpplier_AC as $sup_accounts):
		$create = new DateTime($sup_accounts['create_date']);
		?>
      <tr>
        <td><?php echo $create->format('Y-m-d');?></td>
        <td><?php echo $sup_accounts['remarks'];?></td>
        <td><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
        <td align="right"><?php echo $sup_accounts['remarks'];?></td>
      </tr>
      <?php endforeach;
	  
	}
	  ?>
      
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">0</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right">12500</td>
        <td>&nbsp;</td>
        <td align="right">8000</td>
        <td align="right">384875</td>
        <td align="right">376875</td>
        <td align="right">0</td>
      </tr>
    </table></td>
  </tr>
</table>

</div>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
