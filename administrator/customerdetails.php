<?php session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");
if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}
if(isset($_REQUEST['Del']))
{
    $query = "DELETE FROM customers WHERE customerid = '$_REQUEST[custid]'";
    mysql_query($query);
    $query = "DELETE FROM accounts WHERE customerid = '$_REQUEST[custid]'";
    mysql_query($query);
    header("Location:viewcustomer.php?suc=1");
    exit(0);
}

if(isset($_POST['blockcustomer']))
{
    $query = "UPDATE customers set accstatus='blocked' WHERE customerid = '{$_POST['hide_id']}'";
    mysql_query($query);
}

if(isset($_POST['unblockcustomer']))
{
    $query = "UPDATE customers set accstatus='active' WHERE customerid = '{$_POST['hide_id']}'";
    mysql_query($query);
}

$results = mysql_query("SELECT * FROM customers where customerid='$_GET[custid]'");
$custid=$_GET['custid'];
while($arrow = mysql_fetch_array($results))
{
	$custname = $arrow[firstname]." ".$arrow['lastname'];
	$ifsccode=$arrow[ifsccode];
	$loginid=$arrow[loginid];
	$accstatus=$arrow[accstatus];
	$city=$arrow[city];
    $state=$arrow[state];
	$country=$arrow[country];
	$cot=$arrow[cot];
	$imf=$arrow[imf];
    $accopendate=$arrow[accopendate];
    $lastlogin=$arrow[lastlogin];
    $email=$arrow[email];
}
$resultsd = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");
mysql_num_rows($resultsd);
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Customer's Details</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">

                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            <!-- Entry Header -->
                            <div class="dt-entry__header">

                                <!-- Entry Heading -->
                                <div class="dt-entry__heading">
                                    <h3 class="dt-entry__title">Recent Transfer</h3>
                                </div>
                                <!-- /entry heading -->

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">

                                    <!-- Tables -->
                                    <div class="table-responsive">

                                        <form id="form2" name="form2" method="post" action="">
    <blockquote>
      <table id="data-table" class="table table-striped table-bordered table-hover">
                                          <tr>
          <th width="224" height="32" scope="col">
           
             &nbsp;CUSTOMER NAME

          </th>
          <td width="285"><?php echo $custname; ?></td>
        </tr>
        <tr>
          <td><strong>
            <label for="branch">&nbsp; BRANCH</label>
          </strong></td>
          <td>&nbsp;<?php echo $ifsccode; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="loginid">&nbsp; LOGIN ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $loginid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accstatus">&nbsp; ACCOUNT STATUS</label>
          </strong></td>
          <td>&nbsp;<?php echo $accstatus; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="city">&nbsp; CITY</label>
          </strong></td>
          <td>&nbsp;<?php echo $city; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="state">&nbsp; STATE</label>
          </strong></td>
          <td>&nbsp;<?php echo $state; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="country">&nbsp; COUNTRY</label>
          </strong></td>
          <td>&nbsp;<?php echo $country; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="lastlogin">&nbsp; COT</label>
          </strong></td>
          <td>&nbsp;<?php echo $cot; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="lastlogin">&nbsp; IMF</label>
          </strong></td>
          <td>&nbsp;<?php echo $imf; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accopendate">&nbsp; ACCOUNT OPEN DATE</label>
          </strong></td>
          <td>&nbsp;<?php echo $accopendate; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="lastlogin">&nbsp; LAST LOGIN</label>
          </strong></td>
          <td>&nbsp;<?php echo $lastlogin; ?></td>
        </tr>
        
      </table>
  
        
        <br/><br/><br/>

    </blockquote>
    <table id="data-table" class="table table-striped table-bordered table-hover">
                                          <tr>
        <th colspan="5" scope="col"><strong>CUSTOMER ACCOUNTS</strong></th>
        </tr>
      <tr>
        <th width="100" scope="col"><strong>ACCOUNT NO</strong></th>
        <th width="75" scope="col"><strong>STATUS</strong></th>
        <th width="90" scope="col"><strong>OPEN DATE</strong></th>
        <th width="90" scope="col"><strong>ACCOUNT TYPE</strong></th>
        <th width="85" scope="col"><strong>BALANCE</strong></th>
      </tr>
      <?php
	 while($arrow=mysql_fetch_array($resultsd))
	 {
	 ?>
        <tr>
        <td>&nbsp;<?php echo $arrow[accno];?></td>
        <td>&nbsp;<?php echo $arrow[accstatus];?></td>
        <td>&nbsp;<?php echo $arrow[accopendate];?></td>
        <td>&nbsp;<?php echo $arrow[accounttype];?></td>
        <td>&nbsp;<?php echo number_format($arrow[accountbalance],2); ?></td>
      </tr>
     <?php
     }
	 ?>
</table>
      <input type="hidden" value="<?php echo $custid ?>" name="custid">
       <p>&nbsp;</p>

                                         <tr>
        	      <td colspan="2"><div align="right">
 


</tr></td>

</div>
                                    </div>
<input type="submit" style="display:inline-block;float:left;margin-left:10px" class="btn btn-danger" value="Delete Customer" type="submit" value="Delete Account" name="Del"> </form>

<a href='editaccount.php?custid=<?php echo $custid ?>'><button style="display:inline-block;float:left;margin-left:10px" href="editaccount.php" class="btn btn-primary"> Edit Account </button></a>   
<form method="POST" action="">
    <input type="hidden" value='<?php echo $custid ?>' name="hide_id" >
    
   <!-- <?php if($accstatus !='blocked') {
        echo '<button class="btn btn-warning" style="display:inline-block;float:left;margin-left:10px" type="submit" name="blockcustomer"> UnApprove Account </button>  ';
    } else {
         echo '<button class="btn btn-success" style="display:inline-block;float:left;margin-left:10px" type="submit" name="unblockcustomer"> Approve Account </button>  ';
    }
    ?> -->
    
    <?php if($accstatus !='blocked') {
        echo '<button class="btn btn-warning" style="display:inline-block;float:left;margin-left:10px" type="submit" name="blockcustomer"> UnApprove Account </button>  ';
    } else {
         echo '<button class="btn btn-success" style="display:inline-block;float:left;margin-left:10px" type="submit" name="unblockcustomer"> Approve Account </button>  ';
    }
    ?>
    


<!--    <?php

if(isset($_POST['unblockcustomer']))
{
    $to = $email;
    $subject = 'Account Approved';
    $message = '<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>New Account Registration</title>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Account has been activated.</span>
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        
                        
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hello '.$custname.', your account has been approved, you can now login to your account.</p>
                        
                        <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="https://www.tojahfashionhouse.jonpioner.com/login-direct/index.html" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Login to your account</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">© 2023 Common Wealths  Bank (RC796975). All rights reserved.</span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                   All deposits are insured by the Sweden Deposit Insurance Corporation (USDIC). tojahfashionhouse.jonpioner.com Bank is licensed by the Federal Rserve System. “tojahfashionhouse.jonpioner.com” and “tojahfashionhouse.jonpioner.com” are trademarks of tojahfashionhouse.jonpioner.com Technologies LTD. Marietorp Solliden 13, Ormaryd 571 72 Sandviken, Sweden..
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
    ';
    
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//$headers .= 'From: <no-reply@'.$bname.'>' . "\r\n";
	$headers .= 'From: tojahfashionhouse.jonpioner.com<customercare@tojahfashionhouse.jonpioner.com>' . "\r\n";
    
    mail($to, $subject, $message, $headers);

    echo 'Email Sent.';
}

?> -->
    
</form><!-- /tables -->
  
                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->

                        </div>
                        <!-- /grid item -->

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /site content -->


<link rel="stylesheet" href="css/cus.css">
<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>
