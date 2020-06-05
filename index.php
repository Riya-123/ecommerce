<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<style>
input[type=text],[type=mail],[type=password]
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
<form action="login.php" method="POST" style="height:100%">
<table align="center">
<tr>
<td style="color:white" >
Emai-Id:
</td>
<td>
<input type="mail" name="mail" placeholder="Enter registered Email Address">
</td>
</tr>
<tr>
<td  style="color:white">
Password:
</td>
<td>
<input type="password" name="pwd" placeholder="Enter Password">
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type="submit" class="btn btn-success" style="margin-left:90px" name="login">Login</button>

</td>
</tr>
<tr>
<td>
<div class="new_line" align="center" style="padding-top:20px;font-size:20px">

<?php
if(isset($_GET["newpwd"]))
{
	if($_GET["newpwd"]=="passwordupdated")
	{
		echo '<p class="signupsuccess" style="color:white">Your password has been reset!</p>';
	}
}
?>

<a class="text-danger" name="signup" href="reset-pass.php"><u>Forgot your password</u></button>
</div>
</td>
</tr>
</form>
<div class="new_line" align="center" style="padding-top:200px">
<a class="text-warning" name="signup" href="signup.php"><u>Signup if you are a new user</u></button>
</div>
</body>
</html>
