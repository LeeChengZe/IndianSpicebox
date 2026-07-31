<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/logins.css">

    <script type="text/javascript">
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
            }
    </script>
</head>
<body>
    <div class="Container">
        <div class="topRectange"></div>

        <form action="process.php" method="post">
            <input type="search" id="searchBar" placeholder="Search">
        </form>

        <div id="memberCart">
            <div class="memberContainer iconContainer">
                <a href="dashboard.php"><img class="icons" src="Images/Icons/Member.png" alt="memberIcon"></a>
                <a href="dashboard.php">Membership</a>
            </div>
            <div class="cartContainer iconContainer">
                <a href="showcart.php"><img class="icons" src="Images/Icons/Cart.png" alt="cartIcon"></a>
                <a href="showcart.php">Cart</a>
            </div>
        </div>
        
        <header>
            <?php require("header.php") ?>
        </header>
        
        <section>
            <div class="loginContainer">
                <div class="formWrap">
                    <h1 class="Header">Welcome</h1>

                    <form id="form1" name="form1" method="post" action="checklogin.php">
                        <p><label for="username">Email:</label></p>
                        <input class="userInfo" type="email" name="uemail" id="uemail" placeholder="Enter your email"><p>
                        <p><label for="password">Password:</label></p>
                        <input class="userInfo" type="password" name="password" id="password" placeholder="Enter your password"><p>
                        <input type="submit" name="submit" id="submit" value="Login">
                        <?php 
                            $val = isset($_GET['stt'])?$_GET['stt']:"";
                            
                            if($val==1) 
                                echo "<b>Invalid username or password</b>";
                            else if ($val==2) 
                                echo "<b>You have successfully logout</b>";
                            else if ($val==3) 
                                echo "<b>Please login before you can proceed</b>";
                            else if ($val==4) 
                                echo "<b>Successfully Registered</b>";
                        ?>
                        </form>
                        
                        <p><br><a class="forgetPassword" href="forgetpass.php">Forget Password</a></p>

                        <p><br><a class="toRegister" href="Register.php">Not a member? Click here to register</a></p>

                    </div>

                    <video class="loginVideo" autoplay loop muted>
                            <source src="Login_Register/SpiceboxVideo.mp4" type="video/mp4">
                    </video>
                </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>