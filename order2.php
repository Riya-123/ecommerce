<?php
session_start();

require_once('createdb.php');
//require_once('order.php');
require_once('header.php');
require_once('compo.php');
$db=new createdb("productdb","producttb");
$dbnam="productdb";
$tablenam="user_login_data";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
$us=$_SESSION['users'];
//$dbase=new cartdb("catdb","cattb");
$sql="SELECT UserID FROM USER_LOGIN_DATA WHERE Email='$us'";
		$result=mysqli_query($co,$sql);
		$row=mysqli_fetch_assoc($result);
		$e=$row['UserID'];
$sq="SELECT Items FROM USER_ORDER WHERE UserID='$e'";
		$resul=mysqli_query($co,$sq);
		$rows=mysqli_fetch_assoc($resul);
		if(mysqli_num_rows($resul)>0)
		{
			$item=explode(",",$rows['Items']);
			foreach($item as $out)
			{
				$sql="SELECT * FROM producttb WHERE product_name='$out'";
	$res=mysqli_query($co,$sql);
	while($ro=mysqli_fetch_assoc($res))
		{
			
			
			com($ro['product_name'],$ro['product_price'],$ro['product_img'],$ro['id']);
			
		}
			}
		}
		else{
			echo "No orders!";
		}
		

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Cart</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<?php
//session_start();

?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>