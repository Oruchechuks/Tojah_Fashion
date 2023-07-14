
<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");

include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');

$acc= mysql_query("select * from accounts where customerid='".$_SESSION['customerid']."'");
?>
<!-- Site Content Wrapper -->

          <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header"> Bition Deposit

                    </div>

<title>Deposit | Tojah Fashionhouse </title>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div id="google_translate_element" class="text-center mb-2"></div>
      <h1>
        Deposit Funds
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Deposit Funds</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-sm-12">
                </div>
    </div>  

      <div class="row">
        <div class="col-md-12"><h6>Make your bitcoin deposit and send us a proof of payment via mail.</h6><br></div>
        <!-- Box Comment -->
          <div class="box box-widget">
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-fluid pad" src="images/bitcoin.png" alt="Bitcoin">

              <button type="button" class="btn btn-default btn-block btn-lg bg-blue-active" data-toggle="modal" data-target="#bitcoin"><i class="fa fa-share"></i> Here to Continue</button>
              <!-- Modal -->
              <div class="modal fade text-left" id="bitcoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
              aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel1">Deposit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body mx-auto">
                      <h5 class="text-center mt-20">Transfer bitcoin (BTC) address</h5><br>
                      <p>Once we confirm your payment, your account will be funded instantly. Please note that there is a minimum deposit of 200 USD.</p>

                      <center>
                        <p class="mb-20">
                          <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=bc1ql5jt2ygece2ralptg3m6mqezrwqdnk9fcw3nnf" />
                        </p>
                      </center>

                      <div class="input-group mb-20">
                        <input id="myInput" type="text" class="form-control text-center" readonly="readonly" value="bc1ql5jt2ygece2ralptg3m6mqezrwqdnk9fcw3nnf">
                        <span style="display: inline;" class="input-group-btn">
                          <button onclick="this.innerHTML='Copied'; this.classList.remove('btn-success');this.classList.add('btn-warning');" class="btn btn-success" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" data-clipboard-target="#myInput" title="Copy to Clipboard">Copy</button>
                        </span>
                      </div>

                      <center>
                        <a href="bitcoin:<?=$wallet?>" class="btn btn-success btn-lg mb-20" style="font-size: 12px; font-weight: bold;">Pay Using BTC Wallet App</a>
                      </center>
                        <p class="lead mb-20">If you don't know how to buy bitcoin <a href="https://www.buybitcoinworldwide.com" target="_blank" class="text-success">Click Here</a></p>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn grey btn-outline-secondary pull-right" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- C

	</section>

  </div>
 /.content-wrapper -->
 <link rel="stylesheet" href="../assets/css/custom.css">

<?php
    include "footer.php";
                    ?>
<script src="js/clipboard.min.js"></script>
  <script>
      new ClipboardJS('#copy-button');
  </script>



