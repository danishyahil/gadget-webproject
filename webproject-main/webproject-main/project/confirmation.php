<?php
session_start();
if(isset ($_POST["firstName"])  && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["address2"]) && isset($_SESSION["products"])){
    require_once('db_con.php');
    $name = $_POST["firstName"];
    $email = $_POST["email"];
    $address = $_POST["address"] . $_POST["address2"];
    $payment = "Debit/Credit";
    $products = "";
        foreach ($_SESSION['products'] as $key => $product) {
            $products = $products . $product["name"] . "(" . $product["qty"] . "), ";
        }
        $total = 0;
        foreach ($_SESSION['products'] as $key => $product) {
            $total = $total + ($product['qty'] * $product['price']);
        }
                $sql = "INSERT INTO orders (name, email, address, payment, products, total)
                VALUES ('$name', '$email', '$address', '$payment', '$products', '$total')";
                $result = $conn->query($sql);

                

    

?>
<?php require_once("inc/navCheckout.html"); ?>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-left logo p-2 px-5"> <div class="my-2"><h4>Tech Studio</h4></div></div>
                <div class="invoice p-5" style="background-color:#e7e7e7aa">
                    <h5>Your order has been received!</h5> <span class="font-weight-bold d-block mt-4">Hello, <?php echo $_POST["firstName"]; ?></span> 
                    <span>You order has been confirmed and will be shipped in next two days!</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span><?php echo date("Y-m-d"); ?></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span><?php echo $_POST["address"] . ", " . $_POST["address2"] . "<br>" . $_POST["zip"] . ", " . $_POST["state"] . ", " . $_POST["country"] ?></span> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <div class="py-2"> <span class="d-block text-muted">Items</span>
                                <?php
                                if (count($_SESSION["products"]) > 0) {
                                    foreach ($_SESSION["products"] as $key => $product) {
                                        echo '<tr>
                                        <td width="60%"> <span class="font-weight-bold">' . $product["name"] . '</span>
                                            <div class="product-qty"> <span class="d-block">Quantity: ' . $product["qty"] .'</span> </div>
                                        </td>
                                        <td width="20%">
                                            <div class="text-right"> <span class="font-weight-bold">RM ' . $product["price"] .'</span> </div>
                                        </td>
                                    </tr>';
                                    }
                                }
                                ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Total</span> </div>
                                        </td><?php
                                        if (count($_SESSION["products"]) > 0) {
                        $total = 0;
                        foreach ($_SESSION["products"] as $key => $product) {
                            $total = $total + ($product['qty'] * $product['price']);
                        }
                        
                    }?>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold"><?php echo 'RM ' . $total; ?></span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will send a confirmation email to <?php echo $_POST["email"] ?>!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Tech Studio Team</span>
                </div>
                <div class="d-flex justify-content-between footer p-3"> <span>Back to <a href="index.php">Home</a></span>
            </div>
        </div>
        <button class="btn btn-primary" onclick="window.print()">Print</button>
    </div>
    
</div>
<?php
  require_once("inc/footer.html");
  unset($_SESSION["products"]);
?></html>
</body>
<?php } else{
     echo 'Error 404 page not found. Return to <a href="/">Home</a>';
}
?>