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
                <li class="active">Product Stock</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Reports Product List</h1> 
        </div><!--pagetitle-->
        
        
        
       
        
       
       <div class="maincontent">
       	 <div class="contentinner" id="AfterDel">
            
            
              <div id="result"></div>
              
              
       	   <h4 class="widgettitle">Dynamic Product Table {
           
                 
           }</h4>
       	   <form action="" method="post" >
           
           <div align="center">
           
           <select class="form-control required chosen-select-width name Catagory" name="pd_type" id="pd_type" aria-required="true">
           		<?php if(isset($_POST['pd_type'])){
					?>
                
                 <option value="<?php if($_POST['pd_type']=="0"){echo "0";}else{echo $_POST['pd_type'];}?>"><?php if($_POST['pd_type']=="0"){echo "Product Type";}else{echo $_POST['pd_type'];}?></option>
                  <option value="0">Product Type</option>
                  <?php }else{
					  ?>
                      <option value="0">Product Type</option>
                      <?php
					  }?>
                   <option value="Finish Good Product">Finish Good Product</option>
                    <option value="Raw Materials Product">Raw Materials Product</option>
                 
                </select>
           
           <select class="form-control required chosen-select-width name Catagory" name="catagory_id" id="catagory_id" aria-required="true">
           
           <?php if(isset($_POST['catagory_id'])){
					?>
                
                 <option value="<?php if($_POST['catagory_id']=="0"){echo "0";}else{echo $_POST['catagory_id'];}?>"><?php if($_POST['catagory_id']=="0"){echo "Please Select Catagory";}else{
					 
					   $cat=$this->sql("SELECT CONCAT('[ ',`cat_code`,' ] ',`cat_name`) AS 'cat_name' FROM `catagory` where id_catagory='".$_POST['catagory_id']."'");
					 echo $cat[0]['cat_name'];
					 
					 }?></option>
                       <option value="0">Please Select Catagory</option>
                  <?php }else{
					  ?>
                      <option value="0">Please Select Catagory</option>
                      <?php
					  }?>
           
          
                  <?php
                                $res=$this->sql("SELECT `id_catagory`,CONCAT('[ ',`cat_code`,' ] ',`cat_name`) AS 'cat_name' FROM `catagory`");
								
								  foreach($res as $value){
									  ?>
                  <option value="<?php  echo ($value['id_catagory']);?>">
                    <?php  echo ($value['cat_name']);?>
                  </option>
                  <?php
								  }
								  ?>
             </select> 
                
                
                <select class="form-control required chosen-select-width name pdid" name="pd_id" id="pd_id" aria-required="true">
                 
                 
                 <?php if(isset($_POST['pd_id'])){
					?>
                
                 <option value="<?php if($_POST['pd_id']=="0"){echo "0";}else{echo $_POST['pd_id'];}?>"><?php if($_POST['pd_id']=="0"){echo "Please Select Product";}else{
					 
					 $pd=$this->sql("SELECT CONCAT('[ ',`pd_code`,' ] ',`pd_name`) AS 'pd_name' FROM `product` where product_id='".$_POST['pd_id']."'");
				
					 echo $pd[0]['pd_name'];
					 
					 
					 }?></option>
                      <option value="0">Please Select Product</option>
                  <?php }else{
					  ?>
                      <option value="0">Please Select Product</option>
                      <?php
					  }?>
                 
                 
                  <?php
                                $res=$this->sql("SELECT `product_id`,CONCAT('[ ',`pd_code`,' ] ',`pd_name`) AS 'pd_name' FROM `product`");
								
								  foreach($res as $value){
									  ?>
                  <option value="<?php  echo ($value['product_id']);?>">
                    <?php  echo ($value['pd_name']);?>
                  </option>
                  <?php
								  }
								  ?>
                </select>
                
                 
                 <input name="search" type="submit" class="btn" id="search" value="Search" />
           
           </div>
           
           </form>
           <br />
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
                       	 <th class="head0">PD Code</th>
                         <th class="head1">Product Name </th>
                         <th class="head1">Catagory</th>
                         <th class="head1">Product Type</th>
                         <th class="head0">Total KG</th>
                         <th class="head1">Total Bag</th>
                         <th class="head1">Action</th>
                     </tr>
                 </thead>
                 <tbody >
                    
                   <?php
					  $total_kg = 0;
					  $total_stock_bag = 0;
                    	if($this->product!=""){
						foreach($this->product as $k=>$value){
							
							$total_kg+=$this->product[$k]['total_kg'];
							$total_stock_bag+=$this->product[$k]['stock_bag'];
							
					?>
                     <tr class="gradeX" >
                       <td><?php echo $this->product[$k]['pd_code'];?></td>
                         <td><?php echo $this->product[$k]['pd_name'];?></td>
                         <td><?php echo $this->product[$k]['cat_name'];?></td>
                         <td><?php echo $this->product[$k]['pd_type'];?></td>
                         <td><?php echo $this->product[$k]['total_kg'];?></td>
                         <td class="center"><?php echo $this->product[$k]['stock_bag'];?></td>
                         <td class="center">
                         
                         <button type="button"  onclick="ProductDetails('<?php echo $this->product[$k]['product_id'];?>');"  class="btn detailsbtn"><i class="icon-screenshot"> </i> </button></td>
                     </tr>
                       
                     <?php 
						}}
						?>
                 </tbody>
                 
                  <tfoot>
                     <tr>
                       	 <th colspan="4" align="right"  style="text-align:right;" >Total</th>
                       	 <th ><?php echo $total_kg; ?></th>
                         <th align="center" style="text-align:center;" ><?php echo $total_stock_bag; ?></th>
                         <th >&nbsp;</th>
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


jQuery.noConflict();

				 jQuery(function($){ 
				 
				 
				 
		$('.pdid').chosen();
		$('.Catagory').chosen();
			
});
		</script>
    <script type="text/javascript">

	function ProductDetails(id){
		jQuery(function($){
			$('#result').load('<?php echo BASE_URL?>?SingelReport_ManageProductdetails&getID='+id+' #resultt');
			});
		
		
		}
		
			

</script>
    
    
    
    
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>


