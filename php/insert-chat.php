<?php
session_start();
if(isset($_SESSION['UserID']))
{
    include_once "config.php";
    $outgoing_id = $_SESSION['UserID'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
   if(!empty($message))
    {
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();

        if($sql)
        {
            echo "eureka";
        }
        else{
            echo "something went wrong";
        }
    }
    }
else{
    header("../login.php");
}
?>