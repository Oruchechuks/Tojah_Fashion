<?php
$con = mysql_connect("localhost","equimwxl_tojah","equimwxl_tojah");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("equimwxl_tojah");
?>


<?php
$con = new mysqli("localhost", "equimwxl_tojah", "equimwxl_tojah", "equimwxl_tojah");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>