<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Order</title>
</head>
<body>
    <?php
        session_start();
        $uid = isset($_SESSION['SV_UserID'])?$_SESSION['SV_UserID']:"NA";
    
        if ($uid != "NA")
        {

             //open connection and select database
            require("sql_connection.php");

            $uname = $_POST['uname'];
            $password = $_POST['password'];
            $uaddr = $_POST['uaddr'];
            $uhp = $_POST['uhp'];

            //Write an SQL statement to extract data from product table
            $sql_ = "UPDATE members SET memberName='$uname',password='$password',
            deliveryAddress='$uaddr',phoneNumber='$uhp' WHERE id = $uid" ;

            //execute the SQL statement
            $_result = mysqli_query ( $conn, $sql_);

            // close sql connection
            mysqli_close($conn);

            if ($_result){
                header("Location:editprof.php?stt=1");
            }
            else {
                header("Location:editprof.php?stt=2");
            }
        }
        else
        {
            header("Location:login.php?stt=3");
        }
    ?>
</body>
</html>