<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Contact</title>
    <?php
        $name = $_POST['uname'];
        $email = $_POST["uemail"];
        $message = $_POST["message"];

        require("sql_connection.php");

        echo $sql = "INSERT INTO contact(Name,Email,Message)
        VALUES ('$name.','$email','$message')";

        $result = mysqli_query($conn, $sql);
    ?>
</head>
<body>
    <?php 
        if ($result)
        {
            header("location:Contact.php?status=1");
        }
        else
        {
            header("location:Contact.php?status=2");
        }

    ?>
</body>
</html>