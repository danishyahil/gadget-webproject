<?php
session_start();
if(isset($_SESSION["products"])){

require_once("inc/nav.html"); ?>
    <div class="row">
        <div class="col-2">
            <h2>My cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if (count($_SESSION['products']) > 0) {
                        foreach ($_SESSION['products'] as $key => $product) {
                            echo '<tr><td>' . $product['name'] . '</td>
                            <td>' . $product['price'] . '</td>
                            <td>' . '<a href="?qtyDown=' . $product['product_id'] . '" style="font-weight:900">-</a>&emsp;' . $product['qty'] . '&emsp;<a href="?qtyUp=' . $product['product_id'] . '" style="font-weight:900">+</a>' . '</td>
                            <td>' . '<a href="?empty=' . $product['product_id'] . '">Delete</a>' . '</td>
                            </tr>';
                        }
                    }

                    if (count($_SESSION['products']) > 0) {
                        $total = 0;
                        foreach ($_SESSION['products'] as $key => $product) {
                            $total = $total + ($product['qty'] * $product['price']);
                        }
                        
                    }
                    ?>


                </tbody>
            </table>
            <table class="table">
                <tr>
                    <td style="border-bottom-width:0!important"><a href="?emptyall">Delete all</a></td>
                    <td style="border-bottom-width:0!important;text-align:end"><b>Grand total:</b></td>
                    <td style="border-bottom-width:0!important"><?php echo $total; ?></td>
                    <td style="text-align:end;border-bottom-width:0!important"><a class="btn btn-secondary" style="margin:0;background-color:green;" href="checkout.php">Checkout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
  require_once("inc/footer.html");
?></html>
</body>

<?php
require_once('db_con.php');



if (isset($_GET['empty'])) {
    unset($_SESSION["products"][$_GET['empty']]);
    header('Location: '.$_SERVER['PHP_SELF']);
}
if (isset($_GET['emptyall'])) {
    unset($_SESSION["products"]);
    header('Location: '.$_SERVER['PHP_SELF']);
}
if (isset($_GET['qtyUp'])) {
    $prodtoid = $_GET['qtyUp'];
    $query = "SELECT * FROM products WHERE product_id='$prodtoid'";
    $products = $conn->query($query);

    foreach ($products as $product) {
        $currentQty = $_SESSION['products'][$_GET['qtyUp']]['qty'] + 1; //Incrementing the product qty in cart
        $_SESSION['products'][$_GET['qtyUp']] = array('product_id' => $_GET['qtyUp'], 'qty' => $currentQty, 'name' => $product['name'], 'price' => $product['price']);
        $product = '';
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
if (isset($_GET['qtyDown'])) {
    $prodtoid = $_GET['qtyDown'];
    $query = "SELECT * FROM products WHERE product_id='$prodtoid'";
    $products = $conn->query($query);

    foreach ($products as $product) {
        $currentQty = $_SESSION['products'][$_GET['qtyDown']]['qty'] - 1; //Incrementing the product qty in cart
        $_SESSION['products'][$_GET['qtyDown']] = array('product_id' => $_GET['qtyDown'], 'qty' => $currentQty, 'name' => $product['name'], 'price' => $product['price']);
        $product = '';
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}
} else {

    require_once("inc/nav.html"); ?>
    <div class="row">
        <div class="col-2">
            <h2>My cart</h2>
            <div>Cart is empty!</div>
    </div>
</div>
<?php
  require_once("inc/footer.html");
?></html>
</body>
<?php
}
?>