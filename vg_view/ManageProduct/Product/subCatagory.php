<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Home_Dashboard" title="Go Dashboard">Manage Product</a> <span class="divider">/</span></li>
                <li class="active">Sub Catagory</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Sub Catagory List</h1> <span>This is a sample description for  Sub Catagory List page...</span>
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner" id="AfterDel">
            
           	  <h4 class="widgettitle">Dynamic Sub Catagory Table { 
               <a href="./?ManageProduct_SubcataRegistration" title="New"  id="NewData" class="btn btn-success btn-circle" data-rel="doc"><strong class="icon-plus icon-white"></strong></a>
              <button title="Delete Multiple Data" name="AllDelete" id="MultiPleDelBTn" class="btn btn-danger btn-circle"><strong class="icon-trash icon-white"></strong></button> }</h4>
            	
                <table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall"  /></th>
                            <th class="head0">Sub Catagory Code</th>
                            <th class="head1">Sub Catagory Name </th>
                            <th class="head1">Catagory Name</th>
                            <th class="head1">Reg Date</th>
                            <th class="head0">Action</th>
                        </tr>
                    </thead>
                    <tbody >
                    
                    <?php
					
                    	if($this->catagory_sub!=""){
						foreach($this->catagory_sub as $k=>$value){
					?>
                        <tr class="gradeX" >
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" id="catagoryID" value="<?php echo $this->catagory_sub[$k]['id_sub_catagory'];?>" />
                          </span></td>
                            <td><?php echo $this->catagory_sub[$k]['sub_cat_code'];?></td>
                            <td><?php echo $this->catagory_sub[$k]['sub_cat_name'];?></td>
                            <td><?php echo $this->catagory_sub[$k]['cat_name'];?></td>
                            <td class="center"><?php echo $this->catagory_sub[$k]['joindate'];?></td>
                            <td class="center">
                            
                             <a href="?ManageProduct_SubcataUpdate&GETiD=<?php echo $this->catagory_sub[$k]['id_sub_catagory'];?>" class="label label-warning " ><strong class="icon-edit icon-white"></strong></a></td>
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
jQuery.noConflict();
jQuery(document).ready(function(){
	
	 
				
	jQuery('#MultiPleDelBTn').click(function(){
			
				var c = false;
				var cn = 0;
				var o = new Array();
				var myCheckboxes=new Array();
				jQuery('#dyntable input:checkbox').each(function(){
					if(jQuery(this).is(':checked')) {
						if(jQuery(this).val()!='on'){
						myCheckboxes.push(jQuery(this).val());
						}
						c = true;
						o[cn] = jQuery(this);
						
						cn++;
					}
				});
				if(!c) {
					
					jAlert('No selected Data', 'Alert');
					// jConfirm('Can you confirm this?', 'Dialog');
						
				} else {
					var msg = (o.length > 1)? 'Data..' : 'Data..';
					
					
				 jConfirm('Delete '+o.length+' '+msg+'?', 'Dialog', function(r) {
							  
							  if(r){
								 
								jQuery.post("<?php echo BASE_URL?>?ManageProduct_subcatagoryTempDelete",{ myCheckboxes:myCheckboxes},
								 
								 function(data){
									
									 	if(data=='ture'){
											for(var a=0;a<cn;a++) {
										
										jQuery(o[a]).parents('tr').remove();	
										
										
									}
											}else{
												jAlert('Please try again..', 'Alert');
												}
									 
									 }
								 
								 );
								
					}else{
						jAlert('Your Confirmation Results false', 'Alert');
						}
							  
							  
						   });
					
				
				}
				
				
			});
			
							
	
							
	
	});

</script>
    
    
    
    
    
    
   <?php require_once(View."footer_content.php");?>
    
</div>




<?php require_once(View."footer.php");?>


