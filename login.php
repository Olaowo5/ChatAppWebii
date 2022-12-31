<?php 
  session_start();
  if(isset($_SESSION['UserID'])){
    header("location: userpages.php");
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
        <script src="JavaScript/passshow.js" defer></script>
        <script src="JavaScript/login.js" defer></script>
    </head>
    <body>
        <div class="wrapper">
            <section class="form login">
                <header> RealTime Chat App</header>
                <form action="#">
                    <div class="error-txt">This is an error message</div>
                   
                        <div class=" field input">
                            <label>Email Address</label>
                            <input type="text" id="EmailA" name="email" placeholder="Email Address">
                            
                        </div>
                        <div class=" field input">
                            <label>Password</label>
                            <input type="password" id="passfield"  name="password" placeholder="Enter Password" id="passfield">
                            <i class="fas fa-eye"  id="togglei"></i>
                        </div>
                       
                        <div class=" field button">
                           <input type="submit" value="Continue To Chat">
                            
                        </div>
                   
                </form>
                <div class="link">Not signed up? <a href="index.php">SignUp</a></div>
            </section>
        </div>
    </body>
</html>