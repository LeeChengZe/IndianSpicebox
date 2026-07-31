<?php 
    //open connection and select database
    require("sql_connection.php");
    $email = $_POST["uemail"];
    $password = $_POST["password"];

    //Write an SQL statement to extract data from product table
    $sql_ = "SELECT * FROM members WHERE email = '$email' " ;

    //execute the SQL statement
    $search_result = mysqli_query ( $conn, $sql_);  

    $userfound = mysqli_num_rows($search_result);

    if ($userfound >= 1)
    {
        session_start();
        echo $change = "UPDATE members SET password = '$password' WHERE email = '$email' ";

        $changeResult = mysqli_query($conn,$change);

        if ($changeResult)
        {
            header("Location:forgetpass.php?stt=2");
        }
        else {
            header("Location:forgetpass.php?stt=4");
        }
        
    }
    else {
        header("Location:forgetpass.php?stt=1");
    }
    // close sql connection
    mysqli_close($conn);
?>