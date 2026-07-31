<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/editProfile.css">

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

    <?php
            session_start();
            $uid = isset($_SESSION['SV_UserID'])?$_SESSION['SV_UserID']:"NA";
            

            if ($uid != "NA")
            {
                //open connection and select database
                require("sql_connection.php");

                //Write an SQL statement to extract data from product table
                $sql_ = "SELECT * FROM members WHERE id = $uid" ;

                //execute the SQL statement
                $search_result = mysqli_query ( $conn, $sql_);

                // close sql connection
                mysqli_close($conn);
            }
            else
            {
                header("Location:login.php?stt=3");
            }
        ?>
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
        
        <section id="registerWrap">
            <div class="dashContainer">
                    <?php $one_user = mysqli_fetch_assoc($search_result) ?> 
                    <div class="dashboardTop">
                        <div class="userInfo">
                            <img class="profilePic" src="<?php echo $one_user['profilePicture']; ?>" alt="ProfilePicture">
                            <h2 class="username"><?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:""; ?></h2>
                        </div>
                        
                        <a href="logout.php"><img class="logout" src="Images/Icons/logout.png" alt="LogOut"></a>
                    </div>
                    <div class="dashboardBottom">
                        <ul class="sideMenu">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="editprof.php">Edit Profile</a></li>
                            <li><a href="showorderhist.php">Order History</a></li>
                        </ul>

                        <div class="Content">
                            <h2 class="Header">Edit Profile</h2>
                            <form action="updateprof.php" method="post" enctype="multipart/form-data">
                                <p><label for="uemail">Email:</label></p>
                                <input type="email" class="userDetail" name="uemail" readonly value="<?php echo $one_user['email']; ?>">

                                <p><label for="uname">Name:</label></p>
                                <input type="text" class="userDetail" name="uname" required value="<?php echo $one_user['memberName']; ?>">

                                <p><label for="password">Password:</label></p>
                                <input name="password" class="userDetail" id="password" type="password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo $one_user['password']; ?>">

                                <div id="passwordRequire">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>

                                <p><label for="comfirm_password">Name:</label></p>
                                <input type="password" class="userDetail" name="confirm_password" id="confirm_password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo $one_user['password']; ?>">
                                
                                <p><label for="uhp">Contact:</label></p>
                                <input type="tel" class="userDetail" name="uhp" pattern="[0-9]{8}" required value="<?php echo $one_user['phoneNumber']; ?>">

                                <p><label for="uaddr">Address:</label></p>
                                <textarea name="uaddr" id="uaddr" cols="30" rows="3"><?php echo $one_user['deliveryAddress']; ?></textarea>

                                <input class="submit" id="submit" type="submit" value="Update" onclick="return Validate()">
                                <span id='message'></span> 
                        </form>
                        <div>
                            <?php 
                                $val = isset($_GET['stt'])?$_GET['stt']:"";
                                    
                                if($val==1) 
                                    echo "<b>Successfully Updated</b>";
                                elseif($val ==2)
                                    echo "<b>Edit Profile Failed";
                            ?>
                        </div>

                        <hr>
                        <h2 class="Header">Change Profile Image</h2>
                        
                        <form action="updateImage.php" method="post" enctype="multipart/form-data">
                            <p><label for="uprofpic">Profile Picture: </label></p>
                            <input type="file" name="uprofpic" id="uprofpic"><br>
                            <input class="submit" type="submit" value="Upload">

                            <span>
                                <?php 
                                    if($val ==3)
                                        echo "Image Changed";
                                    else if ($val == 4)
                                        echo "Invalid file type";
                                    else if ($val == 5)
                                        echo "file is to large";
                                ?>
                            </span>
                        </form>
                            
                            
                        </div>
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