
<?php
session_start();
//include('cartdb.php');
require_once('createdb.php');
$db=new createdb("productdb","producttb");
if(isset($_SESSION['test']))
{
	$amt= $_SESSION['test'];
}
$tt="";$ttt="";
$result=$db->getdata();
//$ind=array();
$database=new createdb("productdb","producttb");
$dbnam="productdb";
$tablenam="user_login_data";
$servernam="localhost";
$usernam="root";
$passwor="12345";


$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
$us=$_SESSION['users'];
//$dbase=new cartdb("catdb","cattb");
$sql="SELECT UserID FROM USER_LOGIN_DATA WHERE Email='$us'";
		$resul=mysqli_query($co,$sql);
		$rows=mysqli_fetch_assoc($resul);
		$use=$rows['UserID'];
		$t="cart".($rows['UserID']);
while($row=mysqli_fetch_assoc($result))
{
	//foreach($product_id as $id)
	foreach($_SESSION[$t] as $key=>$value)
	{
		if($value["product_id"]==$row['id'])
		{
			//cartElement($prdimg,$prdname,$prdprice);
			//$val['product_id']=1;
			//$ind=0;
			//$ind=array('0','0','0');
			//$ind=1;
			//$qty=$qty+$value["quantity"];
		
			
			
			
	$tt=($row['product_name']).','.$tt;
	$ttt=($row['product_name'])."\r\n".$ttt;
	}
	}
}




$co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
if(!$co)
	{
		die("connection failed:".mysqli_connect_error());
	}
	
	$full=$_POST['full'];
	$ad=$_POST['address'];
	$ph=$_POST['phone'];
	$pin=$_POST['pin'];
	//$quant=$_POST['quant'];
	if(empty($_POST['full']))
	{
		echo"<script>alert('enter name..!')</script>";
	echo"<script>window.location='order.php'</script>";
	}
	if(empty($_POST['address']))
	{
		echo"<script>alert('enter address..!')</script>";
	echo"<script>window.location='order.php'</script>";
	}
	if(empty($_POST['phone']))
	{
		echo"<script>alert('enter phone number..!')</script>";
	echo"<script>window.location='order.php'</script>";
	}
	if(empty($_POST['pin']))
	{
		echo"<script>alert('enter pincode..!')</script>";
	echo"<script>window.location='order.php'</script>";
	}
	if((!empty($_POST['full']))&&(!empty($_POST['address']))&&(!empty($_POST['phone']))&&(!empty($_POST['pin'])))
	{
		/*$sq="SELECT * from user_login_data where Email='$eid'";
		$res=mysqli_query($co,$sq);
		$ro=mysqli_num_rows($res);
		if($ro>0)
		{*/
	if((strlen($pin))!=6)
	{
		echo"<script>alert('enter valid picode..!')</script>";
	echo"<script>window.location='order.php'</script>";
	}
	else
	{		
$sql="INSERT INTO user_order(Name,Address,Phone,Amount,Items,Pincode,UserID) VALUES('$full','$ad','$ph','$amt','$tt','$pin','$use')";
mysqli_query($co,$sql);
$msg="<p>A new order with Name as ".$full." and userid  ".$use." has come.<br>";
$msg.="Following is the order:<br></p>".$ttt;
$headers="Content-type:text/html\r\n";
$sub="New Order";
	mail("riyasawa2016@gmail.com",$sub,$msg,$headers);
		}
		}
?>