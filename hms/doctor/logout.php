<?php
error_reporting(0);
session_start();
include('include/config.php');
$_SESSION['dlogin']=="";
date_default_timezone_set('Asia/Manila');
$ldate=date('Y-m-d h:i:s A',time ());
mysqli_query($con,"UPDATE staff_logs  SET log_out = '$ldate' WHERE uid = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logged out";
?>
<script language="javascript">
document.location="index.php";
</script>
