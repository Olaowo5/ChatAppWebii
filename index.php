<?php
session_start();

if(isset($_SESSION['UserID'])){
    //if user is logged in go to the users page
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
        <script src="JavaScript/signup.js" defer></script>
    </head>
    <body>
        <div class="wrapper">
            <section class="form signup">
                <header> RealTime Chat App</header>
                <form action="#" enctype="multipart/form-data">
                    <div class="error-txt">This is an error message</div>
                    <div class="name-details">
                        <div class=" field input">
                            <label> First Name</label>
                            <input type="text" id="FirstN" name ="fname"placeholder ="First Name" required>
                        </div>
                        <div class=" field input">
                            <label>Last Name</label>
                            <input type="text" id="LastN" name="lname" placeholder="Last Name" required>

                        </div>
                    </div>
                        <div class=" field input">
                            <label>Email Address</label>
                            <input type="text" id="EmailA" name="email" placeholder="email Address" required>
                            
                        </div>
                        <div class=" field input">
                            <label>Password</label>
                            <input type="password"  name="password" id="passfield" placeholder="Enter Password" required>
                            <i class="fas fa-eye" id="togglei"></i>
                        </div>
                        <div class=" field input">
                            <label>Password</label>
                            <input type="password" id="passfieldii" placeholder="Confirm Password" required>
                            <i class="fas fa-eye" id ="toggleii"></i>
                        </div>
                        <div class=" field image">
                            <label>Select Image</label>
                            <input type="file" id="UserPic" name="image" required>
                            
                        </div>
                        <div class=" field button">
                           <input type="submit" value="Continue To Chat">
                            
                        </div>
                   
                </form>
                <div class="link">Already signed up? <a href="login.php">Login</a></div>
            </section>
        </div>
       
    </body>
   
</html>