
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");
$code= mysql_query("select * from payment_gateway where name='Paystack'");
?>
<!-- Site Content Wrapper -->

           <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Other Bank Transfer

                    </div>

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">
              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-black">Fund Transfer</h3>
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

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="form1" name="form1" method="post" action="otherbankstransfer.php">
            <?php if(isset($_REQUEST['error']))
                 {      if($_REQUEST['error']=='nodetails')
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">Deatils Missing or Invalid.<br/>Payment Failed</h3>";
                        else if ($_REQUEST['error']=='WrongPassword')
                            echo "<script>swal('Error!', 'Wrong Password Entered!', 'error')</script>;";
                        else if ($_REQUEST['error'] == 'insufficientbalance')
                            echo "<script>swal('Error!', 'Insufficient Balance!', 'error')</script>;";
                            
                            else if ($_REQUEST['error'] == 'successful')
                            echo "<script>swal('Succesful!', 'Transfer Succesful!', 'success')</script>;";
                        else
                            echo "<h3 style=\"color:red; width:fill-available; text-align:center;\">".$_REQUEST['error']."</h3>";
                 }
                            ?>
                            <?php if(isset($_REQUEST['success']))
                 {          if ($_REQUEST['success'] == 'successful')
                            echo "<script>swal('Succesful!', 'Transfer Succesful!', 'success')</script>;";
                        
                 }
                            ?>
                    <!-- Grid -->
                    <div class="row">
                    
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Bank</label>
                          <select required name="bank" class="custom-select custom-select-sm">
                         <?php   $result=  mysql_query("SELECT * FROM banks");
					  while($arrvar = mysql_fetch_array($result))
			  {
				echo "<option value='".$arrvar['code']."'>".$arrvar['bank']."</option>";
			  }  
                     
			  ?>
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->
<!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Enter Account Number</label>
                          <input required name="acctno" id="ac_no" class="form-control">
                          <?php  while($rowscode = mysql_fetch_array($code))
						{
							echo "
						
                          
                          <input hidden name='code' value='$rowscode[secret_key]'>";
                          }
						?>
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Select Your Account</label>
                          <select required name="acct" id="ac_no" class="custom-select custom-select-sm">
                           <?php  while($rowsacc = mysql_fetch_array($acc))
						{
							echo "<option value='$rowsacc[accno]'>$rowsacc[accno] </option>";
						}
						?>
                          </select>
                        </div>
                      </div>
                      <!-- / grid item -->

                      <!-- Grid Item -->
                      <div class="col-6">
                        <div class="form-group">
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter Amount To Transfer</label>
                            
                        </span>
                          <input required type="number" min="10" name="pay_amt" id="pay_amt" type="text" class="form-control form-control-sm"
                                 placeholder="Amount">
                        </div>
                      </div>
                      <!-- / grid item -->

                     
                    </div>
                    <!-- /grid -->
                 
                  <!-- /form -->
                </div>
                <!-- /card body -->

                <!-- Card Footer -->
                <div class="px-7 py-5 border-top border-width-2 border-black-transparent">
                  <span class="d-block display-4 mb-2"><?php
                  
$mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");

			 while($arrow = mysql_fetch_array($results))
			{
			 echo $cur.' '. number_format($arrow[accountbalance],2);
			
		   }?></span>
                  <p class="f-16 mb-0">Account Balance</p>
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" class="btn btn-primary" name="pay" id="pay" value="Transfer" />
        	      </div></td>
       	        </tr></div>
                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->




                </div>
</div>
                <!-- /site content -->



<?php include'footer.php' ?>

</body>
    