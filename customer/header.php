<!DOCTYPE html>
<? 
if((!(isset($_SESSION['customerid'])))&&(!(isset($_SESSION['adminid']))))
    header('Location:login.php?error=plslogin');
    
    $mailreq = mysql_query("select * from mail where reciverid='".$_SESSION['customerid']."'  AND status='New' ");

if(isset($_GET["mailid"]))
{
	
}
else if(isset($_SESSION['customerid']))
    $result= mysql_query("SELECT * FROM mail where reciverid='$_SESSION[customerid]' AND status='New' ");
    
    

?>
<?
$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$cur='$';
$sbank=$row['bank_name'];
$color=$row['theme_color'];
								   
 }
 
 
$result1 = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec1 = mysql_fetch_array($result1);
 
 ?>
 
 
<html lang="en">

<head>

    <!-- Meta tags -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="description" content="A digitalized banking software">

<meta name="keywords" content="Pacific Online Bank">

<script src="../assets/js/custom/sweetalert.min.js"></script>

<!-- /meta tags -->

<title><?php echo $_SESSION[customername]; ?> - Pacific Online Bank</title>



<!-- Site favicon -->

<link rel="shortcut icon" href="assets/images/logo2.png" 
type="image/x-icon">

<!-- /site favicon -->



<!-- Font Icon Styles -->

<link rel="stylesheet" href="../assets/node_modules/flag-icon-css/css/flag-icon.min.css">

<link rel="stylesheet" href="../assets/vendors/gaxon-icon/styles.css">

<!-- /font icon Styles -->



<!-- Perfect Scrollbar stylesheet -->

<link rel="stylesheet" href="../assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css">

<!-- /perfect scrollbar stylesheet -->



<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/<?php echo $color;?>">
<!-- Load Styles -->    <link rel="stylesheet" href="../assets/css/style.min.css">

    <!-- /load styles -->


<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
.na{
        margin-right: 12px;
    vertical-align: text-top;
    margin-top: -3px;
    text-align: center;
    margin-left: 5px;
}

@media (min-width:768px){
    .mob{
        display:none !Important;
    }
   
}
@media (max-width:767px){
    .desk{
        display:none !Important;
    }
    
    .sif{
        margin-right:70px !important;
    }
     .up{
       margin-top:10px !important;  
    }
    
    select{
        width:100px;
    }
}
</style>

<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>


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

        <!-- Header -->

<header class="dt-header ">



  <!-- Header container -->

  <div class="dt-header__container">



    <!-- Brand -->

    <div class="dt-brand">



      <!-- Brand tool -->

      <div class="dt-brand__tool" data-toggle="main-sidebar">

        <i style="color:535353;" class="icon icon-apps icon-sm icon-fw"></i>
      </div>

      <!-- /brand tool -->



      <!-- Brand logo -->

      <span class="dt-brand__logo">

        <a class="dt-brand__logo-link" href="login.php">

          <img class="desk dampa" width="159" height="" style="filter: brightness(0) invert(1);" src="yansh.png" alt="ibank">

        </a>

      </span>

      <!-- /brand logo -->


    </div>

    <!-- /brand -->



    <!-- Header toolbar-->

    <div class="dt-header__toolbar">



      <!-- Search box -->

      <form class="search-box d-none d-lg-block" action="searchresult.php" method="get">

        <div class="input-group" >

          <input class="form-control" name="query" placeholder="Type Credit or Debit to show debit or credit records" value="" type="search">

          <span class="search-icon"><i class="icon icon-revenue icon-lg"></i></span>

          <div class="input-group-append">

            <button class="btn btn-danger" type="submit">Search <img style="width:18px; margin-left:4px; margin-top:-4px;"  src="../assets/images/s.png">

            </button>



          </div>

        </div>

      </form>

      <!-- /search box -->

             

      <!-- Header Menu Wrapper -->

      <div class="dt-nav-wrapper">

        <!-- Header Menu -->

        <ul class="dt-nav d-lg-none">

          <li class="dt-nav__item dt-notification-search dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"

               aria-haspopup="true" aria-expanded="false"> <i style="color:535353;" class="icon icon-search icon-fw icon-lg"></i> </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu">



              <!-- Search Box -->

              <form class="search-box right-side-icon">

                <input class="form-control  form-control-lg" name="query" type="search" placeholder="Type Credit or Debit to show debit or credit records">

                <button type="submit" class="search-icon"><i class="icon icon-search icon-lg"></i></button>

              </form>

              <!-- /search box -->

                 

            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->



        <!-- Header Menu -->

      



        <!-- Header Menu -->

        <ul class="dt-nav">

         

          <li class="dt-nav__item dt-notification dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"

               aria-haspopup="true" aria-expanded="false"> <span style="color:535353;">(<?php echo mysql_num_rows($mailreq); ?>)</span><i style="color:535353;" class="icon icon-open-mail icon-fw">
               </i> 
                </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">

              <!-- Dropdown Menu Header -->

              <div class="dropdown-menu-header">

                <h4 class="title"> New Messages (<?php echo mysql_num_rows($mailreq); ?>)</h4>



               
              </div>

              <!-- /dropdown menu header -->



             


              <!-- Dropdown Menu Footer -->

              <div class="dropdown-menu-footer">

                <a href="inbox.php" class="card-link"> View All <i class="icon icon-arrow-right icon-fw"></i>

                </a>

              </div>

              <!-- /dropdown menu footer -->

            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->






        <!-- Header Menu -->

        <ul class="dt-nav">

          <li class="dt-nav__item dropdown">



            <!-- Dropdown Link -->

            <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"

               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <?php if(empty($rowrec1['image'])) { ?>
                    <img class="au" style="border-radius:50px; margin-right:4px; height:60px; width:60px;" width="60" height="60" src="images/sampleprofile.png" alt="ibank">
                <?php } else {  ?>
                
                   <img class="au" style="border-radius:50px; margin-right:4px;" width="40" height="40" src="images/<?php echo $rowrec1['image'] ?>" alt="ibank">
                
                <?php } ?>

          

              <span class="dt-avatar-info d-none d-sm-block">

                <span style="color:535353;" class="dt-avatar-name"><?php echo $_SESSION[customername]; ?></span>

              </span> </a>

            <!-- /dropdown link -->



            <!-- Dropdown Option -->

            <div class="dropdown-menu dropdown-menu-right">

              <div class="dt-avatar-wrapper flex-nowrap p-6 mt--5 bg-gradient-purple text-white rounded-top">

               <?php if(empty($rowrec1['image'])) { ?>
                    <img class="au" style="border-radius:50px; margin-right:4px;" width="40" height="40" src="images/sampleprofile.png" alt="ibank">
                <?php } else {  ?>
                
                   <img class="au" style="border-radius:50px; margin-right:4px;" width="40" height="40" src="images/<?php echo $rowrec1['image'] ?>" alt="ibank">
                
                <?php } ?>

                <span class="dt-avatar-info">

                  <span class="dt-avatar-name">  <?php echo $_SESSION[customername]; ?></span>

                 

                </span>

              </div>

              <a class="dropdown-item" href="myprofile.php"> <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Account

              </a> <a class="dropdown-item" href="password.php">

                <i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Setting </a>
                
             <a class="dropdown-item" href="profileimage.php">  <i class="icon icon-plus icon-fw mr-2 mr-sm-1"></i> Upload Image  </a>

              <a class="dropdown-item" href="logout.php"> <i class="icon icon-logout icon-fw mr-2 mr-sm-1"></i>Logout

              </a>

            </div>

            <!-- /dropdown option -->



          </li>

        </ul>

        <!-- /header menu -->

      </div>

      <!-- Header Menu Wrapper -->



    </div>

    <!-- /header toolbar -->



  </div>

  <!-- /header container -->
   
   


</header>

<!-- /header -->

        <!-- Site Main -->

        <main class="dt-main">

            <!-- Sidebar -->

<aside id="main-sidebar" class="dt-sidebar">

  <div class="dt-sidebar__container">

   <span class="dt-brand__logo">

        <a class="dt-brand__logo-link" href="login.php">

          <img class="mob dampa" width="109" height="" style="filter: brightness(0) invert(1);" src="yansh.png" alt="ibank">

        </a>

      </span>

    <!-- Sidebar Navigation -->

    <ul class="dt-side-nav">



      <!-- Menu Header -->
      <li class="dt-side-nav__item dt-side-nav__header">

       <i class="icon icon-user icon-fw icon-lg"></i> <span class="dt-side-nav__text">Online</span>
       <p style="font-size: 12px; margin-left: 28px; font-weight: normal;">Banking..</p>
      </li>
      

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">My Account</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

     <li class="dt-side-nav__item">

        <a href="dashboard.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-menu icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Dashboard</span> </a>

      

      </li>

      <li class="dt-side-nav__item">

        <a href="myprofile.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-user icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Account Details</span> </a>

      </li>
       <li class="dt-side-nav__item">

        <a href="statement.php" class="dt-side-nav__link" title="Widgets"> <i class="icon icon-financerate icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Account Statement</span> </a>

      </li>
      

 
      

      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Fund Transfer</span>

      </li>

      <!-- /menu header -->

    <li class="dt-side-nav__item">

        <a href="interbank.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-dollar-circle icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Inter-Bank</span> </a>

      </li>

      <li class="dt-side-nav__item">

        <a href="international.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-dollar-circle icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">International Transfer</span> </a>

      </li>
      
      <li class="dt-side-nav__item">

        <a href="bitcoin.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-dollar-circle icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Bitcoin Deposit</span> </a>

      </li>
      <li class="dt-side-nav__item">

        <a href="transferhistory.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-forms-basic icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Transfer History</span> </a>

      </li>
      <!-- /menu item -->




    

      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Loan Account</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

      <li class="dt-side-nav__item">

        <a href="newloan.php" class="dt-side-nav__link" title="Basic Form"> <i class="icon icon-timer icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">New Loan</span> </a>

      </li>

      <li class="dt-side-nav__item">

        <a href="viewloan.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-file-upload icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">View Loan</span> </a>

      </li>

      <!-- /menu item -->
      
      <li class="dt-side-nav__item">

        <a href="payloan.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-dollar icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Pay Loan</span> </a>

      </li>

      <!-- /menu item -->
      
      <li class="dt-side-nav__item">

        <a href="loanpayhistory.php" class="dt-side-nav__link" title="File Upload"> <i class="icon icon-file-upload icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Payment History</span> </a>

      </li>

      <!-- /menu item -->



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Messages</span>

      </li>

      <!-- /menu header -->



      

      <li class="dt-side-nav__item">

        <a href="inbox.php" class="dt-side-nav__link" title="Notifications">

          <i class="icon icon-mail icon-fw icon-lg"></i> <span class="dt-side-nav__text">New Message (<?php echo mysql_num_rows($mailreq); ?>)</span>

        </a>

      </li>

      <li class="dt-side-nav__item">

        <a href="sent.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-send icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Sent Messages</span> </a>

      </li>

      <!-- /menu item -->



      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Account Security</span>

      </li>

      <!-- /menu header -->



      <!-- Menu Item -->

     <li class="dt-side-nav__item">

        <a href="password.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-lockscreen icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Account Password</span> </a>

      </li><li class="dt-side-nav__item">

        <a href="pin.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-forgot-pass icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Transaction Pin</span> </a>

      </li>

    
      <!-- Menu Header -->

      <li class="dt-side-nav__item dt-side-nav__header">

        <span class="dt-side-nav__text">Logout</span>

      </li>

      <li class="dt-side-nav__item">

        <a href="logout.php" class="dt-side-nav__link" title="Drag & Drop"> <i class="icon icon-logout icon-fw icon-lg"></i>

          <span class="dt-side-nav__text">Logout</span> </a>

      </li>

    <!-- /sidebar navigation -->



  </div>

</aside>

<!-- /sidebar -->

