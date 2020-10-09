<?php

session_start();
$product_id = $_GET["product_id"];

$db = mysqli_connect("127.0.0.1","potiro","pcXZb(kL", "poti","3308");

if (mysqli_connect_errno($db))
{
    die("Failed to connect to MySQL");
}

$query = "select * from products where product_id = $product_id";

$result = mysqli_query($db, $query);

if ($result)
{
    ?>
    <body>
    <h3>Selected Item</h3>
    <form action="shoppingCart.php" method="post" target="rightBottom" name="quntityform">
    <table border="2" width="90%">
    <tr>
            <td>Product id</td>
            <td>Product name</td>
            <td>Unit price</td>
            <td>Unit quantity</td>
            <td>In stock</td>
            <td>Quantity</td>
        </tr>
<?php
    while ($row = mysqli_fetch_array($result))
    {
        //print "<form action=\"rightBottom.php\" method=\"post\" target=\"rightBottom\" name=\"quantityform\">";
        print "<tr>";
        print "<td>".$row['product_id']."</td>";
        print "<td>".$row['product_name']."</td>";
        print "<td>".$row['unit_price']."</td>";
        print "<td>".$row['unit_quantity']."</td>";
        print "<td>".$row['in_stock']."</td>";
        print "<td><input type=\"text\" name=\"quantity\" size=\"3\" value=\"1\"></td>";
        print "</tr>";
        //$_SESSION['product_id'] = $row['product_id'];
        /*$_SESSION['productName'] = $row['product_name'];
        $_SESSION['unitPrice'] = $row['unit_price'];
        $_SESSION['unitQuantity'] = $row['unit_quantity'];*/
        print "<input type=\"hidden\" name=\"id\" size=\"3\" value=\"$row[product_id]\">";
        print "<input type=\"hidden\" name=\"name\" size=\"3\" value=\"$row[product_name]\">";
        print "<input type=\"hidden\" name=\"price\" size=\"3\" value=\"$row[unit_price]\">";
        print "<tr><td align=\"center\" colspan=\"6\"><input type=\"submit\" name=\"add\" value=\"add\"></td></tr>";
        print "</table>";
        print "</form>";
        print "</body>";

    mysqli_close($db);
}
}