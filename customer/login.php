<?php 
   ob_start();
   session_start();
   error_reporting(0);
   include("../config/dbconfig.php");
   
   if(($_REQUEST['error'])=='nologin')
       $logininfo="Please Sign In to Continue";
   else if(($_REQUEST['error'])=='forgetpass')
       $logininfo="Please contact the nearest branch";
   if(isset($_SESSION['customerid']))
   {
   	header("Location: dashboard.php"); exit(0);
   }
   
   if ((isset($_REQUEST['login'])))
   {
   $password = mysql_real_escape_string($_REQUEST['password']);
   $logid= mysql_real_escape_string($_REQUEST['login']);
   $query="SELECT * FROM customers WHERE loginid='$logid' AND accpassword='$password'";
   $res=  mysql_query($query);
   if(mysql_num_rows($res) == 1)
   	{
   		while($recarr = mysql_fetch_array($res))
   		{
   		    
   		    
   		        $_SESSION['errormsg'] = $recarr['accstatus']; 
   		        if($_SESSION['errormsg']=='blocked') {
   		            $_SESSION['errormsg'] = '1';
   		            $_SESSION['errorname'] = $recarr['firstname']." ".$recarr['lastname'];
   		        } else {
   		                $_SESSION['customerid'] = $recarr['customerid'];
           		$_SESSION['ifsccode'] = $recarr['ifsccode'];
           		$_SESSION['customername'] = $recarr['firstname']. " ". $recarr['lastname'];
           	 	$_SESSION['loginid'] = $recarr['loginid'];
           	 	$_SESSION['accstatus'] = $recarr['accstatus'];
           	 	$_SESSION['accopendate'] = $recarr['accopendate'];
           	 	$_SESSION['lastlogin'] = $recarr['lastlogin'];	
           	 	$_SESSION["loginid"] =$_POST["login"];
           		header("Location: dashboard.php");
           		}
           	 $to_email = $recarr["email"];
             $date = date('m/d/Y h:i:s a', time());
             
$subject = 'pacificonlinebank.com ONLINE LOGIN ALERT ON '.$date.'';
$message = '<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://pacificonlinebank.com/login-direct/personal-login/login-2/customer/am.css">
    <title>New Account Registration</title>
    
    
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Tojah FashionhouseTransaction Alert.</span>
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
                        
                        
                        <p style="font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif; font-size: 15px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Dear  <b>'.$_SESSION['customername'].'</b></p>
                        <p style="font-family: '.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">There was a login attempt on your account on '.$date.' </p>
                        
                        
                        
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Please see below login details:</p>
                        <h3 style="font-family: '.Mulish.', sans-serif; font-size: 31px; font-weight: normal; padding:10px; margin: 0; Margin-bottom: 15px; background:#ccc;"> '.$date.' </h3>
                        
                        <p></p>
                        
                        <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family:'.Mulish.', sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;">  </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br/><br/>
                                <p style="font-family:'.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">If you did not login to your Tojah Fashionhouseaccount, kindly contact (our 24/7 Customer Interactive Centre) on +18648369563 or email  customercare@tojahfashionhouse.jonpioner.com, stating your account number and account name..</p>
                                <p style="font-family:'.Mulish.', sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Thank you for Banking with us..</p>
                      
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
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">© 2023 Tojah Fashionhouse(RC796975). All rights reserved.</span>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 15px; color: #666666; text-align: center;">
                  Any views of this e-mail are those of the sender except where the sender specifically states them to be that of Tojah FashionhousePlc or its subsidiaries.
The message and its attachments are for designated recipient(s) only and may contain privileged, proprietary and private information. If you have received it in error, kindly delete it and notify the sender immediately.
Tojah FashionhousePlc accepts no liability for any loss or damage resulting directly and indirectly from the transmission of this e-mail message..
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
$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//$headers .= 'From: <no-reply@'.$bname.'>' . "\r\n";
	$headers .= 'From: Tojah Fashionhouse
    <customercare@tojahfashionhouse.jonpioner.com>' . "\r\n";
	$to= $email;
mail($to_email,$subject,$message,$headers);	
           		
   	 }	
   	}
   else{
   	$res = mysql_query("SELECT * FROM employees WHERE loginid='$logid' AND password='$password'");
   
   
   	if(mysql_num_rows($res) == 1)
   	{
   		$_SESSION["adminid"] =$_POST["login"];
   		header("Location: dashboard.php");
   	}
   	else
   	{
   		$logininfo = "Invalid Username or password entered";
   	}
   }
   }
   ?>
<html lang="en">
   <head>
      <!-- Meta tags -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <!-- /meta tags -->
      <title>Customers Login</title>
      <!-- Site favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
      <!-- /site favicon -->
      <!-- Font Icon Styles -->
      <link rel="stylesheet" href="../assets/node_modules/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="../assets/vendors/gaxon-icon/styles.css">
      <!-- /font icon Styles -->
      <!-- Perfect Scrollbar stylesheet -->
      <link rel="stylesheet" href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">
      <!-- /perfect scrollbar stylesheet -->
      <!-- Load Styles -->    
      <link rel="stylesheet" href="../assets/css/light-style-1.min.css">
      <link rel="stylesheet" href="../assets/css/custom.css">
      <!-- /load styles -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <script src="../assets/js/custom/sweetalert.min.js"></script>
   </head>
   <body class="dt-sidebar--fixed dt-header--fixed">
      <!-- Loader -->
      <div class="dt-loader-container">
         <div class="dt-loader">
            <svg class="circular" viewBox="25 25 50 50">
               <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
            </svg>
         </div>
      </div>
      <!-- /loader -->
      <!-- Root -->
      <div class="dt-root">
         <div class="dt-root__inner">
            <div class="pump">
               <div class="ash">
                  <p class="dt-brand__logo-img pump-logo" style="margin-top: 6px;" alt="Drift"><img src="yansh.png" class="pumpimage"> </p>
                  <!-- GTranslate: https://gtranslate.io/ -->
                  
               </div>
               <div class="ash2">
                  <a class="header-button" href="login.php">Access It <img src="../assets/images/white-lock.png"/ style="vertical-align:text-bottom; margin-left: 0px;"></a>
               </div>
            </div>
            <div style="
               " class="ove">
               <h1 class="pulp ve" style="">
 <!--<img class="pulp-img" src="../assets/images/FSCS_Protected_Logo.png"/ style="vertical-align:text-bottom;"> --></h1>
            </div>
            <!-- Login Container -->
            <div class="" style="">
               <!-- Login Content -->
               <div class="ack">
                  <!-- Login Background Section -->
                  <div class="dt-login__bg-section blast">
                     <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title">Log In to your account</h1>
                        <!-- /login title -->
                        <p class="f-16">Enter your details and proceed below.</p>
                         <?php if(isset($logininfo))
                           {  echo "<script>swal('Error!', 'Invalid Password for Username !', 'error')</script>"; }
                             
                             if($_SESSION['errormsg']=='1') {
                                 
                                 echo "<script>swal('Alert!', 'HELLO ".$_SESSION['errorname']." ! Thanks for opening an account with us, we are currently verifying your account!', 'error')</script>";
                                  }
                        ?> 
                        <?php if(isset($logininfo))
                           {  echo "<script>swal('Error!', 'Wrong Password or Username Entered!', 'error')</script>"; } ?>   
                     </div>
                     <!-- Brand logo -->
                     <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="login.php">
                        <p class="dt-brand__logo-img dampa" style=""><img src="yansh.png" class="pumpimage2"> </p>
                        </a>
                     </div>
                     <!-- /brand logo -->
                  </div>
                  <!-- /login background section -->
                  <!-- Login Content Section -->
                  <div class="ack" style="    padding-bottom: 40px;">
                     <!-- Login Content Inner -->
                     <div class="dt-login__content-inner blaster">
                        <div>
                          <!-- <h1>Welcome to Digital Banking</h1>
                        </div>
                        <p class="f-16">You can use your customer id and password to login..</p>
                        <!-- Form -->
                        <form action="login.php" method="POST">
                           <!-- Form Group -->
                           
                           <div class="form-group">
                              <label class="sr-only" for="email-1">Account ID</label>
                              <input type="text" class="form-control" id="email-1" name="login" aria-describedby="email-1"
                                 placeholder="Personal ID">
                           </div>
                           <!-- /form group -->
                           <!-- Form Group -->
                           <div class="form-group">
                              <label class="sr-only" for="password-1">Account Password</label>
                              <input type="password" class="form-control " name="password" id="password-1" placeholder="Password*">
                           </div>
                           <!-- /form group -->
                           <!-- Form Group -->
                           <div class="dt-checkbox d-block mb-6">
                              <input type="checkbox" id="checkbox-1">
                              <label class="dt-checkbox-content" for="checkbox-1">
                              Remember my ID
                              </label>
                           </div>
                           <!-- /form group -->
                           <!-- Form Group -->
                           <div class="form-group">
                              <input type="submit" name="go" id="go" type="submit" value="Log In.." style="boder-radius:0px !important; font-family:muli;" class="btn btn-primary">
                                <span class="d-inline-block ml-4 n" style="margin-top: 20px; text-transform: uppercase;">Not a user?
                                 <a class="d-inline-block font-weight-medium ml-3 n " href="register.php">Sign Up Here <i class="fa fa-check-circle"></i></a>  
                              </span>
                           </div>
                           <p style="font-family: nunito; font-weight:600; color: #000; text-align:center; font-style: italic; font-size: 12px;"><i class="fa fa-lock" style="margin-right:4px; font-weight:bolder;"></i> Connection Secured</p>
                           
                           <!-- /form group -->
                        </form>
                        <!-- /form -->
                     </div>
                     <!-- /login content inner -->
                  </div>
                  <!-- /login content section 
                     <div>   <img class="" src="../assets/images/security.gif" alt="">       </div>-->
               </div>
               <!-- /login content -->
            </div>
            <!-- /login container -->
            
           
            <!-- /login content -->
         </div>
         <!-- /login container -->
      </div>
      </div>
      <!-- /root -->
      <!-- Optional JavaScript -->
      <script src="../assets/node_modules/jquery/dist/jquery.min.js"></script>
      <script src="../assets/node_modules/moment/moment.js"></script>
      <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Perfect Scrollbar jQuery -->
      <script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
      <!-- /perfect scrollbar jQuery -->
      <!-- masonry script -->
      <script src="../assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
      <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
      <script src="../assets/js/functions.js"></script>
      <script src="../assets/js/customizer.js"></script><!-- Custom JavaScript -->
      <script src="../assets/js/script.js"></script>
      <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
      <script src="../assets/js/custom/sweet-alert.js"></script>
      <script src="../assets/node_modules/sweetalert2/dist/sweetalert2.js"></script>
      
   </body>
</html>
<?php include'footer.php' ?>