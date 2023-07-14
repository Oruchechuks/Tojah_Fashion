<?php
session_start();
error_reporting(0);
include("../config/dbconfig.php");
include("header.php");

if(!(isset($_SESSION['customerid'])))
    header('Location:login.php?error=nologin');


$acc= mysql_query("select * from accounts where accno='$_POST[accno]'");
while($rows = mysql_fetch_array($acc))
{
	$Accountnumber = $rows["accno"];
	$Accountbalance= $rows["accountbalance"];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");
?>
<!-- Site Content Wrapper -->

              <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    
                    <!-- /page header -->
 <div class="dt-entry__header">

Statement Of Account

                    </div>


                        <!-- Grid Item -->
                        <div class="col-xl-12">

                            </div>
                            <!-- /entry header -->

                            <!-- Card -->
                            <div class="dt-card">

                                <!-- Card Body -->
                                <div class="dt-card__body">
 
                                    <!-- Tables -->
                                    <div class="table-responsive">

<table id="data-table" class='table table-striped table-bordered table-hover'> <div class="row">
<thead>
      <tr>
												<th><b>Date</b></th>
                                                <th><b>Transaction ID</b></th>
                                                <th><b>Amount Debited</b></th>
                                                <th><b>Withdrawals</b></th>
                                                <th><b>Amount Credited</b></th>
                                                <th><b>Withdrawn</b></th>
                                                <th><b>Account</b></th>
                                                <th><b>Amount</b></th>
      </tr>
      </thead>
                                            <tbody>
    
    <?php 
       
            $customid=$_SESSION['customerid'];
            $count=1;
            $query="SELECT * FROM transactions WHERE (payeeid='$customid') OR (receiveid='$customid') OR (charged='$customid')";
            $result=mysql_query($query);
            while(($arrvar = mysql_fetch_array($result)))
            {
                                    echo " <tr> <td>".$arrvar[paymentdate]."</td> ";
                                
                                     echo"<td>".$arrvar['transactionid']."</td>";
                                    if ($arrvar['payeeid']==$customid)
                                    {   echo "<td> </td><td>$cur$arrvar[amount]</td>";
                                        $q="SELECT * FROM registered_payee WHERE slno='".$arrvar['receiveid']."'";
                                         $r=  mysql_query($q);
                                     
                                     $rarry= mysql_fetch_array($r);
                                     echo "<td> </td><td>$rarry[payeename]</td>";
                                     echo "<td></td><td>$cur$arrvar[amount]</td> ";
                                    }
                              else if ($arrvar['receiveid']==$customid)
                              {echo "<td> </td><td> </td> <td>$cur$arrvar[amount]</td>";
                                  $r=  mysql_query("SELECT * FROM customers WHERE customerid='".$arrvar['payeeid']."'");
                                     $rarry= mysql_fetch_array($r);
                                       echo "<td> </td><td> $_SESSION[customername]; </td>";
                                       echo "<td> $cur $arrvar[amount] </td> ";
                              }
                              
                               if ($arrvar['charged']==$customid)
                              {echo " <td>$cur $arrvar[amount]</td>";
                                       
                                       echo "<td> </td> <td> </td> <td> </td> <td> </td> <td>$cur$arrvar[amount]</td>";
                              }
                              
            }
        
        
    ?>
       </tbody>
                                            <tfoot>
                                            <tr>
                                                <th><b>Date</b></th>
                                                <th><b>Transaction ID</b></th>
                                                <th><b>Debit</b></th>
                                                <th><b>Withdrawals</b></th>
                                                <th><b>Credit</b></th>
                                                <th><b>Withdrawn</b></th>
                                                <th><b>Account</b></th>
                                                <th><b>Amount</b></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /tables -->

                                </div>
                                <!-- /card body -->
                                  <link rel="stylesheet" href="../assets/css/custom.css">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                            </div></div>
                            <!-- /card -->

                  
                <!-- /site content -->

<link rel="stylesheet" href="../assets/css/custom.css">
                </div></div></div>

<?php include'footer.php' ?>
    
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="../assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../assets/js/custom/data-table.js"></script>
<script>
 window.onload = function(){
  var button = document.getElementById('button2'),
    form = button.form;

  form.addEventListener('submit', function(){
    return false;
  })

  var times = 1;   //Here put the number of times you want to auto submit
  (function submit(){
    if(times == 1) return;
    form.submit();
    times--;
    setTimeout(submit, 0.1);   //Each second
  })(); 
}
}
</script>