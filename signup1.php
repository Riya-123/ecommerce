<?php
session_start();
$dbnam="productdb";
$tablenam="user_login_data";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
if(!$co)
	{
		die("connection failed:".mysqli_connect_error());
	}
	$mail=$_POST['mail'];
	$pwd=$_POST['pwd1'];
	
if(empty($_POST['mail']))
	{
		echo"<script>alert('enter email id..!')</script>";
	echo"<script>window.location='signup.php'</script>";
	}
	if(empty($_POST['pwd1']))
	{
		echo"<script>alert('enter pasword..!')</script>";
	echo"<script>window.location='signup.php'</script>";
	}
	if(empty($_POST['pwd2']))
	{
		echo"<script>alert('enter pasword..!')</script>";
	echo"<script>window.location='signup.php'</script>";
	}
	
	if((!empty($_POST['mail']))&&(!empty($_POST['pwd1']))&&(!empty($_POST['pwd1'])))
	{
		$sql="SELECT * FROM USER_LOGIN_DATA WHERE Email='$mail'";
		$result=mysqli_query($co,$sql);
			if((mysqli_num_rows($result))>0)
			{
				echo"<script>alert('Mail id already registered..!')</script>";	
	echo"<script>window.location='signup.php'</script>";	
	//echo $result;
			}
			
		else{
			if(!(filter_var($mail,FILTER_VALIDATE_EMAIL)))
				{
					echo"<script>alert('Please enter valid Email-ID..!')</script>";	
	echo"<script>window.location='signup.php'</script>";	
		}
		else{
		if(($_POST['pwd1'])==($_POST['pwd2']))
		{
			$sql="INSERT INTO user_login_data(Email,Password) VALUES('$mail','$pwd')";
mysqli_query($co,$sql);

$_SESSION['users']=$mail;
		echo"<script>alert('You have successfully registered..!')</script>";	
	echo"<script>window.location='main.html'</script>";	
		}
		else
		{
		echo"<script>alert('Passwords did not match..!')</script>";	
	echo"<script>window.location='signup.php'</script>";	
			}
		}
	}
			}
	
	?>