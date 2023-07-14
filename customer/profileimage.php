<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

$msg = 0;

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE customers SET lastlogin='$dts' WHERE customerid='$_SESSION[customerid]'");
$sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

while($arrow = mysql_fetch_array($results))
{
	$acno = $arrow[accno];
	$status = $arrow[accstatus];	
	$accopen = $arrow[accopendate];	
	$acctype = $arrow[accounttype];	
	$accbal = $arrow[accountbalance];
	$email = $arrow[email];
	$phone = $arrow[phone];
}

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);


if(isset($_POST['uploadbtn'])) {
    $product_img1=$_FILES['product_img1']['name'];
    $tmp_name1=$_FILES['product_img1']['tmp_name'];
    move_uploaded_file($tmp_name1, "images/$product_img1");
    
    mysql_query("UPDATE customers SET image='$product_img1' WHERE customerid='$_SESSION[customerid]'");
    $msg = 1;
    
    echo "<script> window.open('dashboard.php','_self')  </script>";
}


?>



<!-- Site Content Wrapper -->
          <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Profile Image                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
                    <!-- Profile -->
                    <div class="profile">
				     <!-- Profile Content -->
                        <div class="profile-content">

                            <!-- Grid -->
                            <div class="row">

                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-2">


                                    <!-- Grid -->
                                    <div class="row">

                                        <!-- Grid Item -->
                                        <div class="col-xl-12 col-md-6 col-12 order-xl-2">

                                            <!-- Card -->
                                           
                                        </div>
                                        <!-- /grid item -->

                                      
                                <!-- Grid Item -->
                                <div class="col-xl-12 order-xl-1">

                                    <!-- Card -->
                                    <div class="card">

                                        <!-- Card Header -->
                                        <div class="card-header card-nav bg-transparent d-sm-flex justify-content-sm-between">
                                            
                                            <ul class="card-header-links nav nav-underline" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab-pane1"
                                                       role="tab"
                                                       aria-controls="tab-pane1"
                                                       aria-selected="true"> Upload Profile Image  </a>
                                                </li>
                                              
                                            </ul>

                                        </div>
                                        <!-- /card header -->

                                        <!-- Card Body -->
                                        <div class="card-body pb-2">
                                            
                                            <?php if($msg == '1') {
                                            
                                            echo '<div class="alert alert-success"> Profile Image Uploaded Successfully ! </div>';
                                            
                                            } ?>

                                            <!-- Tab Content-->
                                            <div class="tab-content mt-5">

                                                <!-- Tab panel -->
                                                <div id="tab-pane1" class="tab-pane active">
                                                    
                                                    <form method="POST" action=""  enctype="multipart/form-data" > 
                                                    
                                                    <div class="form-group">
                                                          <label> Choose Image </label>
                                                          <input type="file" required name="product_img1" id="product_img1" class="form-control">
                                                        
                                                        </div>
                                                        
                                                        <div align="right">
                                        	        <input type="submit" class="btn btn-secondary" name="uploadbtn" id="uploadbtn" value="Save" />
                                        	      </div>
                                        	      
                                        	      </form> 
                                                </div>
                                                <!-- /tab panel -->

                                               
                                                
                                            </div>
                                            <!-- /tab content-->

                                        </div>
                                        <!-- /card body -->

                                    </div>
                                    <!-- /card -->

                            </div>
                            <!-- /grid -->

                        </div>
                        <!-- /profile content -->

                    </div>
                    <!-- /profile -->
                     
                     
                     </div></div></div>
                    
                     <link rel="stylesheet" href="../assets/css/custom.css">
                </div></div></div>
                <!-- /site content -->
                
<?php include'footer.php' ?>


<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>