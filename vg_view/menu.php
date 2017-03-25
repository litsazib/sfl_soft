
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
	var ampm = h >= 12 ? 'pm' : 'am';
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('TimeStart').innerHTML ="Today is <?php echo date("Y-M-D ");?>"+ h + ":" + m + ":" + s +" "+ ampm;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<?php
$activeColorC='style="background-color:rgba(13, 156, 31, 0.49);"';

?>

 <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="#">Solaiman Feeds <span><sub> Ltd</sub></span></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget" id="TimeStart"> Tuesday, Dec 25, 2012 5:30pm</div>
    
    	
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Main Navigation</li>
                <li class="<?php echo @$this->DashboardM;?>"><a href="./?Home_Dashboard"><span class="icon-align-justify"></span> Dashboard</a></li>
                
                <li class="<?php echo @$this->Supplier;?> dropdown"><a href="#"><span class="icon-briefcase"></span> Supplier</a>
                	<ul <?php echo @$this->SupplierLink;?>>
                    	<li  <?php if(@$GLOBALS['PageMethode']=="AllSupplier"){echo $activeColorC;}?>><a href="./?Supplier_AllSupplier">Supplier List</a></li>
                        <li <?php if(@$GLOBALS['PageMethode']=="Registration"){echo $activeColorC;}?>><a href="./?Supplier_Registration">Supplier Registration</a></li>
                    </ul>
                </li>
                
                   <li class="<?php echo @$this->Customer;?> dropdown"><a href="#"><span class="icon-briefcase"></span> Customer</a>
                	<ul <?php echo @$this->CustomerLink;?>>
                    	<li <?php if(@$GLOBALS['PageMethode']=="AllCustomer"){echo $activeColorC;}?>><a href="./?Customer_AllCustomer">Customer List</a></li>
                        <li <?php if(@$GLOBALS['PageMethode']=="Registration"){echo $activeColorC;}?>><a href="./?Customer_Registration">Customer Registration</a></li>
                    </ul>
                </li>
                
                
                
                
                <li class=" <?php echo @$this->ManageProduct;?> dropdown"><a href="#"><span class="icon-th-list"></span> Manage Products</a>
                	<ul <?php echo @$this->ManageProductLink;?>>
                    	<li <?php if(@$GLOBALS['PageMethode']=="Product"){echo $activeColorC;}?>><a href="./?ManageProduct_Product">Product</a></li>
                        <li <?php if(@$GLOBALS['PageMethode']=="Catagory"){echo $activeColorC;}?>><a href="./?ManageProduct_Catagory">Catagory</a></li>
                         <li <?php if(@$GLOBALS['PageMethode']=="subCatagory"){echo $activeColorC;}?>> <a href="./?ManageProduct_subCatagory">Sub Catagory</a></li>
                         <li <?php if(@$GLOBALS['PageMethode']=="ManageProduct"){echo $activeColorC;}?>><a href="./?ManageProduct_ManageProduct">Manage Product</a></li>
                         
                    </ul>
                </li>
                
                
                
                <li class="<?php echo @$this->PurchaseM;?>"><a href="./?Purchase_PurchasePD"><span class="icon-barcode"></span> Purchase </a></li>
                
                 <li class="<?php echo @$this->PurchasePayment;?>"><a href="./?Payment_Purchase"><span class="iconsweets-cart4"></span> Purchase Payment</a></li>
                
                
                
                <li class="<?php echo @$this->SalesM;?>"><a href="./?Sales_SalesPD"><span class="icon-barcode"></span> Sales </a></li>
                
                <li class="<?php echo @$this->SalesPayment;?>"><a href="./?Payment_Sales"><span class="iconsweets-pricetag"></span> Sales Payment Collection</a></li>
                
                  <li class=" <?php echo @$this->Reports;?> dropdown"><a href="#"><span class="icon-th-list"></span> Reports</a>
                	<ul <?php echo @$this->ReportsLink;?>>
                    	<li <?php if(@$GLOBALS['PageMethode']=="ProductStock"){echo $activeColorC;}?>><a href="./?Reports_ProductStock">Product Stock</a></li>
                        <li <?php if(@$GLOBALS['PageMethode']=="Purchase"){echo $activeColorC;}?>><a href="./?Reports_Purchase">Purchase</a></li>
                         <li <?php if(@$GLOBALS['PageMethode']=="Sales"){echo $activeColorC;}?>><a href="./?Reports_Sales">Sales</a></li>
                         
                          <li <?php if(@$GLOBALS['PageMethode']=="SupplierAC"){echo $activeColorC;}?>><a href="./?Reports_SupplierAC">Supplier Accounts</a></li>
                          <li <?php if(@$GLOBALS['PageMethode']=="CustomerAC"){echo $activeColorC;}?>><a href="./?Reports_CustomerAC">Customer Accounts</a></li>
                         
                         
                         
                    </ul>
                </li>
                
                 <li class=" <?php echo @$this->ledgerM;?> dropdown"><a href="#"><span class="icon-th-list"></span> Ledger</a>
                	<ul <?php echo @$this->ledgerMLink;?>>
                    	
                          <li <?php if(@$GLOBALS['PageMethode']=="Supplier"){echo $activeColorC;}?>><a href="./?Ledger_Supplier">Supplier Ledger</a></li>
                          <li <?php if(@$GLOBALS['PageMethode']=="Customer"){echo $activeColorC;}?>><a href="./?Ledger_Customer">Customer Accounts</a></li>
                         
                         
                         
                    </ul>
                </li>
                
                
              <li class="<?php echo @$this->smsM;?>"><a href="./?SMS_Send"><span class="icon-envelope"></span> SMS</a></li>
               <li class="<?php echo @$this->GsmsM;?>"><a href="./?SMS_SendGroup"><span class="icon-envelope"></span>Group SMS</a></li>

                
                
               
                
               
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    
    
    
     <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="#" class="showmenu"></a>
            
            <div class="headerright">
            	<!--dropdown-->
                
    			<div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Hi, <?php echo $_SESSION['LoginStatus'][0]['firstname'];?>! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    	
                        <li class="divider"></li>
                        <li><a href="./?User_Profile"><span class="icon-edit"></span> Profile</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="./?User_LoginOut"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->