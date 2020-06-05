<header id="header1">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a href="cart.php" class="navbar-brand">
<h3 class="px-5">
<i class=" fa fa-shopping-basket"></i>Shopping Cart
</h3>
</a>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="mr-auto"></div>
<div class="navbar-nav">
<a href="cart.php" class="nav-item nav-link active">
<h5 style=" right:0px">
<i class="fa fa-shopping-cart"></i>Cart
<?php
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
		$t="cart".($row['UserID']);
if(isset($_SESSION[$t]))
{
	$count=count($_SESSION[$t]);
	echo"<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
}
else
{
	echo"<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
}
?>
</h5>
</a>
</div>
</div>
</nav>
</header>