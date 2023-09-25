<?php
//start session new that has no user id thus user will be logged out from the a/c
session_start();
$_SESSION['user_id']=null;
echo "<script>alert('logout request successful');window:open('home.php','_self')</script>";
?>