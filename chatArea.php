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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css/">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous' defer></script>
        <script src="JavaScript/chat.js" defer></script>
    </head>
    <body class="chatbody">
        <div class="wrapper">
            <section class="chat-area">
            <header class ="chatheader">

            <?php
                    include_once "php/config.php";
                    $userid = mysqli_real_escape_string($conn,$_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$userid}");
                    if(mysqli_num_rows($sql))
                    {
                        $row = mysqli_fetch_assoc($sql);

                    }
                    ?>

           <a href="userpages.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img']?>" alt="">
                <div class="details">
                <span><?php echo $row['fname'] . " " , $row['lname'] ?></span>
                    <p><?php echo $row ['status']?></p>
                </div>
              
            </header>
             <div class="chat-box">
               
             </div>
             <form action="#" class="typing-area" autocomplete = "off">
             <input type="text" name="outgoing_id" value="<?php echo $_SESSION['UserID']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $userid; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message">
                <button id="sndBtn"><i class="fab fa-telegram-plane"></i></button>
             </form>
             
            </section>
        </div>
    </body>
</html>