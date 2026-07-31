<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/forgetP.css">

    <script type="text/javascript">
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Not Matching';
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
            <div class="forgetContainer">
                <div class="passwordContainer">
                    <div class="logo"></div>

                    <form method="post" action="passwordprocess.php">
                        <p><label for="uemail">Email:</label></p>
                        <input class="userInfo" type="email" name="uemail" placeholder="Enter your email" required>
                        
                        <p><label for="password">New Password:</label></p>
                        <input class="userInfo" name="password" id="password" type="password" placeholder="Enter your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onkeyup='check();'>

                        <br>
                        <div id="passwordRequire">
                            <h3>Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>

                        <p><label for="confirm_password">Comfirm New Password:</label></p>
                        <input class="userInfo" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required onkeyup='check();'>
                        
                        <input id="submit" type="submit" value="Submit" onclick="return Validate()">
                        <span id='message'></span>
                    </form>
                    <?php 
                            $val = isset($_GET['stt'])?$_GET['stt']:"";
                            
                            if($val==1) {
                                echo "<b>No such user</b>";
                            }
                                
                            else if($val==2) {
                                echo "<b>Password updated</b>";
                            }

                            
                        ?>
                </div>
            </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
    <script src="Scripts/RegisterValidation.js"></script>
</body>
</html>