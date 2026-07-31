<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/Dashboard.css">
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
                header("Location:login.php");
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

        <section>
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
                        <h2 class="Header">Dashboard</h2>
                        <p>Welcome, <?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:""; ?> (Not <?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:""; ?>? <a class="notUser" href="logout.php">Log Out</a>)</p>
                        <br>
                        <p>Able edit your profile, and view your order history.</p>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>