<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MRSDB";

if(isset($_POST["submit"]))
{
	$type=$_POST["type"];
	//echo "$type";
	
	if(isset($_POST["fname"]))
		$fname=strip_tags(trim($_POST["fname"]));

	if(isset($_POST["lname"]))
		$lname=strip_tags(trim($_POST["lname"]));

	if(isset($_POST["email"]))
		$email=strip_tags(stripslashes(trim($_POST["email"])));

	if(isset($_POST["pass"]))
		$pass=strip_tags(stripcslashes(trim($_POST["pass"])));

	if(isset($_POST["repass"]))
		$repass=strip_tags(stripcslashes(trim($_POST["repass"])));

	if($pass != $repass)
	{
		echo "<script type='text/javascript'>
		alert('Password does not match !!');
		window.location.href='http://localhost:81/Medical Reference System/sign-up-login-form';
		</script>";
		exit();	
	}

	$pass=strip_tags(stripcslashes(trim($_POST["pass"])));

	$gender=$_POST["gender"];

	if(isset($_POST["bdate"]))
		$bdate=$_POST["bdate"];

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error); 

	$sql = "INSERT INTO $type (fname, lname, email, password, gender, bdate)VALUES ('$fname', '$lname', '$email','$pass', '$gender', '$bdate');";

	if ($conn->query($sql) === TRUE)
   	{	
   		
   		echo "<script type='text/javascript'>
		window.location.href='http://localhost:81/Medical Reference System/';
		</script>";
		exit();	
	}

 	else
    	echo "Error: $sql <br> $conn->error";

	$conn->close();	
}
?>