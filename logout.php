<?php

include "db.php";
session_start();

$get_user = $_SESSION['cuser'];
$update_status = "UPDATE chatusers set cstatus='Offline' where  cusername='$get_user' ";
$update = mysqli_query($con,$update_status);
session_unset();
session_destroy();
header("Location:user_signin.php");

?>