<?php
include('connection.php');
session_start();
$_SESSION['login']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'Y-m-d h:i:s ', time() );
$res=mysqli_query($conn,"UPDATE user_log  SET logout_time = '$ldate' , status =0  WHERE user_email = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
if(!$res){
  die("Error in logout".mysqli_error($conn));
}
session_unset();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="main.php";
</script>
