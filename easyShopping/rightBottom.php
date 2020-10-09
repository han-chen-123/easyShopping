<?php
session_start();
$quantity = $_REQUEST["quantity"];

    //table for the cart
    print "<table border=\"2\" width=\"90%\">";
    print "<tr>";
    print "<td>Del</td>";
    print "<td>Product name</td>";
    print "<td>Unit price</td>";
    print "<td>Unit quantity</td>";
    print "<td>Required quantity</td>";
    print "<td>Total cost</td>";
    print "</tr>";
    //动态增加tr
    print "<tr>";
    print "<td><input type=\"checkbox\"></td>";
    print "<td>".$_SESSION["productName"]."</td>";
    print "<td>".$_SESSION["unitPrice"]."$"."</td>";
    print "<td>".$_SESSION["unitQuantity"]."</td>";
    print "<td>".$quantity."</td>";
    print "<td>".$quantity*$_SESSION["unitPrice"]."$"."</td>";
    print "</tr>";
    //循环添加到购物车，数量需要加起来
    print "<tr>";
    print "<td>Number of Products</td>";
    //print "<td>Number of Products</td>"; 数量相加
    print "</tr>";
    print "<tr>";
    print "<td>Shopping cart Total</td>";
    //print "<td>Number of Products</td>"; 价格相加
    print "</tr>";
    print "</table>";

    //table for the buttons
    print "<table align=\"center\">";
    print "<tr>";
    print "<td>";
    print "<form action=\"information.php\" id=\"cartForm\" method=\"post\" target=\"rightTop\">";
    print "<input type=\"reset\" name=\"clear\" value=\"clear\">";
    print "<input type=\"button\" name=\"delete\" value=\"delete\">";
    print "<input type=\"submit\" name=\"checkout\" value=\"checkout\">";
    print "</form>";
    print "</td>";
    print "</tr>";
    print "</table>";




