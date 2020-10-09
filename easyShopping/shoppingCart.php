<?php
session_start();
function i_array_column($input, $columnKey, $indexKey=null){
    if(!function_exists('array_column')){
        $columnKeyIsNumber  = (is_numeric($columnKey))?true:false;
        $indexKeyIsNull            = (is_null($indexKey))?true :false;
        $indexKeyIsNumber     = (is_numeric($indexKey))?true:false;
        $result                         = array();
        foreach((array)$input as $key=>$row){
            if($columnKeyIsNumber){
                $tmp= array_slice($row, $columnKey, 1);
                $tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null;
            }else{
                $tmp= isset($row[$columnKey])?$row[$columnKey]:null;
            }
            if(!$indexKeyIsNull){
                if($indexKeyIsNumber){
                    $key = array_slice($row, $indexKey, 1);
                    $key = (is_array($key) && !empty($key))?current($key):null;
                    $key = is_null($key)?0:$key;
                }else{
                    $key = isset($row[$indexKey])?$row[$indexKey]:0;
                }
            }
            $result[$key] = $tmp;
        }
        return $result;
    }else{
        return array_column($input, $columnKey, $indexKey);
    }
}
if (isset($_POST["add"]))
{
    if (isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = i_array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_POST["id"],$item_array_id ))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_POST["id"],
                'item_name' => $_POST["name"],
                'item_price' => $_POST["price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
            {
                echo "<script>alert('Item already added')</script>";
            }
    }
    else{
        $item_array = array(
            'item_id' => $_POST["id"],
            'item_name' => $_POST["name"],
            'item_price' => $_POST["price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;

    }
}
if (isset($_GET["action"]))
{
    if ($_GET["action"] == "delete")
    {
        foreach ($_SESSION["shopping_cart"] as $key => $value)
        {
            if ($value["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$key]);
                echo "<script>alert('Item Removed')</script>";
            }

        }
    }
    if ($_GET["action"] == "clear")
    {
        unset($_SESSION["shopping_cart"]);
        echo "<script>alert('Clear!')</script>";

}
}
?>
<h3>Shopping Cart<h3>
<table border="2" width="90%">
    <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    <?php
    if (!empty($_SESSION["shopping_cart"]))
    {
        $total = 0;
        foreach ($_SESSION["shopping_cart"] as $key => $value)
        {
            ?>
    <tr>
        <td><?php echo $value["item_name"]; ?></td>
        <td><?php echo $value["item_quantity"]; ?></td>
        <td><?php echo $value["item_price"]; ?></td>
        <td><?php echo number_format($value["item_quantity"]*$value["item_price"],2); ?></td>
        <td><a href="shoppingCart.php?action=delete&id=<?php echo $value["item_id"]; ?>"><span>Remove</span></a></td>
    </tr>
    <?php
            $total = $total + ($value["item_quantity"]*$value["item_price"]);
            $_SESSION["total"] = $total;
        }

    ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right">$ <?php echo number_format($total,2); ?></td>
            <td><a href="shoppingCart.php?action=clear"><span>Clear</span></a></td>
        </tr>

        <form action="information.php" target="rightTop" method="post">
        <tr><td colspan="5" align="center"><input type="submit" name="checkout" value="checkout"></td></tr>
        </form>
    <?php

    }
    ?>
</table>



