<?php
   session_start();
   error_reporting(0);
   include("../config/dbconfig.php");
   
   include("header.php");
   
   if(!($_SESSION["adminid"]))
   {
   		header("Location: login.php");
   }
   ?>
<!-- Site Content Wrapper -->
<div class="dt-content-wrapper">
   <!-- Site Content -->
   <div class="dt-content">
      <!-- Page Header -->
      <div class="dt-page__header">
         <h1 class="dt-page__title">Admin Dashboard</h1>
      </div>
      <!-- /page header -->
      <!-- Grid -->
      <div class="row">
         <!-- Grid Item -->
         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="dt-card">
               <? $users = mysql_query("select * from customers"); ?>
               <? $login = mysql_query("select * from customers "); ?>
               <?php	
                  while($arrow = mysql_fetch_array($login))
                  	  { $lastlogin=$arrow[lastlogin];
                  	   ; }?>
               <!-- Card Body -->
               <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                     <i class="icon icon-users dt-icon-bg bg-primary text-primary"></i>
                  </div>
                  <div class="flex-1">
                     <div class="d-flex align-items-center mb-2">
                        <span class="h4 mb-0 font-weight-medium mr-2"><?php echo mysql_num_rows($users); ?> Customers</span>
                     </div>
                     <div class="h5 mb-2">Total Customers</div>
                     <p class="card-text text-light-gray f-12">Last user login <? $query="SELECT MAX(lastlogin) FROM customers"; 
                        $result = mysqli_query($con,$query);
                        
                        while($row = mysqli_fetch_array($result))
                        {
                         print "$row[0]";
                        }
                        ?></p>
                  </div>
               </div>
               <!-- /card body -->
            </div>
            <!-- /card -->
         </div>
         <!-- /grid item -->
         <!-- Grid Item -->
         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="dt-card">
               <!-- Card Body -->
               <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                     <i class="icon icon-revenue dt-icon-bg bg-success text-success"></i>
                  </div>
                  <div class="flex-1">
                     <div class="d-flex align-items-center mb-2">
                        <span class="h4 mb-0 font-weight-medium mr-2"><? $query="SELECT sum(accountbalance) FROM accounts"; 
                           $result = mysqli_query($con,$query);
                           
                           while($row = mysqli_fetch_array($result))
                           {
                            print $cur.' '.number_format($row[0],2);
                           }
                           ?></span>
                        <? $query="SELECT sum(accountbalance) FROM accounts"; 
                           $result = mysqli_query($con,$query);
                           
                           while($row = mysqli_fetch_array($result))
                           {
                            $save=$row[0];
                           }
                           
                            number_format($save,2);
                           ?>
                        <?php 
                           $query="SELECT * FROM  saved "; 
                           $result = mysqli_query($con,$query);
                           $i=0;
                           while($row = mysqli_fetch_array($result))
                           {
                           
                           $savedamount="$row[amount]";}
                           ?>
                     </div>
                     <div class="h5 mb-2">Total Saved</div>
                     <p class="card-text text-light-gray f-12">Last Saved: <? echo $cur.number_format($savedamount,2);?></p>
                  </div>
               </div>
               <!-- /card body -->
            </div>
            <!-- /card -->
         </div>
         <!-- /grid item -->
         <!-- Grid Item -->
         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="dt-card">
               <!-- Card Body -->
               <div class="dt-card__body d-flex flex-sm-column">
                  <div class="mb-sm-7 mr-7 mr-sm-0">
                     <i class="icon icon-revenue2 dt-icon-bg bg-secondary text-secondary"></i>
                  </div>
                  <div class="flex-1">
                     <div class="d-flex align-items-center mb-2">
                        <span class="h4 mb-0 font-weight-medium mr-2"><? $query="SELECT sum(amount) FROM transfers"; 
                           $result = mysqli_query($con,$query);
                           
                           while($row = mysqli_fetch_array($result))
                           {
                            $with=$row[0];
                            
                            print $cur.' '.number_format($row[0],2);
                           }
                           ?></span>
                        <?php 
                           $query="SELECT * FROM  transfers "; 
                           $result = mysqli_query($con,$query);
                           $i=0;
                           while($row = mysqli_fetch_array($result))
                           {
                           
                           $withamount="$row[amount]";}
                           ?>
                     </div>
                     <div class="h5 mb-2">Total Withdrawal</div>
                     <p class="card-text text-light-gray f-12">Last Withdrawal  <? echo "$cur $withamount";?> </p>
                  </div>
               </div>
               <!-- /card body -->
            </div>
            <!-- /card -->
         </div>
         <!-- /grid item -->
         <!-- Grid Item -->
         <div class="col-xl-3 col-sm-6">
            <!-- Card -->
            <div class="dt-card">
               <?php 
                  $query="SELECT * FROM  loan "; 
                  $result = mysqli_query($con,$query);
                  $i=0;
                  while($row = mysqli_fetch_array($result))
                  {
                  
                  $lastloan="$row[loanamt]";}
                  ?>
               <!-- Card Body -->
               
            <!-- /card -->
         </div>
         <!-- /grid item -->
      </div>
      <!-- /grid -->
      
      </head>
      
      
      <!-- Grid -->
      <div class="row">
         <!-- Grid Item -->
         <div class="col-xl-6 order-xl-2">
            <!-- Card -->
            
            <!-- /card -->
         </div>
         <!-- /grid item -->
         <!-- Grid Item -->
         <div class="col-xl-6 order-xl-2">
            <!-- Card -->
            
            <!-- /card -->
         </div>
         <!-- /grid item -->
      </div>
      <!-- /grid -->
   </div>
   <!-- /tab panel -->
</div>

<!-- /tab content-->
<? include("footer.php");?>