<?php
ob_start();
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");


if(isset($_POST['pay']))
{
$rname = $_POST['rname'];
$swift = $_POST['swift'];
$bankadd = $_POST['bankadd'];
$bank = $_POST['bank'];
$payamt = $_POST['pay_amt'];
$acct= $_POST['acctno'];
}
$dt = date("Y-m-d h:i:s");
$custid=  mysql_real_escape_string($_SESSION['customerid']);
$resultpass = mysql_query("select * from customers WHERE customerid='$custid'");
$arrpayment1 = mysql_fetch_array($resultpass);

if(isset($_POST["pay2"]))
{
       
	if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
            $rr = mysql_query("SELECT * FROM accounts WHERE customerid ='".$_SESSION['customerid']."'");
            $rrarr=  mysql_fetch_array($rr);
			$amount=$_POST['payamt'];
            if ($amount>$rrarr['accountbalance'])
            { print "
			<script language='javascript'>
			window.location = 'internationalsent.php?error=insufficientbalance';
			</script>
			";
            exit(0);;
            }
            
             if ($_POST['cot']!==$arrpayment1['cot'])
            { 
            print "
			<script language='javascript'>
			window.location = 'internationalsent.php?error=cot';
			</script>
			";
            exit(0);;
            }
            
              
             if ($_POST['imf']!==$arrpayment1['imf'])
            { 
            print "
			<script language='javascript'>
			window.location = 'international.php?error=imf';
			</script>
			";
            exit(0);;
            }
            
                
                if (isset($_POST['payeetype']))
                {
                    
                    if ($_POST['payeetype'] == 'int')
                    {     mysql_query("UPDATE accounts SET accountbalance = accountbalance+$amount WHERE customerid ='".$_POST[payto]."'") or die(mysql_error ());
                    }
                }
              	  $sql1="INSERT INTO transactions (type,paymentdate,payeeid,receiveid,amount,paymentstat) VALUES ('Transfer','$dt','$_SESSION[customerid]','$_POST[payt]','$amount','active')";
                  $sql2="INSERT INTO withdrawals (userid,amount,status) VALUES ('$_SESSION[customerid]','$amount','1')";
                  $sql="INSERT INTO transfers (sender,receiver,name,bank,amount,status,address, swift) VALUES ('$_SESSION[customerid]','$_POST[acct]','$_POST[name]','$_POST[bank]','$amount','0','$_POST[addr]','$_POST[swift]')";
              
                mysql_query("UPDATE accounts SET accountbalance = accountbalance-$amount WHERE customerid ='".$_SESSION['customerid']."'");
		       if (!mysql_query($sql))
				  {
				  die('Error: ' . mysql_error());
				  }
				  if (!mysql_query($sql1))
				  {
				  die('Error: ' . mysql_error());
				  }
				  if (!mysql_query($sql2))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  { 
					 print "
				<script language='javascript'>
					window.location = 'international.php?success=successful';
				</script>
			";
                    exit(0);
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
	$passerr = "Invalid password entered!!!<br/> Transaction Failed </b>";
        print "
				<script language='javascript'>
					window.location = 'international.php?error=WrongPassword';
				</script>
			";
        exit(0);
	}		  
}

$custid=  mysql_real_escape_string($_SESSION['customerid']);
$acc= mysql_query("select * from accounts where customer_id='$custid'");

$percentage = 10;
$new_amount = ($percentage / 100) * $payamt;
?>



<!-- Site Content Wrapper -->

            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

International-Bank Transfer

                    </div>

                    <!-- Grid -->
                    <div class="row">

            <div class="col-xl-12 col-md-6 order-xl-4">

              <!-- Card -->
              <div class="dt-card bg- text-black">

                <!-- Card Header -->
                <div class="dt-card__header">

                  <!-- Card Heading -->
                  <div class="dt-card__heading">
                    <div class="d-flex align-items-center">
                      <i class="icon icon-revenue icon-fw icon-2x text-black mr-2"></i>
                      <h3 class="dt-card__title text-blacks">Transaction Summary</h3>
                    </div>
                  </div>
                  <!-- /card heading -->

                  <!-- Card Tools -->
                  <div class="dt-card__tools align-self-start mt-n3 mr-n2">
                    <!-- Dropdown -->
                    <div class="dropdown">

                

                    </div>
                    <!-- /dropdown -->
                  </div>
                  <!-- /card tools -->

                </div>
                <!-- /card header -->

                <!-- Card Body -->
                <div class="dt-card__body pb-3">
                  <!-- Form -->
                  <form id="form1" name="form1" method="post" action="internationalbankstransfer.php">
                             
				<input type="hidden" name="payt" value="<?php echo $swift; ?>"  />
				<input type="hidden" name="payamt" value="<?php echo $payamt; ?>"  />
				<input type="hidden" name="acct" value="<?php echo $acct; ?>"  />
				<input type="hidden" name="bank" value="<?php echo $bank; ?>"  />
				<input type="hidden" name="name" value="<?php echo $rname; ?>"  />
				<input type="hidden" name="addr" value="<?php echo $bankadd; ?>"  />
				<input type="hidden" name="swift" value="<?php echo $swift; ?>"  />

                    <!-- Grid -->
                    <div class="row">
                      <!-- Grid Item -->
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label><?php
                          
                        if(isset($_POST['pay']))
{               echo "<br><b>&nbsp;Bank Name: </b> $bank";
                echo "<br><b>&nbsp;Bank Address: </b> $bankadd";
				echo "<br><b>&nbsp;Account Number: </b> $acct";
                echo "<br><b>&nbsp;Account Name: </b> $rname";
                echo "<br><b>&nbsp;Swift Code: </b> $swift";
				echo "<br><b>&nbsp;Amount: </b> $cur $payamt";
			    //echo "<br><b>&nbsp;Transfer Fee: </b> $cur $new_amount";
	  ?></label>
                           
                        </div>
                      </div>

                      <!-- Grid Item -->
                      <div class="col-12">
                        <div class="form-group">
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter Transaction Password</label>
                            <a href="javascript:void(0)" class="text-white ml-auto">
                                
                            </a>
                        </span>
                        <!--<h4 style="color:red; font-weight:700;" >Note! 10% Fee would be charged from you as "COT and IMF Fee" for your transfer. Please contact your bank via email "customercare@primestonork.com" </h4> -->
                          <input required  min="10" name="trpass" type="password" id="trpass"  class="form-control form-control-sm"
                                 placeholder="Enter Transaction Password">
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
                
                 <tr>
        	      <td colspan="2"><div align="right">
        	        
        	        
        	        <button class="btn btn-success" data-toggle="modal" data-target="#myModal" >Proceed With Transfer </button>
        	       
        	      </div></td>
       	        </tr></div>
       	      <?    } else {
                echo $content['message']; echo "</div></div></div>";
            }
                ?>
                <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Enter COT & IMF Code</h4>
      </div>
      <div class="modal-body">
                             
                      <!-- Grid Item -->
                      <div class="col-12">
                        <div class="form-group">
                        <br>
      <code><b>Provide your COT & IMF code for transfer</b></code><br>
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter COT Code</label>
                            <a href="javascript:void(0)" class="text-white ml-auto">
                                
                            </a>
                        </span>
                          <input required type="text" min="10" name="cot" type="password" i class="form-control form-control-sm"
                                 placeholder="Enter Transaction Password">
                        </div>
                      </div>
                      <!-- / grid item -->
                      
                      <!-- Grid Item -->
                      <div class="col-12">
                        <div class="form-group">
                        <span class="d-flex mb-1">
                            <label class="mb-0">Enter IMF Code</label>
                            <a href="javascript:void(0)" class="text-white ml-auto">
                                
                            </a>
                        </span>
                          <input required type="text" min="10" name="imf" type="password"  class="form-control form-control-sm"
                                 placeholder="Enter Transaction Password">
                        </div>
                      </div>
                      <!-- / grid item -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn btn-success"  type="submit" name="pay2" id="pay2" value="Transfer" />
      </div>
    </div>

  </div>
</div>

                <!-- /card footer -->
 </form>
              </div>
              <!-- /card -->

            </div>
            <!-- /grid item -->
                    <!-- Entry Header -->


                </div></div>

                <!-- /site content -->



<?php include'footer.php' ?>
 <link rel="stylesheet" href="../assets/css/custom.css">
<script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
</body>
    