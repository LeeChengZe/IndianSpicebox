<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/Testimonials.css">
    <?php
        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT * FROM testimonial";

        //execute the SQL statement
        $testimonialList = mysqli_query ( $conn, $sql_);

        // close sql connection
        mysqli_close($conn)
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
            <div id="imageContainer">
                    <img src="Images/Testimonial/testimonialSpicebox.jpg" alt="Spicebox">
                    <img src="Images/Testimonial/Blends.jpg" alt="Spice">
                    <img src="Images/Testimonial/Cumin.jpg" alt="Blend">
            </div>

            <div class="reviewContainer">
                <h1 class="Header">Testimonial</h1>
                <h2 class="subHeader">Here are some of our customers reviews</h2>

                <?php While ($one_rating= mysqli_fetch_assoc($testimonialList)) { ?> 
                <div class="reviewWrap">
                    <div class="Review">
                        <p><?php echo $one_rating['Description']; ?></p>
                        <div class="person">
                            <img class="personImg" src="Images/Testimonial/Person/<?php echo $one_rating['ProfilePicture']; ?>" alt="Person">
                            <p class="name"><?php echo $one_rating['Name']; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
           
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>