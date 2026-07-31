<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="Styles/Reset.css">
    <link rel="stylesheet" href="Styles/Global.css">
    <link rel="stylesheet" href="Styles/orderHistorys.css">
    <?php
        session_start();
        $filter =" WHERE o.memberid is NULL";
        if(isset($_SESSION['SV_UserID']))
        {
            $uid = $_SESSION['SV_UserID'];
            $filter = " WHERE o.memberid ='$uid'";
        }
        
        $productfilter ="";
        if(isset($_POST['Cont']))
        {
            $cont_selected = $_POST['Cont'];
            $productfilter = " AND prd.productName='$cont_selected'";
        }

        //open connection and select database
        require("sql_connection.php");

        //Write an SQL statement to extract data from product table
        $sql_ = "SELECT prd.productName, prd.productPicture, ct.quantity, ct.unitPrice, ct.orderid, o.id, o.orderDate, o.requireDate, o.cancelDate FROM orderdetails ct INNER JOIN products 
        prd on ct.productid=prd.id inner join orders o on ct.orderid=o.id " . $filter . $productfilter;
        
        $sql_product = "SELECT * FROM products";

        $product_list = mysqli_query ( $conn, $sql_product);

        //execute the SQL statement
        $cart_list = mysqli_query ( $conn, $sql_);

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
            <h1 class="Header"><?php echo isset($_SESSION['SV_Username'])?$_SESSION['SV_Username']:"NA"; ?> Order History</h1>
            <h2 class="note">Cancel would be available 3 days before delivery</h2>

            <form id="form1" name="#" method="post">
                <div class="filter">
                    Select Product:
                    <select name="Cont" id="Cont">
                        <?php While ( $filter_product = mysqli_fetch_assoc($product_list)  ) { ?> 
                        
                            <option value="<?php echo $filter_product['productName']; ?>">
                                <?php echo $filter_product['productName']; ?>
                            </option>
                    
                        <?php } ?>
                    </select>
                    <input type="submit" name="submit" class="filterButton" value="Show Product">
                    <input type="reset" value="Clear" class="filterButton" onclick="remove()">
                </div>
            </form>

                    <script>
                    function remove() {
                        window.location.href = "showorderhist.php";
                    }
                    </script>
            <table class="historyTable">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Unit Cost</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Required Date</th>
                    <th scope="col">Cancel Date</th>
                    
                </tr>
                
                <?php $grandtotal = 0;
                    While ( $one_product = mysqli_fetch_assoc($cart_list)  ) { ?>  
                
                <tr>
                    <td><?php echo $one_product['orderid']; ?></td>
                    <td class="productImgWrap"><img class="productImg" src="Images/Products/<?php echo $one_product['productPicture']; ?>" alt="productPicture"></td>
                    <td><?php echo $one_product['productName']; ?></td>
                    <td>$<?php echo number_format($one_product['unitPrice'],2); ?></td>
                    <td><?php echo $one_product['quantity']; ?></td>
                    <td>$<?php echo number_format(($tcost = $one_product['unitPrice']*$one_product['quantity']),2); ?></td>
                    <td>
                        
                        <?php date_default_timezone_set("Asia/Singapore");
                            echo date("d-m-Y",strtotime($one_product['orderDate'])); ?>
                    </td>
                    <td><?php echo $one_product['requireDate']; ?></td>
                    <td>
                        <?php
                                $date1= new datetime($one_product['requireDate']); 
                                $date2= new datetime("now+3day"); 
                                                                                    
                                $date3= new datetime($one_product['cancelDate']); 
                                if (strtotime($one_product['cancelDate'])!="") 
                                echo  $date3->format('Y-m-d H:i:s');
                                else if ($date1> $date2) {
                            ?>
                                <form class="cancel" action="cclOrder.php" method="post">
                                    <input type=hidden name="ordid" value="<?php echo $one_product['id']; ?>">
                                    <input class="cancelBtn" type=submit name=submit value="Cancel">
                                </form>
                            <?php } ?>
                    </td>
                </tr>
                
                <?php $grandtotal += $tcost;
                    }  ?>
                </table>
                    <div class="totalTable">
                        <p class="spend">Total spendings our products: $<?php echo number_format($grandtotal,2) ; ?></p>
                        <div class="linkWrap">
                            <a class="link" href="dashboard.php">Dashboard</a>
                            <a class="link" href="showcart.php">Cart</a>
                        </div>
                    </div>

                    <div>
                    <?php 
                        $val = isset($_GET['stt'])?$_GET['stt']:"";
                    
                        if($val==1) 
                            echo "<b>Canecellation not successful</b>";;
                    ?>
                    </div>
        </section>

        <footer>
            <?php require("Footer.php") ?>
        </footer>
            
    </div> <!--End of Container-->
    <script src="Scripts/Script.js"></script>
</body>
</html>