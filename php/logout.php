<?php
session_start();

if(isset($_SESSION['UserID'])){
    //if user is logged in then ocme to this page else go to the login page
   include_once "config.php";

   $logout_id = mysqli_real_escape_string($conn, $_GET['userid']);

   if(isset($logout_id)){
    //if logout id is set

    $status = "Offline Now";
    //once logout update the dataable
    //navigate to the login page
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['userid']}");
    if($sql){
        session_unset();
        session_destroy();
        header("location: ../login.php");
    }
   }else{
    header("location: ../login.php");
   }
}
else{
    header("location: ../login.php");
}
?>