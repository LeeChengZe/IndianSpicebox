<?php 
	$u = $_POST['uemail'] ;   // name of the input field is ’username’
	$p = $_POST['password'] ;
	
	require("sql_connection.php");


$sql = "SELECT * FROM members WHERE email = '$u' and password='$p'  " ; 
$search_result = mysqli_query($conn , $sql);    // search table NOW!

// Return the number of rows in search result
$userfound = mysqli_num_rows($search_result);

mysqli_close($conn);

if ($userfound >= 1)    
	{
		// User record is found in the userinfo table
		session_start();
		$oneU = mysqli_fetch_assoc($search_result);

		$_SESSION['SV_Username'] = $oneU['memberName'];
		$_SESSION['SV_UserID'] = $oneU['id'];

		header("Location:products.php");  	// go to main.php
	}
	else     
	{
		// User record is NOT found in the userinfo table
		header("Location:login.php?stt=1");  	// go back to login page
	}
	
?>
