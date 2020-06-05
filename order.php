<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<style>
input[type=text],[type=mail],[type=phone],[type=number]
{
	height:100%;
	padding:12px 20px;
	border:1px solid #ccc;
	box-sizing:border-box;
}

</style>
</head>
<body background="download.jpg">
<h1 style="color:white" align="center">Please enter your delivery details</h1>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div id="result"></div>
<script>
var q=localStorage.getItem("Amount");
$.post('order1.php',{postname:q},function(data){
$('#result').html(data);
});

//console.log(q);
</script>

<form action="order1.php" method="POST" style="height:100%">
<table align="center">
<tr>
<td style="color:white">
Name:
</td>
<td>
<input type="text" name="full" placeholder="full name">
</td>
</tr>
<tr>
<td  style="color:white">
Address:
</td>
<td>
<input type="text" name="address" placeholder="Delivery address">
</td>
</tr>
<tr>
<td style="color:white">
Phone:
</td>
<td>
<input type="phone" name="phone" placeholder="Phone number">
</td>
</tr>
<tr>
<td style="color:white">
Pincode:
</td>
<td>
<input type="number" name="pin" maxlength="6" pattern="[0-9]" value="" placeholder="PinCode" oninput="javascript:if(this.value.length!=this.maxlength)this.value=this.value.slice(0,this.maxlength);">
</td>
</tr>
<tr>
<td>
<button type="submit" class="btn btn-warning" name="submit">Order now</button>
</td>
</tr>
</form>
</body>
</html>