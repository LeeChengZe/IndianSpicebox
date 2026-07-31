<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Picture</title>
</head>
<body>
    <?php
        session_start();
        $uid = isset($_SESSION['SV_UserID'])?$_SESSION['SV_UserID']:"NA";
    
        if ($uid != "NA")
        {
            //List of file types
            $allowedType = array("image/gif", "image/jpeg", "image/jpg", "image/png");
                
            //check the file type
            if ( in_array ( $_FILES["uprofpic"]["type"] , $allowedType ) )
            echo "File Type is acceptable<br>"; // proceed to upload
            else 
            {
                echo "Invalid file type<br>";
                header("Location:editprof.php?stt=4");
                exit();
            }

            //Check Size
            if ( $_FILES["uprofpic"]["size"] < 1024000 ) // larger than 1MB
            echo "File Size is acceptable<br>"; // proceed to upload
            else
            {
                echo "file is to large<br>";
                header("Location:editprof.php?stt=5");
                exit();
            }

            date_default_timezone_set("Asia/Singapore");
            $timestamp = date("Ymd_His") ; // Construct the timestamp
            // Add timestamp at the filename
            $target = "profiles/" . $timestamp . $_FILES["uprofpic"]["name"] ; 

            $result = move_uploaded_file($_FILES["uprofpic"]["tmp_name"], $target) ;

            if ($result) {
                require("sql_connection.php");

                echo $sql_ = "UPDATE members SET profilePicture ='$target' WHERE id = $uid" ;

                 //execute the SQL statement
                 $_result = mysqli_query ( $conn, $sql_);

                 // close sql connection
                 mysqli_close($conn);

                 if ($_result)
                 {
                     header("Location:editprof.php?stt=3");
                 }
                 else
                 {
                     header("Location:editprof.php?stt=2");
                 }
            }
        }
        else
        {
            header("Location:login.php?stt=3");
        }
    ?>
</body>
</html>