<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MRSDB";

if(isset($_POST["submit"]))
{
	$type=$_POST["type"];

	if(isset($_POST["email"]))
		$email=strip_tags(stripslashes(trim($_POST["email"])));

	if(isset($_POST["pass"]))
		$pass=strip_tags(stripcslashes(trim($_POST["pass"])));

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error); 

	$sql = "SELECT password from $type  where email='$email';";
	$result = $conn->query($sql);

	if($result->num_rows > 0)
	{	
		$row = $result->fetch_assoc();
		
		if($pass == $row["password"])
		{
			session_start();
			$_SESSION["logged"]="yes";
			$_SESSION["name"]=$email;
			echo "<script type='text/javascript'>
			window.location.href='http://localhost:81/Medical Reference System/';
			</script>";
			exit();	
		}	

		else
		{		
			echo "<script type='text/javascript'>
			alert('Password does not match !!');
			window.location.href='http://localhost:81/Medical Reference System/sign-up-login-form';
			</script>";
			exit();
		}
	}
	else
	{
		
		echo "<script type='text/javascript'>
			alert('Your account does not exist. !!');
			window.location.href='http://localhost:81/Medical Reference System/sign-up-login-form';
			</script>";
		exit();
	}
}

?>