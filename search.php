<?php
session_start();
include 'createdb.php';
require_once 'compo.php';
?>
<?php
$dbnam="productdb";
$tablenam="producttb";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$con=mysqli_connect($servernam,$usernam,$passwor,$dbnam);

$us=$_SESSION['users'];
//$dbase=new cartdb("catdb","cattb");
$sql="SELECT UserID FROM USER_LOGIN_DATA WHERE Email='$us'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$t="cart".($row['UserID']);
if(isset($_POST['Add']))
{
	//print_r($_POST['product_id']);
	if(isset($_SESSION['$t'])){
		$item_array_id=array_column($_SESSION['$t'],"product_id");
		//print_r($item_array_id);
		/*if(in_array($_POST['product_id'],$item_array_id))
		{
			echo"<script>alert('Product is already added!')</script>";
			echo"<script>window.location='fruits2.php'</script>";
			
		}
		else
		{*/
			$count=count($_SESSION['$t']);
			$item_array=array('product_id'=>$_POST['product_id']);
			$_SESSION['$t'][$count]=$item_array;
			//print_r($_SESSION['cart']);
			//$sql="INSERT INTO cattb(product_name,product_price,
		//product_img,product_quant)VALUES('product_name','product_price','product_img','1')";
		
		
	}
	//print_r($_SESSION['cart']);
	else{
		$item_array=array('product_id'=>$_POST['product_id']);
		$_SESSION['$t'][0]=$item_array;
		//print_r($_SESSION['cart']);
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('header.php');



if(isset($_POST['submit-search']))
{
	$search=mysqli_real_escape_string($con,$_POST['search']);
	$sql="SELECT * FROM producttb WHERE product_name LIKE '%$search%' OR product_price LIKE '%$search%'";
	$res=mysqli_query($con,$sql);
	$queryresult=mysqli_num_rows($res);
	
		?>

		<h1 align="center">Search Results</h1>
		<div class="cotainer">
<div class="row text-center py-5">
<?php
		while($row=mysqli_fetch_assoc($res))
		{
			
			
			comp($row['product_name'],$row['product_price'],$row['product_img'],$row['id']);
			
		}
		?>
		</div>
		</div>
		<?php
	if($queryresult==0)
	{
		echo "There are no results matching your search!";
	}
}
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>