<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/productDetails.css">
    <?php
        session_start();
        $filter ="";
        if(isset($_GET['id']))
        {
            $prodid = $_GET['id'];
            $filter = " WHERE id ='$prodid'";
        }

        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT * FROM products" . $filter;

        //execute the SQL statement
        $product_list = mysqli_query ( $conn, $sql_);

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
            <div class="detailWrap">
            
                <?php $one_product = mysqli_fetch_assoc($product_list) ?>  
            
                
                <input class="image" type=image src="images/Products/<?php echo $one_product['productPicture']; ?>">

                <div class="productDesc">
                    <p class="productName"><?php echo $one_product['productName']; ?></p>
                    <p class="price">Price: $<?php echo number_format($one_product['unitPrice'],2) ?></p>
                    <p class="description"><?php echo $one_product['productDescription'] ?></p>

                    <form action="insertcart.php" method="post">
                            <div id="button"><button class="cart" type="submit">Add to Cart</button></div>
                            <input type="hidden" name="pid" value="<?php echo $one_product['id']; ?>">
                            <input type="hidden" name="puprice" value="<?php echo $one_product['unitPrice']; ?>">
                </form>
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