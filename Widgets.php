
<!DOCTYPE html>
<!-- Author: Jason Klamert Date/LastModified: 11/16/2014 
Widgets.php - processes the form in Widgets.html -->
<html lang = "en">
	<head>
		<title> Process the Widgets.html form </title>
		<meta charset = "utf-8" />
		<style type = "text/css">
			td, th, table {border: thin solid black;}
		</style>
	</head>
	
	<body>
		<?php
		//Get form data values
		$modelA = $_["modelA"];
		$modelB = $_["modelB"];
		$modelC = $_["modelC"];
		$state = $_["state"];
		
		//If any of the quantities are blank or negative, set them to zero 
		if ($modelA == " " || $modelA < 0) $modelA = 0;
		if ($modelB == " " || $modelB < 0) $modelB = 0;
		if ($modelC == " " || $modelC < 0) $modelC = 0;
		
		//Compute total items and total cost
		$modelA_cost = 12.45 * $modelA;
		$modelB_cost = 15.34 * $modelB;
		$modelC_cost = 28.99 * $modelC;
		
		if($state == "MO")
		{
			$total_price = $modelA_cost + $modelB_cost + $modelC_cost;
			$tax = $total_price * 0.04735;
			$total_price = $total_price + $tax;
			$total_items = $modelA + $modelB + $modelC;
		}
		else
		{
			$total_price =  $modelA_cost + $modelB_cost + $modelC_cost;
			$total_items = $modelA + $modelB + $modelC;
		}
		
		if($total_items > 40)
		{
			$discount = $total_price * 0.05;
			$total_price = $total_price - $discount;
		}
		else
		{$discount = 0.00;}
		
		//Return results to the browser in a table
		?>
			<table>
				<caption> Order Information </caption>
					<tr>
						<th> Product </th>
						<th> Unit Price </th>
						<th> Quantity Ordered </th>
						<th> Item Cost </th>
					</tr>
					<tr>
						<td> Model 37AX-L </td>
						<td> $12.45 </td>
						<td> <?php print ("$modelA"); ?> </td>
						<td> <?php printf ("$ %4.2f", $modelA_cost); ?> </td>
					</tr>
					<tr>
						<td> Model 42XR-J </td>
						<td> $15.34 </td>
						<td> <?php print ("$modelB"); ?> </td>
						<td> <?php printf ("$ %4.2f", $modelB_cost); ?> </td>
					</tr>
					<tr>
						<td> Model 93ZZ-A </td>
						<td> $28.99 </td>
						<td> <?php print ("$modelC"); ?> </td>
						<td> <?php printf ("$ %4.2f", $modelC_cost); ?> </td>
					</tr>
			</table>
		
		<?php
			print "You ordered $total_items Widgets <br />";
			printf ("Your total bill is: $ %5.2f <br />", $total_price);
			printf ("Your discount is: $ %5.2f <br />", $discount);
			printf ("Your tax is: $ %5.2f <br />", $tax);
		?>
	</body>
</html>
				