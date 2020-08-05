<?php
if(isset($_POST["reset-password-submit"]))
{
	$selector=$_POST["selector"];
	$validator=$_POST["validator"];
	$pwd=$_POST["pwd"];
	$pwd1=$_POST["pwd1"];
	if(empty($pwd)||empty($pwd1))
	{
		echo "Enter password!";
		header("Location=create-new-password.php");
		exit();
	}
	else if($pwd!=$pwd1){
		echo "The re-entered password is not same!";
		header("Location=create-new-password.php");
		exit();
	}
	$current=date("U");
	$dbnam="productdb";
$tablenam="pwdReset";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
if(!$co)
	{
		die("connection failed:".mysqli_connect_error());
	}
	$sql='SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?';
	$stmt=mysqli_stmt_init($co);
	
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error1!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"ss",$selector,$current);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if(!($row=mysqli_fetch_assoc($result)))
		{
			echo "You need to re-submit your reset request.";
			exit();
			
		}
		else{
			$tokenbin=hex2bin($validator);
			$tokenCheck=password_verify($tokenbin,$row["pwdResetToken"]);
			if($tokenCheck==false)
			{
				echo "You need to re-submit your reset request.";
			exit();
			}
			else if(tokenCheck==true){
				$tokenEmail=$row['pwdResetEmail'];
				$sql="SELECT  * FROM user_login_data WHERE  Email=?;";
				$stmt=mysqli_stmt_init($co);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error2!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if(!($row=mysqli_fetch_assoc($result)))
		{
			echo "There was an error3!";
			exit();
			
		}
		else{
			$sql="UPDATE user_login_data SET Password=? WHERE Email=?";
			$stmt=mysqli_stmt_init($co);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error4!";
		exit();
	}
	else{
		$hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"ss",$pwd,$tokenEmail);
	mysqli_stmt_execute($stmt);
	$sql="DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt=mysqli_stmt_init($co);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error5!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
		mysqli_stmt_execute($stmt);
		header("Location:index.php?newpwd=passwordupdated");
	}
	}
		}
	}
	}
	}
	}
}
else
{
	echo "<script>window.location='index.php'</script>";
}	
