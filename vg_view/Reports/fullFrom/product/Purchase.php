<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard" title="Go Dashboard">Reports</a> <span class="divider">/</span></li>
                <li class="active">Purchase Report</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Reports Purchase  List</h1> 
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
       	 <div class="contentinner" id="AfterDel">
            
       	   <form action="" method="post">
            <?php if(isset($_POST['fdate'])){
			   $fdate=$_POST['fdate'];
			   $Tadate=$_POST['Tadate'];
			   }else{
				    $fdate= date("m/d/Y");
			    $Tadate= date("m/d/Y");
				   }?>
           
           <h4 class="widgettitle"> Date: { <input id="FDate" type="text" name="fdate" value="<?php echo $fdate;?>" class="input-small" />  - <input id="tooDate" type="text" name="Tadate" value="<?php echo $Tadate;?>" class="input-small" />
           
           Supplier Name: <select class="form-control required supplier " id="supplierID" name="SupplierNmae" aria-required="true">
           
           
           <?php if(isset($_POST['SupplierNmae'])){
					
					 $sup=$this->sql("SELECT CONCAT('[ ',`supplier_code`,' ] ',`name`) AS 'name' FROM `vg_supplier` where id_supplier='".$_POST['SupplierNmae']."'");
					
					?>
                
                 <option value="<?php if($_POST['SupplierNmae']=="0"){echo "0";}else{echo $_POST['SupplierNmae'];}?>"><?php if($_POST['SupplierNmae']=="0"){echo "All Supplier";}else{echo $sup[0]['name'];}?></option>
                  <option value="0">All Supplier</option>
                  <?php }else{
					  ?>
                      <option value="0">All Supplier</option>
                      <?php
					  }?>
                      
                          
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
           
           } <input name="btnSerce" class="btn" value="Search" type="submit" /></h4>
           
           </form>
             <div id="result"></div>	
             <table width="100%" class="table table-bordered" id="dyntable">
                 <colgroup>
                     <col class="con0" style="align: center; width: 16%" />
                     <col class="con1" />
                     <col class="con0" />
                     <col class="con1" />
                     <col class="con0" />
                     <col class="con1" />
                 </colgroup>
                 <thead>
                     <tr>
                       	 <th width="166" class="head0">CODE</th>
                         <th width="115" class="head0">Total KG</th>
                         <th width="96" class="head1">Truck Fee</th>
                         <th width="161" class="head1">Sub Total Amount</th>
                         <th width="64" class="head1">Discount</th>
                         <th width="105" class="head1">Total Amount</th>
                         <th width="177" class="head1">Date</th>
                         <th width="191" class="head1">Action</th>
                     </tr>
                 </thead>
                 <tbody >
                    
                   <?php
					$totalKGN=0;
					$totalTrackRate=0;
					$totalSubt=0;
					$totalDiscount=0;
					$totalFinal=0;
                    	if($this->Purchase!=""){
						foreach($this->Purchase as $k=>$value){
							
							
							
					?>
                     <tr class="gradeX" >
                       <td><?php echo $this->Purchase[$k]['osm_full_id'];?></td>
                         <td><?php echo $this->Purchase[$k]['totla_kg'];?></td>
                         <td class="center"><?php echo $this->Purchase[$k]['truck_rate'];?></td>
                         <td class="center"><?php echo $this->Purchase[$k]['subtotal'];?></td>
                         <td class="center"><?php echo $this->Purchase[$k]['discount_amount'];?></td>
                         <td class="center"><?php echo $this->Purchase[$k]['final_amount'];?></td>
                         <td class="center"><?php echo $this->Purchase[$k]['create_date'];?></td>
                         <td class="center">
                         
                         <button type="button"  onclick="PurchaseDetails('<?php echo $this->Purchase[$k]['osm_full_id'];?>');"  class="btn detailsbtn"><i class="icon-screenshot"> </i> </button>
                         
                           <a  target="new" href="?SingelReport_PurchaseINVPDF&getID=<?php echo $this->Purchase[$k]['osm_full_id'];?>" class="btn">Print</a>
                         
                         </td>
                     </tr>
                       
                     <?php 
					 $totalKGN+=$this->Purchase[$k]['totla_kg'];
					 $totalTrackRate+=$this->Purchase[$k]['truck_rate'];
					 $totalSubt+=$this->Purchase[$k]['subtotal'];
					 $totalDiscount+=$this->Purchase[$k]['discount_amount'];
					 $totalFinal+=$this->Purchase[$k]['final_amount'];
						}}
						?>
                 </tbody>
                 <tfoot>
                     <tr>
                       	 <th width="166" class="head0">CODE</th>
                         <th width="115" class="head0" ><?php echo $totalKGN;?></th>
                         <th width="96" class="head1" style="text-align:center;"><span class="head0"><?php echo $totalTrackRate;?></span></th>
                         <th width="161" class="head1" style="text-align:center;"><span class="head0"><?php echo $totalSubt;?></span></th>
                         <th width="64" class="head1" style="text-align:center;"><span class="head0"><?php echo $totalDiscount;?></span></th>
                         <th width="105" class="head1" style="text-align:center;"><span class="head0"><?php echo $totalFinal;?></span></th>
                         <th width="177" class="head1">&nbsp;</th>
                         <th width="191" class="head1">&nbsp;</th>
                     </tr>
                 </tfoot>
             </table>
                
                
               
                
                
             <?php // print_r($this->vg_supplier);?>
               
               
           </div><!--contentinner-->
        </div>
       
        <!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
 	
    <script type="text/javascript">

	function PurchaseDetails(id){
		jQuery(function($){
			$('#result').load('<?php echo BASE_URL?>?SingelReport_PurchasePDinv&getID='+id+' #resultt');
			});
		
		
		}
		
			

</script>

 
  <script type="text/javascript">
			jQuery.noConflict();

				 jQuery(function($){
					 $( "#FDate" ).datepicker();
					  $( "#tooDate" ).datepicker();
					 
		 });
    
    
    </script> 
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>


