

<?php
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

    if(mysqli_num_rows($sql)>0) //if uysers credentials match
    {

        $row = mysqli_fetch_assoc($sql);
       
        $rowpassword = $row['password'];

        if($password === $rowpassword)
        {
       
            $status = "Active Now";

            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2){
                        $_SESSION['UserID'] = $row['unique_id']; //using the this session
                        echo "success";
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
            }
            else{
                echo "Email or Password is Incorrect!";
            }
    }
    else{
        echo "Email Doesnt Exist";
    }
?>