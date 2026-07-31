<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>
<body>
    <?php

        $cid = isset($_POST['cid'])?($_POST['cid']):"";
        

        if ($cid != "")
        {

             //open connection and select database
            require("sql_connection.php");
            $nqty = isset($_POST['nqty'])?($_POST['nqty']):"NA";
            //Write an SQL statement to extract data from product table
            $sql_ = "UPDATE carts SET quantity=$nqty WHERE id=$cid" ;

            //execute the SQL statement
            $_result = mysqli_query ( $conn, $sql_);

            // close sql connection
            mysqli_close($conn);

            if ($_result){
                header("Location:showcart.php");
            }
            else {
                header("Location:products.php");
            }
        }
        else
        {
            header("Location:products.php");
        }
    ?>
</body>
</html>