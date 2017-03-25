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
                <li class="active">Customer Accounts</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Reports Customer Accounts </h1> <span>This is a sample description for  Reports Customer Accounts page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
       	 <div class="contentinner" id="AfterDel">
            
       	   <h4 class="widgettitle">Dynamic Customer Accounts Table {  }</h4>
            	
              <div id="result"></div>   
                
             <table class="table table-bordered" id="dyntable">
                 <colgroup>
                     <col class="con0" style="align: center; width: 15%" />
                     <col class="con1" />
                     <col class="con0" />
                     <col class="con1" />
                     <col class="con0" />
                     <col class="con1" />
                 </colgroup>
                 <thead>
                     <tr>
                       	 <th class="head0"> Code</th>
                         <th class="head1"> Name </th>
                         <th class="head0">Total Amount</th>
                         <th class="head1">Total Payment</th>
                         <th class="head1">Net Blance</th>
                         <th class="head1">Action</th>
                     </tr>
                 </thead>
                 <tbody >
                    
                   <?php
					
                    	if($this->CustomerAC!=""){
						foreach($this->CustomerAC as $k=>$value){
							
						 $defaultBalance=$this->sql("SELECT SUM(`default_balance`) AS 'defaultblance' FROM `customer` WHERE `customer_id`='".$this->CustomerAC[$k]['customer_id']."'");	
							
					?>
                     <tr class="gradeX" >
                       <td>CUS00<?php echo $this->CustomerAC[$k]['customer_code'];?></td>
                         <td><?php echo $this->CustomerAC[$k]['name'];?></td>
                         <td><?php echo number_format(($defaultBalance[0]['defaultblance']+$this->CustomerAC[$k]['total_amount']),2);?></td>
                         <td class="center"><?php echo number_format($this->CustomerAC[$k]['payment_amount'],2);?></td>
                         <td class="center"><?php 
						 
						
						 
						 echo number_format(($defaultBalance[0]['defaultblance']+$this->CustomerAC[$k]['net_blance']),2);?></td>
                         <td class="center">
                         
                         <button type="button"  onclick="CustomerACDetails('<?php echo $this->CustomerAC[$k]['customer_id'];?>');"  class="btn detailsbtn"><i class="icon-screenshot"> </i> </button></td>
                     </tr>
                       
                     <?php 
						}}
						?>
                 </tbody>
             </table>
                
                
               
                
                
             <?php // print_r($this->vg_Customer);?>
               
               
           </div><!--contentinner-->
        </div>
       
        <!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
 	
    <script type="text/javascript">

	function CustomerACDetails(id){
		jQuery(function($){
			$('#result').load('<?php echo BASE_URL?>?SingelReport_customerACdetails&getID='+id+' #resultt');
			});
		
		
		}
		
			

</script>
    
    
    
    
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>


