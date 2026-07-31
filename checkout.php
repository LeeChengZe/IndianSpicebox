<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <?php
        session_start();

        $uid = isset($_SESSION['SV_UserID'])?$_SESSION['SV_UserID']:"NA";

        if ($uid != "NA")
        {

             //open connection and select database
            require("sql_connection.php");

            $reqdate = $_POST['reqdate'];
            $gtt = $_POST['gtt'];

            //Write an SQL statement to extract data from product table
            $sql_ = "INSERT INTO orders(memberid, requireDate, orderStatus, totalPrice) 
            VALUES ('$uid','$reqdate','O','$gtt')";

            //execute the SQL statement
            $_result = mysqli_query ( $conn, $sql_);

            $ordid = $conn->insert_id;

            // close sql connection
            mysqli_close($conn);

            if ($_result){

                //open connection and select database
                require("sql_connection.php");

                $sql_ = "INSERT orderdetails(orderid, productid, quantity, unitPrice)
                SELECT o.id, ct.productid, ct.quantity, ct.unitPrice FROM carts ct inner join orders o on ct.memid=o.memberid 
                WHERE o.id = $ordid ";
    
                //execute the SQL statement
                $_result = mysqli_query ( $conn, $sql_);



                //Write an SQL statement to extract data from product table
                $filter = " WHERE memid = $uid ";
                $sql_ = "DELETE FROM carts " . $filter;

                //execute the SQL statement
                $_result = mysqli_query ( $conn, $sql_);

                // close sql connection
                mysqli_close($conn);

                header("Location:products.php");
            }
            else {
                header("Location:showcart.php");
            }

        }
        else
        {
            header("Location:login.php?stt=3");
        }
    ?>
</body>
</html>