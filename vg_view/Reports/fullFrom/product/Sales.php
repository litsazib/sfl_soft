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
                <li class="active">Sales Report</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Reports Sales  List</h1> <span>This is a sample description for  Reports Sales  List page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
       	 <div class="contentinner" id="AfterDel">
            
       	  <form action="" method="post" enctype="multipart/form-data">
           <?php if(isset($_POST['fdate'])){
			   $fdate=$_POST['fdate'];
			   $Tadate=$_POST['Tadate'];
			   }else{
				    $fdate= date("m/d/Y");
			    $Tadate= date("m/d/Y");
				   }?>
           
           <h4 class="widgettitle"> Date: { <input id="FDate" type="text" name="fdate" value="<?php echo $fdate;?>" class="input-small" />  - <input id="tooDate" type="text" name="Tadate" value="<?php echo $Tadate;?>" class="input-small" />
           
           Customer Name: <select class="form-control required Customer " id="Customer" name="Customer" aria-required="true">
           
           
           <?php 
		   
		  
		   if(isset($_POST['Customer'])){
					
					
$cus=$this->sql("SELECT CONCAT('[ ',`customer_code`,' ] ',`name`) AS 'name' FROM `customer` where customer_id='".$_POST['Customer']."'");
					
					?>
                
                 <option value="<?php if($_POST['Customer']=="0"){echo "0";}else{echo $_POST['Customer'];}?>"><?php if($_POST['Customer']=="0"){echo "All Customer";}else{echo $cus[0]['name'];}?></option>
                  <option value="0">All Customer</option>
                  <?php }else{
					  ?>
                      <option value="0">All Customer</option>
                      <?php
					  }?>
                      
                          
                          <?php
                                $res=$this->sql("SELECT `customer_id`,CONCAT('[ ',`customer_code`,' ] ',`name`) AS 'name' FROM `customer`");
								
								  foreach($res as $value){
									  ?>
                          <option value="<?php  echo ($value['customer_id']);?>">
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
                       	 <th width="164" class="head0">CODE</th>
                         <th width="113" class="head0">Total KG</th>
                         <th width="143" class="head1">Truck Fee</th>
                         <th width="181" class="head1">Sub Total Amount</th>
                         <th width="61" class="head1">Discount</th>
                         <th width="100" class="head1">Total Amount</th>
                         <th width="194" class="head1">Date</th>
                         <th width="291" class="head1">Action</th>
                     </tr>
                 </thead>
                 <tbody >
                    
                   <?php
					
                    	if($this->Sales!=""){
						foreach($this->Sales as $k=>$value){
							
							
							
					?>
                     <tr class="gradeX" >
                       <td><?php echo $this->Sales[$k]['osm_full_id'];?></td>
                       <td><?php echo $this->Sales[$k]['totla_kg'];?></td>
                       <td class="center"><?php echo $this->Sales[$k]['truck_rate'];?></td>
                       <td class="center"><?php echo $this->Sales[$k]['subtotal'];?></td>
                       <td class="center"><?php echo $this->Sales[$k]['discount_amount'];?></td>
                       <td class="center"><?php echo $this->Sales[$k]['final_amount'];?></td>
                         <td class="center"><?php echo $this->Sales[$k]['create_date'];?></td>
                         <td class="center">
                         
                         <button type="button"  onclick="PurchaseDetails('<?php echo $this->Sales[$k]['osm_full_id'];?>');"  class="btn detailsbtn"><i class="icon-screenshot"> </i> </button>
                         
                         <a  target="new" href="?SingelReport_salesINVPDF&getID=<?php echo $this->Sales[$k]['osm_full_id'];?>" class="btn">Print</a>
                         
                         
                         
                          <a  href="?Sales_SalesUPdate&getID=<?php echo $this->Sales[$k]['osm_full_id'];?>" class="btn">Update</a>
                         
                         </td>
                     </tr>
                       
                     <?php 
						}}
						?>
                 </tbody>
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
			$('#result').load('<?php echo BASE_URL?>?SingelReport_SalesPDinv&getID='+id+' #resultt');
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


