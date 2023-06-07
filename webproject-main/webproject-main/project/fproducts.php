<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php require_once("inc/navlogin.html"); ?>

    <!------ featured categories ------>
    <div class="categories">
        <div class="small-container">
            <h2>Featured Categories</h2>
            <div class="row">
                <div class="col-3">
                    <img src="img/smartphone.jpg">
                    <h4>Smartphones</h4>
                </div>
                <div class="col-3">
                    <img src="img/smartwatch.jpg">
                    <h4>Smartwatches</h4>
                </div>
                <div class="col-3">
                    <img src="img/laptop.jpg">
                    <h4>Laptops</h4>
                </div>
            </div>
        </div>
    </div>


    <!------ featured products ------>
    <form method="post" action="">
        <div class="small-container">
            <h2>Featured Products</h2>
            <div class="row">

                <?php
                

                // for each prod in database, print
                require_once('db_con.php');
                $sql = "SELECT * FROM products;";
                $result = $conn->query($sql);

                foreach ($result as $results) {
                    //echo $results["product_id"];

                ?>

                    <div class="col-4">
                        <img src=<?php echo $results["image"]; ?>>
                        <h4><?php echo $results["name"]; ?></h4>
                        <p>RM <?php echo $results["price"]; ?></p>
                        <input type="hidden" name="product_id" value="">
                        <td><a href="login.php" class="btn btn-primary">Login to Buy</a>

                    </div>

                <?php
                }
                if(isset($_GET["addcart"])) {
                    session_start();
                    $prodtoid = $_GET["addcart"];

                    $query = "SELECT * FROM products WHERE product_id='$prodtoid'";
                    $products = $conn->query($query);

                    foreach ($products as $product) {
                        $currentQty = $_SESSION['products'][$_GET['addcart']]['qty']+1; //Incrementing the product qty in cart
	                $_SESSION['products'][$_GET['addcart']] =array('product_id'=>$prodtoid, 'qty'=>$currentQty,'name'=>$product['name'],'price'=>$product['price']);
	                $product='';
                    }

                    
                }

                ?>
            </div>
    </form>

    </div>

</body>
<?php
  require_once("inc/footer.html");
?></html>
</html>