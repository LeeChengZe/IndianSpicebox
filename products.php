<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/global.css">
    <link rel="stylesheet" href="Styles/Product.css">
    <?php
        //As due to the cache, sometimes after you check the product descriptions and click back it would show an error message.
        header('Cache-Control: no cache'); //no cache
        session_cache_limiter('private_no_expire'); // works

        session_start();
        $filter ="";
        if(isset($_POST['Cont']))
        {
            $cont_selected = $_POST['Cont'];
            $filter = " WHERE prd.categoryid ='$cont_selected'";
        }
        if(isset($_GET['fsearch']))
        {
            $cont_selected = $_GET['fsearch'];
            $filter = " WHERE prd.productName like '%$cont_selected%' ";
        }
        

        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT prd.*, ctgr.categoryName FROM products as prd inner join category as ctgr on prd.categoryid=ctgr.id " . $filter;

        //execute the SQL statement
        $product_list = mysqli_query ( $conn, $sql_);

        //Write an SQL statement to extract a list of category from product table
        $sql_category = "SELECT * FROM category";

        //execute the SQL statement -- $category_list contains all the category in the product table
        $category_list = mysqli_query ( $conn, $sql_category);

        // close sql connection
        mysqli_close($conn);

        ?> 

</head>
<body>
    <div class="Container">
        <div class="topRectange"></div>

        <form action="#" method="get">
            <input type="search" id="searchBar" placeholder="Search" name="fsearch">
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
                <img src="Images/Products/spiceboxTop.jpg" alt="Spicebox">
                <img src="Images/Products//spicesTop.jpg" alt="Spice">
                <img src="Images/Products/productTop.png" alt="Blend">
            </div>
            <div class="containProducts">
                <h1 class="productHeader">All Products</h1>
                <h2 class="welcome">Feel free to view our products <?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:""; ?></h2>

                    <form id="form1" name="#" method="post">   
                    <div class="filter">
                    Select category:
                    <select name="Cont" id="Cont">
                        <?php While ( $one_category= mysqli_fetch_assoc($category_list)  ) { ?> 
                        
                            <option value="<?php echo $one_category['id']; ?>">
                                <?php echo $one_category['categoryName']; ?>
                            </option>
                    
                        <?php } ?>
                    </select>
                    <input type="submit" name="submit" class="filterButton" value="Show Product">
                    <input type="reset" value="Clear" class="filterButton" onclick="remove()">
                    </div>
                    </form>

                    <script>
                    function remove() {
                        window.location.href = "products.php";
                    }
                    </script>
                    <br>

                    <div id="productWrap">
                    <?php While ( $one_product = mysqli_fetch_assoc($product_list)  ) { ?> 
                    
                    <div class="productContainer">
                        <a href="productdetails.php?id=<?php echo $one_product['id']; ?>"><img class="image" src="Images/Products/<?php echo $one_product['productPicture']; ?>" alt="P1"></a>
                        
                        <h3 class="productName"><a href="productdetails.php?id=<?php echo $one_product['id']; ?>"><?php echo $one_product['productName']; ?></a></h3>
                        <h4 class="category"><?php echo $one_product['categoryName']; ?></h4>
                        <h5 class="price">Price $<?php echo number_format($one_product['unitPrice'],2); ?></h5>
                        
                        
                        <form action="insertcart.php" method="post">
                            <div id="button"><button class="cart" type="submit">Add to Cart</button></div>
                            <input type="hidden" name="pid" value="<?php echo $one_product['id']; ?>">
                            <input type="hidden" name="puprice" value="<?php echo $one_product['unitPrice']; ?>">
                        </form>
                    </div>

                    <?php }  ?>
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