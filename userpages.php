<?php
session_start();
if(!isset($_SESSION['UserID']))
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<!-- Coding by Olamide Owolabi learned from coding Nepal-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content ="width=device-width, inital-scale=1.0">
        <meta http-equiv ="X-UA-Compatible" content ="ie-edge">
        <title> RealTime Chat App | OlaOwo</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous' defer></script>
        <script src="JavaScript/user.js" defer></script>
    </head>
    <body class ="chatbody">
        <div class="wrapper">
            <section class="users">
                <header>
                    <?php
                    include_once "php/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['UserID']}");
                    if(mysqli_num_rows($sql))
                    {
                        $row = mysqli_fetch_assoc($sql);

                    }
                    ?>
              <div class="content">
                <img src="php/images/<?php echo $row['img']?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " , $row['lname'] ?></span>
                    <p><?php echo $row ['status']?></p>
                </div>
              </div>
              <a href="php/logout.php?userid=<?php echo $row['unique_id']?>" class="logout">LogOut</a>
              </header>
              <div class="search">
                <span class="text">Select an use to Start Chat with</span>
                <input type="text" placeholder="Enter Name to Search...">
                <button> <i class="fas fa-search"></i></button>
              </div>
              <div class="users-list">
             
              </div>
            </section>
        </div>
    </body>
</html>