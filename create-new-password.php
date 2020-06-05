<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
input
{
	height:100%;
	padding:12px 20px;
	border:1px solid #ccc;
	box-sizing:border-box;
	margin:50px;
}

</style>


</head>
<body background="download.jpg">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<h1 style="color:white;margin-top:70px" align="center">Create new Password</h1>
<?php
$selector=$_GET["selector"];
$validator=$_GET["validator"];
if(empty($selector)||empty($validator))
{
	echo "We could not validate your request!";
}
else
{
	if((ctype_xdigit($selector)!=false)&&(ctype_xdigit($validator)!=false))
	{
		?>
		<form action="reset-password.php" style="margin-top:100px;margin-left:500px" method="POST">
<input type="hidden" name="selector" value="<?php echo $selector?>">
<input type="hidden" name="validator" value="<?php echo $validator?>">
<input type="password" name="pwd" aign="center" placeholder="Enter new password...">
<br>
<input type="password" name="pwd1" aign="center" placeholder="Repeat new password">
<br>
<button type="submit" class="btn btn-success"  style="margin-left:100px" name="reset-password-submit">Reset Password</button>
</form>

		<?php
	}
}
?>

</body>
</html>
