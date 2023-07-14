<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!($_SESSION["adminid"]))
{
		header("Location:login.php");
}
$dt = date("Y-m-d h:i:s");


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
    $accopendate=$arrow[accopendate];
    $lastlogin=$arrow[lastlogin];
    $email=$arrow[email]; 
    $accountbalance=$recarr[balance];
    
    
}

$resultsd = mysql_query("SELECT * FROM accounts where customerid='$_GET[custid]'");

$custid=$_GET['custid'];

while($arrow = mysql_fetch_array($results))
{
	$acct = $arrow[accounttype];
	
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
                        <h1 class="dt-page__title">Credit Customer</h1>
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
                                    <h3 class="dt-entry__title">Credit Account</h3>
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

                                        
    <blockquote>
      
  <? 
  if(isset($_REQUEST['credit']))
{
     mysql_query("INSERT INTO transactions (cashier,type,paymentdate,receiveid,amount,paymentstat) VALUES ('$_SESSION[adminid]','Credit','$_POST[paymentdate]','$_REQUEST[custid]','$_REQUEST[amount]','active')");
     mysql_query("INSERT INTO saved (userid,amount,status) VALUES ('$_REQUEST[custid]','$_REQUEST[amount]','active')");
                   $query = "update accounts set accountbalance = accountbalance + '$_REQUEST[amount]' WHERE customerid = '$_REQUEST[custid]'";
                      mysql_query($query);
                      echo "<script>swal('Successful!', 'Account Successfully Credited!', 'success')</script>";
    //$new2 = "$arrow[accountbalance] + $_REQUEST[amount]";
    // $bas = "SELECT * FROM accounts WHERE accountbalance ='$_GET[accountbalance]' AND customerid='$_REQUEST[custid]'";
     $sql2 = "update accounts set accstatus ='accountbalance ='$_POST[balance]' WHERE customerid='$_GET[custid]'";
     $moi = "select '$'+cast($rowrec[accountbalance] as nvarchar) from accounts";
     $result = mysql_query("select * from accounts WHERE customerid='$_REQUEST[custid]'");
     $rowrec = mysql_fetch_array($result);

  // More headers
    $subj='Tojah Fashionhouse Credit Transaction Alert';
	//$mess='We welcome you to our online banking platform as we hope to serve you better. Your login Id is '.$_POST[loginid].', your account password is '.$_POST[accountpassword].' and your transaction password is '.$_POST[transactionpassword].' . Plesae feel free to change it any time';
	
	$mess='<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://tojahfashionhouse.jonpioner.com/under/login-direct/personal-login/login-2/customer/am.css">
    <title>Transaction Credit Alert</title>
    
    
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Tojah Fashionhouse Transaction Alert.</span>
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
                      <td style="font-family: sans-serif; font-size: 15px; vertical-align: top;">
                        
                        
                        <p style="font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif; font-size: 15px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear,  <b>'.$custname.'</b></p>
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You have just been credited <b> $'.number_format($_REQUEST[amount],2).'</b> in your Tojah Fashionhouse Account.</p>
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You now have a total of: <b> $'.number_format($rowrec[accountbalance],2).'</b> in your account.</p>
                        
                        
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Login to your Tojah Fashionhouse Account to view your balance.</p>
                        <p></p>
                        
                        <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="https://tojahfashionhouse.jonpioner.com/under/login-direct/index.html" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Login to your account</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br/><br/>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">You can reach our 24/7 contact center Tojah FashionhouseDirect on the details below, livechat with us at www.tojahfashionhouse.jonpioner.com or engage us via our social media platforms. We would happily respond to your quries.</p>
                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank you for Banking with us..</p>
                      
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
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 15px; color: #888888; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">© 2023 Tojah Fashionhouse Bank (RC796975). All rights reserved.</span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 15px; color: #666666; text-align: center;">
                  Any views of this e-mail are those of the sender except where the sender specifically states them to be that of Tojah Fashionhouse Plc or its subsidiaries.
The message and its attachments are for designated recipient(s) only and may contain privileged, proprietary and private information. If you have received it in error, kindly delete it and notify the sender immediately.
Tojah Fashionhouse Plc accepts no liability for any loss or damage resulting directly and indirectly from the transmission of this e-mail message..
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
</html>';
	
	//$mess= file_get_contents('emailalert.html');
	
	//$mess =  str_replace("{{$_POST[acc]}}",'$_POST[acc]',$mess);
	//$mess =  str_replace("{{$_POST[loginid]}}",'$_POST[loginid]',$mess);
	//$mess =  str_replace("{{$_POST[loginid]}}",'$_POST[loginid]',$mess);
    //$mess =  str_replace("{{LINK}}",$link,$html);
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//$headers .= 'From: <no-reply@'.$bname.'>' . "\r\n";
	$headers .= 'From: Tojah Fashionhouse<customercare@tojahfashionhouse.jonpioner.com>' . "\r\n";
	$to=$email;
	$subject=$subj;
	$message=$mess;
	mail($to,$subject,$message,$headers);
	
    
   
}

 
	
?>

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
        <td>&nbsp;<?php echo " $cur $arrow[accountbalance]";?></td>
      </tr>
     <?php
     }
	 ?>
</table>
       <p>&nbsp;</p>

                                         <tr>
        	      <td colspan="2"><div align="right">
<input type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" type="submit" value="Credit Account" name="Del"></tr></td></div>
                                    </div>
                                    <!-- /tables -->
  </form>
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

<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credit User</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <form method="post" action="">
      <input type="hidden" value="<?php echo $custid ?>" name="custid">                 
       <label>Enter Amount To Credit</label>
                          <input type="number" name="amount"  class="form-control">
                        <br>
                        <label>Transaction Date</label>
                        <input type="datetime-local" name="paymentdate"  class="form-control">
                        
                        
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      <input name="credit" type="submit" value="Credit" class="btn btn-secondary" >
      </div>
    </div></form>

  </div>
</div>

<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>
