<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/recipeDetails.css">
    <?php
        session_start();
        $filter ="";
        if(isset($_GET['id']))
        {
            $recipeid = $_GET['id'];
            $filter = " WHERE id ='$recipeid'";
        }

        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT * FROM recipe" . $filter;

        //execute the SQL statement
        $recipeList = mysqli_query ( $conn, $sql_);

        // close sql connection
        mysqli_close($conn);

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
            <div class="detailContainer">
            <?php $one_recipe = mysqli_fetch_assoc($recipeList) ?> 
            <h1 class="recipeName"><?php echo $one_recipe['Name']; ?></h1>
            <p class="backtoRecipe"><a href="Recipe.php">View other recipes</a></p>

            <div class="detailWrap">
                <input class="image" type=image src="images/Recipe/<?php echo $one_recipe['Picture']; ?>">

                <div class="productDesc">
                    <p class="time"><b>Preparation Time:</b> <?php echo $one_recipe['Time']; ?></p>
                    <p class="serve"><b>Serving Size:</b> <?php echo $one_recipe['Serve']; ?></p>
                    <hr>
                    <div class="aboutContainer">
                        <h2 class="aboutHeader header">About</h2>
                        <p class="about"><?php echo $one_recipe['About'] ?></p>
                    </div>
                </div>

                <div>
                    <h2 class="ingredientHeader header">Ingredients</h2>
                    <p class="about"><?php echo $one_recipe['Ingredients'] ?></p>
                </div>
                <div>
                    <h2 class="preparationHeader header">Preparation</h2>
                    <p class="about"><?php echo $one_recipe['Preparation'] ?></p>
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