<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["staffid"]))
{
		header("Location: login.php");
}

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}

$m=date("Y-m-d");

?>
<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">



                <!-- Site Content -->

                <div class="dt-content">



                    <!-- Page Header -->

                    <div class="dt-page__header">

                        <h1 class="dt-page__title">Update Customer's Account</h1>

                    </div>

                    <!-- /page header -->
  <!-- Grid Item -->
            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg-prima text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-users icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Update Transaction Date </h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                      <!-- Dropdown Button -->
                      <a href="#" class="dropdown-toggle no-arrow text-white"
                         data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false"><i class="icon icon-horizontal-more icon-fw icon-3x"></i></a>
                      <!-- /dropdown button -->

                      <!-- Dropdown Menu -->
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something else
                          here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                      </div>
                      <!-- /dropdown menu -->

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

<?
$results = mysql_query("SELECT * FROM transactions where transactionid='$_GET[transid]'");
$custid=$_GET['transid'];
while($arrow = mysql_fetch_array($results))
{
	$date = $arrow[paymentdate];

}
?>
                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                <?
  if(isset($_POST["button"]))
{    
    $date = $_POST[date];
    $sql = "UPDATE `transactions` SET `paymentdate` = '$date' WHERE `transactions`.`transactionid` = $_GET[transid]";
   
    mysql_query($sql);
   
     echo"<div class='alert alert-success'>
			  <strong>Success!</strong> Transaction Date Updated.
			</div>";
    
    if (!mysql_query($sql))
    {
    var_dump('Error: ' . mysql_error());
    }  
}
?>                   

                  <!-- Form -->
                   <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
           <p>&nbsp;<?php echo $logmsg; ?></p>
                    <!-- Grid -->
                    <div class="row">


                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transaction Date</label>
                          <input required name="date" value="<?php echo $date; ?>" id="date" class="form-control">
                  
                        </div>
                      </div>
                      
        	      <td colspan="1"><div align="right">
        	        <input  type="submit" name="button" id="button"  class="btn btn-secondary" value="Update Account" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                    <div class="dt-entry__header">





                    </div>

                    <!-- /grid -->



                </div>

                <!-- /site content -->



<?php include'footer.php' ?>


</body>
    