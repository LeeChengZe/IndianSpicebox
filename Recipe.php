<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/Recipes.css">
    <?php
        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT * FROM recipe";

        //execute the SQL statement
        $recipeList = mysqli_query ( $conn, $sql_);

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
                <div class="recipeContainer">
                    <h1 class="recipeHeader">Recipe</h1>
                    <?php While ($one_recipe= mysqli_fetch_assoc($recipeList)) { ?> 
                        <div class="recipeWrap">
                            <a href="recipedetails.php?id=<?php echo $one_recipe['id']; ?>"><img class="image" src="Images/Recipe/<?php echo $one_recipe['Picture']; ?>" alt="P1"></a>
                            <div class="recipeDescription">
                                <p class="recipeName"><?php echo $one_recipe['Name']; ?></p>
                                <p class="Description"><?php echo $one_recipe['Description']; ?></p>
                                <p class="readBtn"><a href="recipedetails.php?id=<?php echo $one_recipe['id']; ?>">Read More</a></p>
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