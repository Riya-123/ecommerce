<?php
session_start();
$dbnam="productdb";
$tablenam="user_login_data";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
$mail=$_POST['mail'];
if(empty($_POST['mail']))
	{
		echo"<script>alert('enter email id..!')</script>";
	echo"<script>window.location='index.php'</script>";
	}
	if(empty($_POST['pwd']))
	{
		echo"<script>alert('enter pasword..!')</script>";
	echo"<script>window.location='index.php'</script>";
	}
	if((!empty($_POST['mail']))&&(!empty($_POST['pwd'])))
	{
		$mail=$_POST['mail'];
		$sql="SELECT * FROM USER_LOGIN_DATA WHERE Email='$mail'";
		$result=mysqli_query($co,$sql);
			if((mysqli_num_rows($result))==0)
			{
				echo"<script>alert('Mail id is not registered..Please signup!')</script>";	
	echo"<script>window.location='index.php'</script>";	
	//echo $result;
			}
			if((mysqli_num_rows($result))!=0)
			{
			$sq="SELECT Password FROM USER_LOGIN_DATA WHERE Email='$mail'";
$res=mysqli_query($co,$sq);
$row=mysqli_fetch_assoc($res);
if($row['Password']!=$_POST['pwd'])
{
	echo"<script>alert('Incorrect password')</script>";	
	echo"<script>window.location='index.php'</script>";	
}
else
{
	$_SESSION['users']=$mail;
	echo"<script>window.location='main.html'</script>";
			}
			}
	
}

	?>