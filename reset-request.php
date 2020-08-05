<?php
if(isset($_POST["reset-request-submit"]))
{
	$selector=bin2hex(random_bytes(8));
	$token=random_bytes(32);
	$url="localhost/ecommerce/create-new-password.php?selector=".$selector."&validator=".bin2hex($token);
	$expires=date("U")+1800;
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
	$userEmail=$_POST["email"];
	$sql="DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt=mysqli_stmt_init($co);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error!";
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt,"s",$userEmail);
		mysqli_stmt_execute($stmt);
		
	}
	$sql="INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
	$stmt=mysqli_stmt_init($co);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "There was an error!";
		exit();
	}
	else{
		$hashToken=password_hash($token,PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashToken,$expires);
		mysqli_stmt_execute($stmt);
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($co);
	$to=$userEmail;
	$subject='Reset your password';
	$message='<p>We received a password reset request.The link to reset your password is below.
	If you did not make this request you can ignore this mail</p>';
	$message.='<p>Here is your Password Reset Link:</br>';
	$message.='<a href="'.$url.'">'.$url.'</a></p>';
	$headers="From: Mobile Net<riyasawa@gmail.com>\r\n";
	$headers.="Reply-To:<riyasawa@gmail.com>\r\n";
	$headers.="Content-type:text/html\r\n";
	mail($to,$subject,$message,$headers);
	//$msg="my name is riya";
	//mail("riyasawa2016@gmail.com","my name",$msg);
	header("Location:reset-pass.php?reset=success");
	
}
else
{
	echo "<script>window.location='index.php'</script>";
}
