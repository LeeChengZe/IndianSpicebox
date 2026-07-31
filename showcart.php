<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/showcart.css">
    <script src="Scripts/cart.js"></script>
    <?php
        session_start();
        $uid = isset($_SESSION['SV_UserID'])?$_SESSION['SV_UserID']:"NA";

        if ($uid != "NA")
        {
            $filter =" WHERE ct.memid is NULL";
            if(isset($_SESSION['SV_UserID']))
            {
                $uid = $_SESSION['SV_UserID'];
                $filter = " WHERE ct.memid ='$uid'";
            }

            //open connection and select database
            require("sql_connection.php");

            //Write an SQL statement to extract data from product table
            $sql_ = "SELECT ct.id,ct.quantity,ct.unitPrice, prd.productName, prd.productPicture FROM carts ct INNER JOIN products prd on ct.productid=prd.id " . $filter;

            //execute the SQL statement
            $cart_list = mysqli_query ( $conn, $sql_);

            // close sql connection
            mysqli_close($conn);
        }
        else {
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

        <section>
            <h1 class="Header"><?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:"NA"; ?> Shopping Cart</h1>
            <p class="backtoshop"><a href="products.php">Back to shop</a></p>
            <table class="orderTable">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                </tr>
                
                <?php $grandtotal = 0;
                    While ( $one_cart = mysqli_fetch_assoc($cart_list)  ) { ?>  
                
                <tr>
                    <td><form action="deletecart.php" method="post">
                            <input type="submit" value="X" class="deleteButton">
                            <input type="hidden" name="cid" value="<?php echo $one_cart['id']; ?>">
                        </form></td>
                    <td class="productImgWrap"><img class="productImg" src="images/Products/<?php echo $one_cart['productPicture']; ?>" alt="productPicture"></td>
                    <td><?php echo $one_cart['productName']; ?></td>
                    <td>$<?php echo number_format($one_cart['unitPrice'],2); ?></td>
                    <td><?php echo $one_cart['quantity']; ?></td>
                    <td>$<?php echo number_format(($tcost = $one_cart['unitPrice']*$one_cart['quantity']),2); ?></td>
                    <td>
                    <form action="updatecart.php" method="post">
                            <input type="hidden" name="cid" value="<?php echo $one_cart['id']; ?>">
                            <input type="number" id="quantity" name="nqty" min="1" value="<?php echo $one_cart['quantity']; ?>" >
                            <input id="updateBtn" class="updateBtn" type="submit" value="Update" onclick="totalQuantity()">
                        </form>
                    </td>
                </tr>
                <?php $grandtotal += $tcost;
                    }  ?> 
                </table>
                <div class="checkoutTable">
                    <h2 class="checkoutHeader">Cart Total</h2>
                    <p> Grand total is $<?php echo number_format($grandtotal,2) ; ?></p>

                    <form class="checkoutDate" action="checkout.php" method="post" onsubmit="return isConfirm()">
                        <div>Require date: <input type="datetime-local" name="reqdate"></div>
                        <br>
                        <input class="checkoutBtn" type="submit" value="Checkout">
                        <input type="hidden" name="gtt" value="<?php echo number_format($grandtotal,2); ?>">
                    </form>
                </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>