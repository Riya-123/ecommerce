
<?php

function component($prdname,$prdprice,$prdimg,$productid){
	$element="<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
<form action=\"fruits2.php\" method=\"post\">
<div class=\"card shadow\">
<div>
<img src=\"$prdimg\" alt=\"image1\" class=\"img-fluid card-img-top\">
</div>
<div class=\"card-body\">
<h5 class=\"card-title\">$prdname</h5>
<h5>
<span class=\"price\">$prdprice</span>
</h5>
<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"Add\">ADD TO CART<i class=\"fa fa-shopping-cart\"></i></button>
<input type=\"hidden\" name=\"product_id\" value=\"$productid\">
</div>

</div>
</form>
</div>
";
echo$element;
}
function cartElement($prdimg,$prdname,$prdprice,$productid,$quant)
{
	
	$element="<div class=\"whole\">
	<form action=\"cart.php?action=remove&id=$productid \" method=\"post\" class=\"cart-items\">
	
<div class=\"border rounded\">
<div class=\"row bg-white\">
<div class=\"col-md-3\">
<img src=$prdimg class=\"img-fluid\">
</div>
<div class=\"col-md-6\">
<h5 class=\"pt-2\">$prdname</h5>
<h5 class=\"pt-2\">$prdprice</h5>
<button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
</div>




</div>

</div>

</form>

</div>
";

echo$element;
}
function comp($prdname,$prdprice,$prdimg,$productid){
	$element="<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
	<form action=\"fruits2.php\" method=\"post\">
<div class=\"card shadow\">
<div>
<img src=\"$prdimg\" alt=\"image1\" class=\"img-fluid card-img-top\">
</div>
<div class=\"card-body\">
<h5 class=\"card-title\">$prdname</h5>
<h5>
<span class=\"price\">$prdprice</span>
</h5>
<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"Add\">ADD TO CART<i class=\"fa fa-shopping-cart\"></i></button>
<input type=\"hidden\" name=\"product_id\" value=\"$productid\">
</div>
</div>
</form>
</div>
";
echo$element;
}
function com($prdname,$prdprice,$prdimg,$productid)
{
	
	$element="<div class=\"whole\">
	<form >
	
<div class=\"border rounded\">
<div class=\"row bg-white\">
<div class=\"col-md-3\">
<img src=$prdimg class=\"img-fluid\">
</div>
<div class=\"col-md-6\">
<h5 class=\"pt-2\">$prdname</h5>
<h5 class=\"pt-2\">$prdprice</h5>
</div>




</div>

</div>

</form>

</div>
";

echo$element;
}
?>
