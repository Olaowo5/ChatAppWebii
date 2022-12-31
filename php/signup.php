<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$errormes  = "None";

$status = " ";
 //for unique ID
 $ran_id = rand(time(), 100000000);


if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
{
   
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'"); //check email
    if(mysqli_num_rows($sql) > 0){
        echo "$email - This email already exist!";
        $errormes = $email;
    }
    else{
        //insert into database
        $img_name = $_FILES['image']['name']; //getting user upload picture
        $img_type = $_FILES['image']['type']; //getting user upload img type
        $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in folder

        //letexplode image and get the last extension jpg png
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode); //here we get the extension of an user uploaded img file

        $extensions = ['png', 'jpeg', 'jpg']; //these are some of the img ext and we've store in the array
        if(in_array($img_ext,$extensions) === true)
        {
            //making sure user uploaded a file that matches the nextension
            $time = time(); //get current time
            //will use time in naming the image when we uploade in a folder

            $new_img_name = $time.$img_name;
            if(move_uploaded_file($tmp_name, "images/".$new_img_name))
            {

           
                $status= "Active Now";

                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, status, img)
                VALUES ({$ran_id},'{$fname}','{$lname}', '{$email}', '{$password}', '{$status}', '{$new_img_name}')");
                if($insert_query){
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['UserID'] = $result['unique_id'];
                        echo "success";
                    }else{
                        echo "This email address not Exist! Something went wrong";
                    }
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }
        }
        else{
            echo "Please upload an image with the extension png, jpg, jpeg";
        }

      
    }
}
else{
    echo "All Input field are required!";
}
?>