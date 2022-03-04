<?php
session_start();
include("header.php");
include("config.php");
//session_destroy();
?>


<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

	<div id="main">
		<div id="products">
			<?php


			foreach ($product as $item) {
				$des = "<form action='addToCart.php' method='POST'>
				<div id=" . $item['id'] . " class = 'product'>
				<img src='images/" . $item['image'] . "'>
				<h3 class ='title'><a href='#'>Product " . $item['id'] . "</a></h3>
				<span>Price: $" . $item['price'] . "</span>
				<button class='add-to-cart' type='submit' name='Add To Cart' value=". $item['id'] ." >Add To Cart</button><br>
				
				</div>
				</form>";
				echo $des;
			}


			?>

		</div>
	</div>
	<div>

	</div>
	<div>
		<?php
		if (isset($_SESSION['cart'])) {
			$html = "<h2>Cart</h2>
							<table>
							<tr><th>Name</th><th>Product</th><th>Price</th><th>Quantity</th></tr>";
			echo ($html);
		}
		foreach ($_SESSION['cart'] as $key => $value) {

			$html1 = "<form method='POST' action='addToCart.php'> <tr><td>" . $value['name'] . "</td><td><img  src='images/" . $value['image'] . "' width='60px' height='60px' >
			</td><td>$" . $value['price'] . "</td><td><input class='edinp' name='quantity' type='number' onchange='form.submit()' value ='" . $value['quantity'] . "'>
			<input type='hidden' name='id' value=".$value['id'].">
			<button value=".$value['id']." name='remove' type='Submit'>Remove</button></td></tr>
			<tr><td></td><td> </td><td>Total Price: $".($value['quantity']*$value['price'])."</td> </tr></form>";
			echo $html1;
		}

		echo "<tr><td></td><td>
		</td><td></td><td></td>
		<td><h4><a href='destroy.php'>Empty Cart</a><h4></td>
		</tr></table>";

		?>
	</div>

	<?php include 'footer.php' ?>