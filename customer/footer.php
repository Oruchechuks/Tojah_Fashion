<?

$dts =  date("l jS \of F Y ");

$query="SELECT * from system_settings"; 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
$bname=$row['bank_name'];
								   
 }?>
                <!-- Footer -->
<div align="">
<footer class="dt-footer">
    <div style="text-align:center !Important; width:100%;" class="footer-cen">

<!-- GOOGLE TRANSLATOR -->
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- END TRANSLATOR -->

      
    <p style="margin-bottom:10px; text-align: center; font-family:nunito;">©2022  Tojah Fashionhouse Bank, All Rights Reserved</p>
    Date: <?php
echo date("l jS \of F Y ");
?>
  <!--<?php echo $bname;?> © <?php echo date("Y");?> 
    <ul id="hor">
  <li><a href="#">Accessibility</a> <span id="ctl00_footer_ctl00_FooterSeparator1">.</span></li>
  <li><a href="#">Legal Info</a> <span id="ctl00_footer_ctl00_FooterSeparator1">.</span></li>
  <li><a href="#">Security</a> <span id="ctl00_footer_ctl00_FooterSeparator1">.</span></li>
  <li><a href="#">Privacy and Cookies</a></li>
</ul> -->
</div>
</footer>


</div>

<!-- /root -->

<!-- Optional JavaScript -->

<script src="../node_modules/jquery/dist/jquery.min.js"></script>

<script src="../node_modules/moment/moment.js"></script>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Perfect Scrollbar jQuery -->

<script src="../node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>

<!-- /perfect scrollbar jQuery -->



<!-- masonry script -->

<script src="../assets/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>

<script src="../assetsnode_modules/sweetalert2/dist/sweetalert2.js"></script>

<script src="../assets/js/functions.js"></script>

<script src="../assets/js/customizer.js"></script><script src="../node_modules/chart.js/dist/Chart.min.js"></script>




<!-- Resources -->

<script src="../assets/node_modules/ammap3/ammap/ammap.js"></script>

<script src="../assets/node_modules/ammap3/ammap/maps/js/continentsLow.js"></script>

<script src="../assets/node_modules/ammap3/ammap/themes/light.js"></script>



<script src="../assets/node_modules/amcharts3/amcharts/amcharts.js"></script>

<script src="../assets/node_modules/amcharts3/amcharts/gauge.js"></script>



<script src="../assets/js/custom/charts/dashboard-default.js"></script>

<!-- Custom JavaScript -->

<script src="../assets/js/script.js"></script>





<!-- /footer -->
