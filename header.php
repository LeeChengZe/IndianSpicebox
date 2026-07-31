<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <?php
        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract a list of category from product table
        $categorySelect = "SELECT * FROM category";

        //execute the SQL statement -- $category_list contains all the category in the product table
        $categoryList = mysqli_query ( $conn, $categorySelect);

        // close sql connection
        mysqli_close($conn);

        ?> 
</head>
<body>
    
    <img id="Logo" src="Images/SpiceboxLogo.jpg" alt="SpiceboxLogo">
    <nav class="mainNav">
        <ul class="nav">
            <li class="navItem">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="navItem">
                <a href="About.php" class="nav-link">About Us</a>
            </li>
            <li class="navItem">
                <a href="products.php" class="nav-link">Products</a>
                <div class="dropdown-menu">
                <ul>
                    <?php While ( $oneCategory= mysqli_fetch_assoc($categoryList)  ) { ?> 
                        <?php 
                            $productPage = "";
                            if ($oneCategory["id"] == 1) {
                                $productPage = "productSpicebox.php";
                            }
                            else if ($oneCategory["id"] == 2) {
                                $productPage = "productSpice.php";
                            }
                            else if ($oneCategory["id"] == 3){
                                $productPage = "productBlend.php";
                            }
                        ?>
                        <li><a href="<?php echo $productPage ?>"><?php echo $oneCategory["categoryName"] ?></a></li>

                    <?php } ?>
                </ul>
                    </div>
                </li>
                <li class="navItem">
                    <a href="Testimonial.php" class="nav-link">Testimonial</a>
                </li>
                <li class="navItem">
                    <a href="recipe.php" class="nav-link">Recipe</a>
                </li>
                <li class="navItem">
                    <a href="Contact.php" class="nav-link">Contact Us</a>
                </li>

            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
</body>
</html>