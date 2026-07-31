<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveRegister</title>
</head>
<body>
    <?php
        $uemail = isset($_POST['uemail'])?$_POST['uemail']:"NA";

        if ($uemail != "NA")
        {
            require("sql_connection.php");

            $checkuser = "SELECT * FROM members WHERE email = '$uemail'";

            $search_results = mysqli_query($conn,$checkuser);
            $userfound = mysqli_num_rows($search_results);

            if ($userfound >= 1) {
                header("Location:Register.php?stt=2");
            }
            else {
                $uname = $_POST['uname'];
                $password = $_POST['password'];
                $uaddr = $_POST['uaddr'];
                $uhp = $_POST['uhp'];

                //List of file types
                $allowedType = array("image/gif", "image/jpeg", "image/jpg", "image/png");
                    
                //check the file type
                if ( in_array ( $_FILES["uprofpic"]["type"] , $allowedType ) )
                echo "File Type is acceptable<br>"; // proceed to upload
                else 
                {
                    echo "Invalid file type<br>";
                    header("Location:Register.php?stt=5");
                    exit();
                }

                //Check Size
                if ( $_FILES["uprofpic"]["size"] < 1024000 ) // larger than 1MB
                echo "File Size is acceptable<br>"; // proceed to upload
                else
                {
                    echo "file is to large<br>";
                    header("Location:Register.php?stt=5");
                    exit();
                }

                date_default_timezone_set("Asia/Singapore");
                $timestamp = date("Ymd_His") ; // Construct the timestamp
                // Add timestamp at the filename
                $target = "profiles/" . $timestamp . $_FILES["uprofpic"]["name"] ; 

                $result = move_uploaded_file($_FILES["uprofpic"]["tmp_name"], $target) ;

                if ($result) {
                    session_start();
                    //save new member into db
                    //open connection and select database
                    //Write an SQL statement to extract data from product table
                    $sql_ = "INSERT INTO members(email, memberName, password, deliveryAddress, phoneNumber, profilePicture) 
                    VALUES ('$uemail','$uname','$password','$uaddr','$uhp','$target')";

                     //execute the SQL statement
                     $_result = mysqli_query ( $conn, $sql_);

                     // close sql connection
                     mysqli_close($conn);
 
                     if ($_result)
                     {
                         header("Location:login.php?stt=4");
                     }
                     else
                     {
                         header("Location:Register.php?stt=1");
                     }
                }
                else {
                    header("Location:Register.php?stt=1");
                }
            }
        }
        else {
            header("Location:Register.php");
        }
    ?>
    
</body>
</html>