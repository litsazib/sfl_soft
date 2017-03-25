<?php require_once(View."header.php");?>

<div class="mainwrapper">
	<?php require_once(View."menu.php");?>

   
   
        <div class="breadcrumbwidget">
        	<ul class="skins">
                
                <li class="fixed"><a href="#" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="#" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="./?Dashboard" title="Go Dashboard">Supplier</a> <span class="divider">/</span></li>
                <li class="active">Supplier List</li>
            </ul>
        </div><!--breadcrumbs-->
        <div class="pagetitle">
        	<h1>Supplier List</h1> 
        </div><!--pagetitle-->
        
       
       <div class="maincontent">
        	<div class="contentinner" id="AfterDel">
            
           	  <h4 class="widgettitle">Dynamic Supplier Table { 
               <a href="./?Supplier_Registration" title="New"  id="NewData" class="btn btn-success btn-circle" data-rel="doc"><strong class="icon-plus icon-white"></strong></a>
              <button title="Delete Multiple Data" name="AllDelete" id="MultiPleDelBTn" class="btn btn-danger btn-circle"><strong class="icon-trash icon-white"></strong></button> }</h4>
            	
                <table width="100%" class="table table-bordered" id="dyntable">
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
                          	<th width="2%" class="head0 nosort"><input type="checkbox" class="checkall"  /></th>
                            <th width="19%" >Name</th>
                            <th width="17%" >Address</th>
                            <th width="12%" >Emial</th>
                            <th width="16%" >Contact</th>
                            <th width="20%" >Reg Date</th>
                            <th width="14%" >Action</th>
                        </tr>
                    </thead>
                    <tbody >
                    
                    <?php
					
                    	if($this->vg_supplier!=""){
						foreach($this->vg_supplier as $k=>$value){
					?>
                        <tr class="gradeX" >
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" id="suplID" value="<?php echo $this->vg_supplier[$k]['id_supplier'];?>" />
                          </span></td>
                            <td><?php echo $this->vg_supplier[$k]['name'];?></td>
                            <td><?php echo $this->vg_supplier[$k]['address'];?></td>
                            <td><?php echo $this->vg_supplier[$k]['email_'];?></td>
                            <td class="center"><?php echo $this->vg_supplier[$k]['contact_number'];?></td>
                            <td class="center"><?php echo $this->vg_supplier[$k]['joindate'];?></td>
                            <td class="center">
                            
                             <a href=".?Supplier_Profile&GETiD=<?php echo $this->vg_supplier[$k]['supplier_code'];?>" class="label label-btn " ><strong class="iconsweets-origscreen"></strong></a>
                            
                             <a href=".?Supplier_Update&GETiD=<?php echo $this->vg_supplier[$k]['supplier_code'];?>" class="label label-warning " ><strong class="icon-edit icon-white"></strong></a>
                        
                        
                         
                         
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
								 
								jQuery.post("<?php echo BASE_URL?>?Supplier_supplierDelete",{ myCheckboxes:myCheckboxes},
								 
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


